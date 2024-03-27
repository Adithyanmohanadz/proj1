<?php

namespace App\Http\Controllers\admin;

use App\Models\admin\Godown;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\Models\coordinator\ConsolidateOrder;
use App\Models\coordinator\CoordinatorOrder;

class AdminOrderController extends Controller
{
    public function pendingOrders()
    {
        $page_title = 'Pending orders';
        $active = 'pending_order';
        $pendingOrders = ConsolidateOrder::with('coordinator')->where('order_status', 'pending')->where('status', 1)->where('deleted', 0)->get();
        return view('admin.order.all_pending_orders', compact('page_title', 'active', 'pendingOrders'));
    }
    public function dispatchOrders()
    {
        $page_title = 'Dispatch orders';
        $active = 'dispatch_order';
        $dispatchOrders = ConsolidateOrder::with('coordinator')->where('order_status', 'dispatch')->where('status', 1)->where('deleted', 0)->get();
        return view('admin.order.all_dispatch_orders', compact('page_title', 'active', 'dispatchOrders'));
    }
    public function executedOrders()
    {
        $page_title = 'Executed orders';
        $active = 'executed_order';
        $executedOrders = ConsolidateOrder::with('coordinator')->with('godown')->where('order_status', 'executed')->where('status', 1)->where('deleted', 0)->get();
        return view('admin.order.all_executed_orders', compact('page_title', 'active', 'executedOrders'));
    }
    public function receivedOrders()
    {
        $page_title = 'Received orders';
        $active = 'received_order';
        $receivedOrders = ConsolidateOrder::with('coordinator')->with('godown')->where('order_status', 'received')->where('status', 1)->where('deleted', 0)->get();
        return view('admin.order.all_received_orders', compact('page_title', 'active', 'receivedOrders'));
    }

    public function pendingOrderById($consolidate_order_id)
    {
        $page_title = 'View Order ';
        $active = 'dashboard';
        $consolidateModel = new ConsolidateOrder();
        $consolidateOrder = $consolidateModel->fetchConsolidateOrderById($consolidate_order_id);
        $orderModel = new CoordinatorOrder();
        $orders = $orderModel->orderByOrderId($consolidateOrder->order_id);
        $godowns = Godown::where('status', 1)->where('deleted', 0)->get();
        return view('admin.order.view_pending_order', compact('page_title', 'active', 'consolidateOrder', 'orders', 'godowns'));
    }
    public function pendingOrderSubmit(Request $request)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'godown_id' => 'required',
                'executive_name' => 'required',
            ])->setAttributeNames([
                'executive_name' => 'Executive Name ',
                'godown_id' => 'Godown  ',
            ]);
            if ($validator->fails()) {
                return response()->json(['response' => 'error', 'message' => $validator->errors()]);
            } else {
                $materialQuantities = $request->input('material_quantity');
                $coordinatorOrderIds = $request->input('coordinator_order_id');
                $material_amounts = $request->input('material_amount');

                $errorCount = 0;
                if (empty(array_filter($material_amounts))) {
                    // All values are empty (zero or null)
                    return response()->json(['response' => 'error', 'message' => 'All fields are empty or 0.']);
                } else {
                    foreach ($material_amounts as $key => $materialAmount) {
                        if ($materialAmount > 0) {
                            $id = $coordinatorOrderIds[$key];
                            $totalAmount = $materialQuantities[$key] * $materialAmount;
                            $updateResult = CoordinatorOrder::where('coordinator_order_id', $id)->update(['amount' => $materialAmount, 'total_amount' => $totalAmount]);
                            // Check the result of the update operation
                            $errorCount += $updateResult ? 0 : 1;
                        }
                    }
                    // update consolidate order table with  godown id and executive name and change status
                    ConsolidateOrder::where('consolidate_order_id', $request->input('consolidateOrderId'))
                        ->update([
                            'godown_id' => $request->input('godown_id'),
                            'executive_name' => $request->input('executive_name'),
                            'executed_date' => now(),
                            'order_status' => 'dispatch',
                        ]);
                }
                if ($errorCount === 0) {
                    session(['consolidate_order_id' => $request->input('consolidateOrderId')]);
                    return response()->json(['response' => 'success', 'redirect' => route('generateChallan')]);
                } else {
                    return response()->json(['response' => 'error', 'message' => "something went wrong,Recheck again"]);
                }
            }
        } else {
            return Redirect::route('login');
        }
    }

    public function dispatchOrderById($consolidate_order_id)
    {
        $page_title = 'View Order ';
        $active = 'dashboard';
        $consolidateModel = new ConsolidateOrder();
        $consolidateOrder = $consolidateModel->fetchConsolidateOrderById($consolidate_order_id);
        $orderModel = new CoordinatorOrder();
        $orders = $orderModel->orderByOrderId($consolidateOrder->order_id);
        return view('admin.order.view_dispatch_order', compact('page_title', 'active', 'consolidateOrder', 'orders'));
    }

    public function dispatchOrderSubmit(Request $request)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'tracking_id' => 'required',
                'method_of_delivery' => 'required',
                'remark' => 'required',

            ])->setAttributeNames([
                'tracking_id' => 'Tracking Id  ',
                'method_of_delivery' => 'Method of delivery  ',
            ]);
            if ($validator->fails()) {
                return response()->json(['response' => 'error', 'message' => $validator->errors()]);
            } else {
                // update order status to dispatched and add tracking id, method of delivery and remark.
                $update = ConsolidateOrder::where('consolidate_order_id', $request->input('consolidateOrderId'))
                    ->update([
                        'order_status' => 'executed',
                        'courier_date' => now(),
                        'tracking_id' => $request->input('tracking_id'),
                        'method_of_delivery' =>  $request->input('method_of_delivery'),
                        'remark' => $request->input('remark')
                    ]);
                if ($update) {
                    return response()->json(['response' => 'success']);
                } else {
                    return response()->json(['response' => 'error', 'message' => "something went wrong,Recheck again"]);
                }
            }
        } else {
            return Redirect::route('login');
        }
    }
// both received and executed order use same function, because they have the same view for order
    public function executedOrderById($consolidate_order_id)
    {
        $page_title = 'View Order ';
        $active = 'dashboard';
        $consolidateModel = new ConsolidateOrder();
        $consolidateOrder = $consolidateModel->fetchConsolidateOrderById($consolidate_order_id);
        if (!$consolidateOrder) {
            // You can customize the response as needed, here sending a 404 error
            return response()->view('errors.404', [], Response::HTTP_NOT_FOUND);
        }
        $orderModel = new CoordinatorOrder();
        $orders = $orderModel->orderByOrderId($consolidateOrder->order_id);
        return view('admin.order.view_executed_order', compact('page_title', 'active', 'consolidateOrder', 'orders'));
    }

    public function generateChallan(){
        $page_title = "challan";
        return view('admin.order.challan',compact( 'page_title'));
    }
    // end of controller
}
