<?php

namespace App\Http\Controllers\coordinator;

use App\Models\admin\ledger\AdminLedger;
use App\Models\coordinator\coordinator_stock;
use Carbon\Carbon;
use Faker\Core\Coordinates;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\admin\Product;
use App\Models\admin\Material;
use App\Http\Controllers\Controller;
use App\Models\admin\ledger\CoordinatorOutstanding;
use App\Models\admin\Material_category;
use App\Models\admin\Stock;
use Illuminate\Support\Facades\Redirect;
use App\Models\coordinator\ShippingAddress;
use App\Models\coordinator\ConsolidateOrder;
use App\Models\coordinator\CoordinatorOrder;
use App\Models\coordinator\CoordinatorStock;

class CoordinatorOrderController extends Controller
{
    public function index()
    {
        $page_title = 'Order ';
        $active = 'coordinator_send_order';
        $products = Product::where('deleted', 0)->where('status', 1)->get();
        return view('coordinator.order.order_taking', compact('page_title', 'active', 'products'));
    }
    public function fetch_level(Request $request)
    {
        $product_id = $request->input('product_id');
        $category_level = Material_category::where('deleted', 0)->where('product_id', $product_id)->get();
        $to_send = '<option disabled selected >Select Level</option>';
        foreach ($category_level as $row) {
            $to_send .= '<option value="' . $row->material_category_id . '">' . $row->level . '</option>';
        }
        return response()->json(['result' => $to_send]);
    }
    public function fetch_all_materials(Request $request)
    {
        $materialModel = new Material();
        $product_id = $request->input('product_id');
        $material_category_id = $request->input('material_category_id');
        session(['order_product_id' => $product_id, 'order_material_category_id' => $material_category_id]);
        $materials = $materialModel->allMaterialsById($product_id, $material_category_id);
        $to_send = ''; // Initialize an empty string to concatenate HTML
        $index = 0;
        foreach ($materials as $row) {
            $index++;
            $to_send .= '<tr>
            <td>
                <p class="text-xs font-weight-bold mb-0">' . $index . '</p>
            </td>
            <td>
                <p class="text-sm font-weight-bold mb-0">' . $row->material_name . '</p>
            </td>
            <td>
                <p class="text-sm font-weight-bold mb-0">' . $row->product_name . '</p>
            </td>
            <td>
                <p class="text-sm font-weight-bold mb-0">' . $row->level . '</p>
            </td>
            <td>
                <p class="text-sm font-weight-bold mb-0">' . $row->class . '</p>
            </td>
            <td>
                <div class="input-group input-group-outline">
                    <input type="number" name="material_quantity[]" class="form-control">
                    <input type="hidden" name="material_id[]" value="' . $row->material_id  . '">
                    <input type="hidden" name="class_id[]" value="' . $row->class_id . '">
                    <input type="hidden" name="material_price[]" value="' . $row->material_price . '">
                </div>
            </td>
        </tr>';
        }
        return response()->json(['result' => $to_send]);
    }
    public function store(Request $request)
    {
        if ($request->ajax()) {
            $materialQuantities = $request->input('material_quantity');
            $materialIds = $request->input('material_id');
            $classIds = $request->input('class_id');
            $materialPrices = $request->input('material_price');

            if (empty(array_filter($materialQuantities))) {
                // All values are empty (zero or null)
                return response()->json(['response' => 'error', 'message' => 'All  fields are empty or 0.']);
            } else {
                // Not all values are empty, proceed with  logic
                $successCount = 0;
                $errorCount = 0;
                foreach ($materialQuantities as $key => $mq) {
                    if ($mq > 0) {
                        $existingRecord = CoordinatorOrder::where([
                            'coordinator_id' => auth()->user()->coordinator_id,
                            'material_id' => $materialIds[$key],
                            'product_id' => session('order_product_id'),
                            'material_category_id' => session('order_material_category_id'),
                            'class_id' => $classIds[$key],
                            'status' => 1,
                            'processed' => 0,
                            'deleted' => 0,
                        ])->first();

                        if ($existingRecord) {
                            // Update the existing quantity of material
                            $existingRecord->quantity = $mq;
                            $existingRecord->amount = $materialPrices[$key];
                            $existingRecord->total_amount = $mq * $materialPrices[$key];
                            $existingRecord->save();
                        } else {
                            // add new record to table
                            $data = CoordinatorOrder::create([
                                "coordinator_id" => auth()->user()->coordinator_id,
                                "material_id" => $materialIds[$key],
                                "product_id" => session('order_product_id'),
                                "material_category_id" => session('order_material_category_id'),
                                "class_id" => $classIds[$key],
                                "quantity" =>  $mq,
                                "amount" => $materialPrices[$key],
                                "total_amount" =>  $mq * $materialPrices[$key]
                            ]);
                            if ($data) {
                                $successCount++;
                            } else {
                                $errorCount++;
                            }
                        }
                    }
                }
                if ($errorCount === 0) {
                    // All records inserted successfully
                    $coordinatorOrderModel = new CoordinatorOrder();
                    $insertedOrders = $coordinatorOrderModel->insertedOrderById();
                    $orderTableView = $this->tableView($insertedOrders);
                    return response()->json(['response' => 'success', 'message' => 'All records inserted successfully.', 'records' => $orderTableView]);
                } else {
                    // Some records failed to insert
                    return response()->json(['response' => 'error', 'message' => "$errorCount records failed to insert."]);
                }
            }
        } else {
            return Redirect::route('login');
        }
    }
    public function tableView($insertedOrders)
    {
        $toSend = '';
        $index = 0;
        foreach ($insertedOrders as $row) {
            $index++;
            $toSend .= '
                    <tr>
                        <td>
                            <p class="text-xs font-weight-bold mb-0 ">' . $index . '</p>
                        </td>
                        <td>
                            <p class="text-sm font-weight-bold mb-0">' . $row->material_name . '</p>
                        </td>
                        <td>
                            <p class="text-sm font-weight-bold mb-0">' . $row->product_name . '</p>
                        </td>
                        <td>
                            <p class="text-sm font-weight-bold mb-0">' . $row->level . '</p>
                        </td>
                        <td>
                            <p class="text-sm font-weight-bold mb-0">' . $row->class . '</p>
                        </td>
                        <td>
                            <div class="input-group input-group-outline">
                                <label class="form-label"></label>
                                <input type="number" name="materialQuantity[]" value="' . $row->quantity . '" class="form-control">
                            </div>
                        </td>
                        <td class="text-sm text-center">
                            <a href="javascript:;" id="deleteOrder"  value="' . $row->coordinator_order_id . '" class="ms-3" data-bs-toggle="tooltip"
                                data-bs-original-title="Delete Materials">
                                <i
                                class="material-icons text-danger position-relative text-lg">delete</i>
                            </a>
                        </td>
                        <input type="hidden" name="coordinator_order_id[]"  value="' . $row->coordinator_order_id . '" class="form-control">
                        <input type="hidden" name="material_amount[]"  value="' . $row->amount . '" class="form-control">

                     </tr>
            ';
        }
        return $toSend;
    }

    public function orderDeleteFromTable(Request $request)
    {
        if ($request->ajax()) {
            $deleteId = $request->input('delete_id');
            $remove =   CoordinatorOrder::where('coordinator_order_id', $deleteId)->update(['deleted' => 1, 'status' => 0]);
            if ($remove) {
                return response()->json(['response' => 'success']);
            } else {
                return response()->json(['response' => 'error']);
            }
        } else {
            return Redirect::route('login');
        }
    }

    public function orderConfirmation(Request $request)
    {
        if ($request->ajax()) {
            $materialQuantities = $request->input('materialQuantity');
            $coordinatorOrderIds = $request->input('coordinator_order_id');
            $material_amounts = $request->input('material_amount');

            $errorCount = 0;
            if (empty(array_filter($materialQuantities))) {
                // All values are empty (zero or null)
                return response()->json(['response' => 'error', 'message' => 'All fields are empty or 0.']);
            } else {
                foreach ($materialQuantities as $key => $mq) {
                    if ($mq > 0) {
                        $id = $coordinatorOrderIds[$key];
                        $totalAmount = $material_amounts[$key] * $mq;
                        $updateResult = CoordinatorOrder::where('coordinator_order_id', $id)->update(['quantity' => $mq, 'total_amount' => $totalAmount]);
                        // Check the result of the update operation
                        $errorCount += $updateResult ? 0 : 1;
                    }
                }
            }
            if ($errorCount === 0) {
                $order_id = 'ORD-' . Str::uuid()->toString();
                session(['order_id' => $order_id]);
                return response()->json(['response' => 'success']);
            } else {
                return response()->json(['response' => 'error', 'message' => "$errorCount records failed to update."]);
            }
        } else {
            return Redirect::route('login');
        }
    }

    public function orderConfirmationView()
    {
        $coordinatorOrderModel = new CoordinatorOrder();
        $insertedOrders = $coordinatorOrderModel->insertedOrderById();
        $page_title = 'Order ';
        $active = 'coordinator_send_order';
        $shippingAddress = ShippingAddress::where('status', 1)->where('deleted', 0)->where('coordinator_id', auth()->user()->coordinator_id)->get();
        return view('coordinator.order.order_confirmation', compact('page_title', 'active', 'insertedOrders', 'shippingAddress'));
    }

    public function fetchShippingDetailsById(Request $request)
    {
        if ($request->ajax()) {
            $shippingId = $request->input('shipping_id');
            $shippingData = ShippingAddress::select('shipping_addresses.*', 'c.country', 's.state', 'ci.city', 'pi.pincode')
                ->leftJoin('countries as c', 'shipping_addresses.country_id', '=', 'c.country_id')
                ->leftJoin('states as s', 'shipping_addresses.state_id', '=', 's.state_id')
                ->leftJoin('cities as ci', 'shipping_addresses.city_id', '=', 'ci.city_id')
                ->leftJoin('pincodes as pi', 'shipping_addresses.pincode_id', '=', 'pi.pincode_id')
                ->where('shipping_addresses.shipping_address_id', $shippingId)
                ->first();
            $toSend = '
                    <div class="col-md-4">
                    <p class=" text-xs m-0">Address</p>
                    <h6 class="text-uppercase  mb-4">
                        ' . $shippingData->address . '
                    </h6>
                </div>
                <div class="col-md-4">
                    <p class=" text-xs m-0">Landmark</p>
                    <h6 class="text-uppercase  mb-4">
                    ' . $shippingData->landmark . '
                    </h6>
                </div>
                <div class="col-md-4">
                    <p class=" text-xs m-0">City</p>
                    <h6 class="text-uppercase  mb-4">
                    ' . $shippingData->city . '
                    </h6>
                </div>
                <div class="col-md-4">
                    <p class=" text-xs m-0">State</p>
                    <h6 class="text-uppercase  mb-4">
                    ' . $shippingData->state . '
                    </h6>
                </div>
                <div class="col-md-4">
                    <p class=" text-xs m-0">Country</p>
                    <h6 class="text-uppercase  mb-4">
                    ' . $shippingData->country . '
                    </h6>
                </div>
                <div class="col-md-4">
                    <p class=" text-xs m-0">Postal code</p>
                    <h6 class="text-uppercase  mb-4">
                    ' . $shippingData->pincode . '
                    </h6>
                </div>
            ';
            return response()->json(['result' => $toSend]);
        } else {
            return Redirect::route('login');
        }
    }

    public function orderPlacing(Request $request)
    {
        if ($request->ajax()) {
            $shippingId = $request->input('shipping_id');
            $consolidateOrder = ConsolidateOrder::create([
                'coordinator_id' => auth()->user()->coordinator_id,
                'order_id' => session('order_id'),
                'order_date' =>  Carbon::today(),
                'shipping_address_id' => $shippingId
            ]);
            // Access the inserted consolidate_order_id
            $consolidateOrderId = $consolidateOrder->consolidate_order_id;
            $update = CoordinatorOrder::where('coordinator_id', auth()->user()->coordinator_id)
                ->where('processed', 0)->where('order_id', null)->where('status', 1)
                ->where('deleted', 0)
                ->update(['order_id' => session('order_id'), 'processed' => 1, 'consolidate_order_id' => $consolidateOrderId]);
            if ($update) {
                // Destroy the 'order_id' session
                session()->forget('order_id');
                return response()->json(['response' => 'success', 'message' => 'your order placed']);
            } else {
                // Update failed
                return response()->json(['response' => 'error', 'message' => "occurred"]);
            }
        } else {
            return Redirect::route('login');
        }
    }
    // list all orders of the coordinator
    public function allOrder()
    {
        $page_title = 'Order ';
        $active = 'coordinator_send_order';
        $allOrders = ConsolidateOrder::where('deleted', 0)->where('status', 1)->where('coordinator_id', auth()->user()->coordinator_id)->get();
        return view('coordinator.order.order_list', compact('page_title', 'active', 'allOrders'));
    }
    public function consolidateOrderView($consolidate_order_id)
    {
        $consolidateModel = new ConsolidateOrder();
        $consolidateOrder = $consolidateModel->fetchConsolidateOrderById($consolidate_order_id);
        $page_title = 'Order ';
        $active = 'coordinator_send_order';
        $shippingAddress = ShippingAddress::where('status', 1)->where('deleted', 0)->where('coordinator_id', auth()->user()->coordinator_id)->get();
        $orderModel = new CoordinatorOrder();
        $orders = $orderModel->orderByOrderId($consolidateOrder->order_id);
        return view('coordinator.order.order_view', compact('page_title', 'active', 'consolidateOrder', 'shippingAddress', 'orders'));
    }

    public function orderReceived(Request $request)
    {
        if ($request->ajax()) {
            $consolidateOrderId = $request->input('consolidateOrderId');
            $update = ConsolidateOrder::where('consolidate_order_id', $consolidateOrderId)
                ->update(['order_status' => 'received', 'completed' => 1]);
            $errorCount = 0;
            if ($update) {
                // ------------------------------------stock section --------------------------------------------------------------
                // admin godown stock updating section
                //-------------------------------------------------------------------------
                // if order is received ,then we have to reduce stock from admin based on godown

                //get all material orders based on consolidated  id
                $materialOrders = CoordinatorOrder::where('consolidate_order_id', $consolidateOrderId)->where('status', 1)->where('deleted', 0)->where('processed', 1)->get();
                // get corresponding godown
                $godown_id = ConsolidateOrder::where('consolidate_order_id', $consolidateOrderId)->value('godown_id');
                foreach ($materialOrders as $rows) {
                    $material_id = $rows->material_id;
                    $order_quantity = $rows->quantity;
                    $godownStock = Stock::where('godown_id', $godown_id)->where('material_id', $material_id)
                        ->where('status', 1)->where('deleted', 0)->first();
                    if ($godownStock) {
                        $godownStock->stock_quantity -=  $order_quantity;
                        $godownStock->save();
                    }
                }
                // coordinator stock updation section 
                // -----------------------------------------------
                foreach ($materialOrders as $orders) {
                    $material_id = $orders->material_id;
                    $order_quantity = $orders->quantity;
                    $coordinatorStock = CoordinatorStock::where('coordinator_id', auth()->user()->coordinator_id)->where('material_id', $material_id)->where('status', 1)->where('deleted', 0)->first();
                    if ($coordinatorStock) {
                        $coordinatorStock->stock_quantity +=  $order_quantity;
                        $coordinatorStock->save();
                    } else {
                        CoordinatorStock::create([
                            'coordinator_id' => auth()->user()->coordinator_id,
                            'product_id' => $orders->product_id,
                            'material_category_id' => $orders->material_category_id,
                            'class_id' => $orders->class_id,
                            'material_id' => $material_id,
                            'stock_quantity' => $order_quantity
                        ]);
                    }
                }
                // ------------------------------------end of stock section --------------------------------------------------------------

                // ------------------------------------cash flow(ledger,outstanding) section --------------------------------------------------------------

                // ------------admin ledger(each coordinator) --------------
                $totalAmountSum = CoordinatorOrder::where('consolidate_order_id', $consolidateOrderId)
                    ->active()->sum('total_amount');
                    $previous_balance = AdminLedger::where('coordinator_id', auth()->user()->coordinator_id)->active()
                    ->latest('created_at')->value('balance');
                AdminLedger::create([
                    'coordinator_id' => auth()->user()->coordinator_id,
                    'consolidate_order_id' => $consolidateOrderId,
                    'affected_date' => now(),
                    'particulars' => 'bill',
                    'in' => $totalAmountSum,
                    'balance' =>  ($totalAmountSum)+($previous_balance)
                ]);

                // -------------- coordinator outstanding -------------
                $coordinatorExist = CoordinatorOutstanding::where('coordinator_id', auth()->user()->coordinator_id)
                    ->active()->first();
                if ($coordinatorExist) {
                    $coordinatorExist->total_in += $totalAmountSum;
                    $coordinatorExist->total_outstanding =  ($coordinatorExist->total_in) - ($coordinatorExist->total_out);
                    $coordinatorExist->save();
                } else {
                    $errorCount++;
                }
                if ($errorCount > 0) {
                    return response()->json(['response' => 'error', 'message' => "Something went wrong"]);
                } else {
                    return response()->json(['response' => 'success', 'message' => 'status updated']);
                }
            } else {
                // Update failed
                return response()->json(['response' => 'error', 'message' => "Something went wrong"]);
            }
        } else {
            return Redirect::route('login');
        }
    }
    // end of controller
}
