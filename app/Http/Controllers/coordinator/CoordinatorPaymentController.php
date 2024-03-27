<?php

namespace App\Http\Controllers\coordinator;

use Illuminate\Http\Request;
use App\Models\admin\Coordinator;
use App\Http\Controllers\Controller;
use App\Models\admin\ledger\AdminLedger;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\Models\coordinator\CoordinatorPayment;
use App\Models\admin\ledger\CoordinatorOutstanding;

class CoordinatorPaymentController extends Controller
{
    public function index()
    {
        $page_title = 'Payment';
        $active = 'coordinator_payment';
        $payments = CoordinatorPayment::with('coordinator')->where('coordinator_id', auth()->user()->coordinator_id)->where('deleted', 0)->get();
        return view('coordinator.payment', compact('page_title', 'active', 'payments'));
    }

    // both coordinator add payment and admin add payment in the name of coordinator use same function to insert into db,which is store function
    public  function store(Request $request)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'paid_date' => 'required',
                'particulars' => 'required',
                'paid_amount' => 'required',
                // work only if admin create payment
                'coordinator_id' => $request->has('fromWhere') ? 'required' : '',
            ])->setAttributeNames([
                'paid_date' => 'Date ',
                'paid_amount' => 'Amount ',
                'coordinator_id' => 'Coordinator',
            ]);
            if ($validator->fails()) {
                return response()->json(['response' => 'error', 'message' => $validator->errors()]);
            } else {
                if ($request->input('fromWhere')) {
                    // if 'fromWhere' present then that means admin create data
                    $coordinator_id = $request->input('coordinator_id');
                } else {
                    // else section means coordinator himself create this
                    $coordinator_id = auth()->user()->coordinator_id;
                }
                $data = CoordinatorPayment::create([
                    'coordinator_id' => $coordinator_id,
                    'paid_date' => $request->input('paid_date'),
                    'particulars' => $request->input('particulars'),
                    'paid_amount' => $request->input('paid_amount'),
                ]);
                if ($data) {
                    return response()->json(['response' => 'success', 'message' => 'success']);
                } else {
                    return response()->json(['response' => 'error', 'message' => 'Something went wrong']);
                }
            }
        } else {
            return Redirect::route('login');
        }
    }
    ///////////////////////// admin handling payment section /////////////////////////////////////

    public function paymentList()
    {
        $page_title = 'Payment';
        $active = 'payment';
        $payments = CoordinatorPayment::with('coordinator')->where('deleted', 0)->get();
        $allCoordinators = Coordinator::where('status', 1)->where('deleted', 0)->orderBy('coordinator_name', 'asc')->pluck('coordinator_name', 'coordinator_id');
        return view('admin.all_payments', compact('page_title', 'active', 'payments', 'allCoordinators'));
    }

    public function paymentConfirm(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->input('id');
            $errorCount= 0;
            $result =  CoordinatorPayment::where('coordinator_payment_id', $id)->update(['status' => 1]);
            if ($result) {
                $amount = $request->input('amount');
                $coordinator_id = $request->input('coordinator_id');
                // in ledger narration is what we called particular, (consider like that)
                //particular is either bill or receipt
                $narration = $request->input('particulars');
                $paid_date = $request->input('paid_date');

                // ------------------------------------cash flow(ledger,outstanding) section --------------------------------------------------------------

                // ------------admin ledger(of each coordinator) --------------

                $previous_balance = AdminLedger::where('coordinator_id', $coordinator_id)->active()
                    ->latest('created_at')->value('balance');
                AdminLedger::create([
                    'coordinator_id' => $coordinator_id,
                    'affected_date' => now(),
                    'date' =>  $paid_date,
                    'out' => $amount,
                    'particulars' => 'receipt',
                    'narration' => $narration,
                    'balance' => ($previous_balance) - ($amount)
                ]);

                // -------------- coordinator outstanding -------------
                $coordinatorExist = CoordinatorOutstanding::where('coordinator_id', $coordinator_id)
                    ->active()->first();
                if ($coordinatorExist) {
                    $coordinatorExist->total_out += $amount;
                    $coordinatorExist->total_outstanding =  $coordinatorExist->total_in - $coordinatorExist->total_out;
                    $coordinatorExist->save();
                } else {
                   $errorCount++;
                }
                if($errorCount>0){
                    return response()->json(['response' => 'error', 'message' => 'Something went wrong']);
                }else{
                    return response()->json(['response' => 'success', 'message' => 'payment Confirmed']);
                }
            } else {
                return response()->json(['response' => 'error', 'message' => 'Something went wrong']);
            }
        } else {
            return Redirect::route('login');
        }
    }

    public function paymentEdit(Request $request)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'date' => 'required',
                'particulars' => 'required',
                'amount' => 'required',
            ])->setAttributeNames([
                'amount' => 'Amount ',
            ]);
            if ($validator->fails()) {
                return response()->json(['response' => 'error', 'message' => $validator->errors()]);
            } else {
                if ($request->input('coordinator_payment_id')) {
                    $data = CoordinatorPayment::where('coordinator_payment_id', $request->input('coordinator_payment_id'))
                        ->update([
                            'paid_date' => $request->input('date'),
                            'particulars' => $request->input('particulars'),
                            'paid_amount' => $request->input('amount'),
                        ]);
                    if ($data) {
                        return response()->json(['response' => 'success', 'message' => 'Amount Updated']);
                    } else {
                        return response()->json(['response' => 'error', 'message' => 'Something went wrong']);
                    }
                } else {
                    return response()->json(['response' => 'error', 'message' => 'Something went wrong']);
                }
            }
        } else {
            return Redirect::route('login');
        }
    }

    public function ledger()
    {
        $page_title = 'Ledger';
        $active = 'coordinator_payment';
        $allCoordinators = Coordinator::where('status', 1)->where('deleted', 0)->orderBy('coordinator_name', 'asc')->pluck('coordinator_name', 'coordinator_id');
        return view('admin.ledger', compact('page_title', 'active', 'allCoordinators'));
    }

    public function fetchLedger(Request $request)
    {
        if ($request->ajax()) {
            if ($request->filled('coordinator_id')) {
                $coordinator_id = $request->input('coordinator_id');
                $coordinatorName = Coordinator::where('coordinator_id', $coordinator_id)->value('coordinator_name');
                $coordinatorOutstanding = CoordinatorOutstanding::where('coordinator_id', $coordinator_id)->value('total_outstanding');
                $coordinatorLedger = AdminLedger::where('coordinator_id', $coordinator_id)->where('status', 1)
                    ->where('deleted', 0)->get();
                $toSend = '';
                $index = 0;
                $totalIn=0;
                $totalOut=0;
                $totalBalance = 0;
                foreach ($coordinatorLedger as $row) {
                    $index++;
                    $toSend .= '
                    <tr>
                        <td>
                        <p class="text-xs font-weight-bold mb-0">' . $index . '</p>
                        </td>
                        <td>
                        <p class="text-sm font-weight-bold mb-0">' . $row->date . '</p>
                        </td>
                        <td>
                        <p class="text-sm font-weight-bold mb-0">' . $row->affected_date . '</p>
                        </td>
                        <td>
                            <p class="text-sm font-weight-bold mb-0"> 123654</p>
                        </td>
                        <td>
                            <p class="text-sm font-weight-bold mb-0">' . $row->particulars . ' </p>
                        </td>
                        <td>
                        <p class="text-sm font-weight-bold mb-0">' . $row->narration . ' </p>
                        </td>
                        <td>
                            <p class="text-sm font-weight-bold mb-0"> ' . $row->in . '</p>
                        </td>
                        <td>
                            <p class="text-sm font-weight-bold mb-0"> ' . $row->out . '</p>
                        </td>
                        <td>
                        <p class="text-sm font-weight-bold mb-0"> ' . $row->balance . '</p>
                        </td>
                    </tr>
                    ';
                    $totalIn += $row->in;
                    $totalOut += $row->out;
                    
                }
                $toSend .= '
                <tr class="bg-light">
                    <th class="  text-uppercase text-secondary  "> </th>
                    <th class="  text-uppercase text-secondary  "> </th>
                    <th class="  text-uppercase text-secondary  "> </th>
                    <th class="  text-uppercase text-secondary  "> </th>
                    <th class="  text-uppercase text-secondary  "> </th>
                    <th class="  text-uppercase text-secondary  "> </th>
                    <th class="  text-uppercase text-secondary  "> '.$totalIn.'</th>
                    <th class="  text-uppercase text-secondary  "> '.$totalOut.'</th>
                    <th class="  text-uppercase text-secondary  "> </th>
                </tr>
                <tr class="bg-light">
                    <th class="  text-uppercase text-secondary  "> </th>
                    <th class="  text-uppercase text-secondary  "> </th>
                    <th class="  text-uppercase text-secondary  "> </th>
                    <th class="  text-uppercase text-secondary  "> </th>
                    <th class="  text-uppercase text-secondary  "> </th>
                    <th class="  text-uppercase text-secondary  "> </th>
                    <th class="  text-uppercase text-secondary  "> </th>
                    <th class="  text-uppercase text-secondary  "> closing Balance:'.($totalIn)-($totalOut).'/= </th>
                    <th class="  text-uppercase text-secondary  "> </th>

                </tr>';
                return response()->json(['response' => 'success', 'result' => $toSend, 'coordinator_name' => $coordinatorName, 'coordinator_outstanding' => $coordinatorOutstanding]);
            } else {
                return response()->json(['response' => 'error', 'message' => 'Please select coordinator']);
            }
        } else {
            return Redirect::route('login');
        }
    }
    // end of controller
}
