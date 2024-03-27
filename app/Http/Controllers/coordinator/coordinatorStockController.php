<?php

namespace App\Http\Controllers\coordinator;

use App\Http\Controllers\Controller;
use App\Models\admin\Classes;
use App\Models\admin\Material_category;
use App\Models\admin\Product;
use App\Models\coordinator\CoordinatorStock;
use Illuminate\Http\Request;

class coordinatorStockController extends Controller
{
    public function index()
    {
        $page_title = 'Stock';
        $active = 'coordinator_stock_management';
        $products = CoordinatorStock::with('product')->select('product_id')->where('coordinator_id',auth()->user()->coordinator_id)->active()->distinct()->get();
        foreach( $products as  $product){
        $stockData= '
        <h6 class="font-weight-bolder pb-0 mb-0"> '.$product->product->product_name.' </h6>
        <div class="col-md-6 mt-3">
        ';
        $levels = Material_category::active()->where('product_id',$product->product_id)->get();
        foreach($levels as $level){
        $stockData.= '  <p class="font-weight-normal h6 pt-1   text-decoration-underline">'.$level->level.' </p>
            <div class="card mb-3">
                <div class="table-responsive">
                    <table class="table table-striped table-striped align-items-center mb-0">
                        <thead>
                            <tr>
                                <th
                                    class="w-10 text-uppercase text-dark text-xs font-weight-bolder  ps-2">
                                    Sl no</th>
                                <th
                                    class="     text-uppercase text-dark text-xs font-weight-bolder  ps-2">
                                    Material</th>
                                <th
                                    class="w-20 text-uppercase text-dark text-xs font-weight-bolder  ps-2">
                                    Class</th>
                                <th
                                    class="w-15 text-uppercase text-dark text-xs font-weight-bolder  ps-2">
                                    price</th>
                                <th
                                    class="w-15 text-uppercase text-dark text-xs font-weight-bolder  ps-2">
                                    Qty</th>
                        </thead>
                        <tbody>
                        ';
                        $class = Product::where('product_id',$product->product_id)->value('classes');
                        $classArray = explode(',', $class);
                        $slno=0;
                        foreach ($classArray as $index => $classItem) {
                            $slno++;
                            $classData = Classes::where('class_id',$classItem)->first();
                        $stockData .= '
                            <tr>
                                <td class="align-middle ">
                                    <p class="text-sm ps-1 font-weight-bold mb-0">'.$slno.'</p>
                                </td>
                                <td class="align-middle ">
                                    <p class="text-sm  font-weight-bold mb-0">Material</p>
                                </td>
                                <td class="align-middle ">
                                    <p class="text-sm  font-weight-bold mb-0">'.$classData->class.'</p>
                                </td>
                                <td class="align-middle ">
                                    <span class="text-secondary text-sm  ">20</span>
                                </td>
                                <td class="align-middle ">
                                    <span class="text-secondary text-sm  ">18</span>
                                </td>
                            </tr>
                            ';
                        }
                            $stockData .= '
                         
                        </tbody>
                        <tfoot>
                            <tr>
                                <td class="align-middle ">
                                    <p class="text-xs  font-weight-bold mb-0"> </p>
                                </td>
                                <td class="align-middle ">
                                    <p class="text-lg  font-weight-bold mb-0">Total</p>
                                </td>
                                <td class="align-middle ">

                                </td>
                                <td class="align-middle ">

                                </td>
                                <td class="align-middle ">
                                    <span class="text-secondary text-lg  font-weight-bold ">180</span>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            ';
        }
        $stockData.='
        </div>
        ';
        }
        return view('coordinator.coordinator_stock', compact('page_title', 'active','stockData'));
    }
}
