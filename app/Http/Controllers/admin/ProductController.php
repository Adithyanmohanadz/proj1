<?php

namespace App\Http\Controllers\admin;

use App\Models\admin\Material_category;
use Illuminate\Http\Request;
use App\Models\admin\Classes;
use App\Models\admin\Product;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index()
    {
        $page_title = 'Product List';
        $active = 'product';
        $classes = Classes::where('deleted', 0)->where('status', 1)->orderBy('class_id', 'asc')->get();
        $productData = '';
        $index = 0;
        $products = Product::active()->get();
        foreach ($products as $rows) {
            $index++;
            $productData .= '
            <tr>
                <td>
                     <p class="text-sm font-weight-bold mb-0">' . $index . '</p>
                </td>
                <td>
                    <p class="text-sm font-weight-bold mb-0">Product ' . $index . ' </p>
                </td>
                <td>
                     <p class="text-sm font-weight-bold mb-0">' . $rows->product_name . '</p>
                </td>
                <td>
                    <ul class="list-group">
                    ';
            $levels = Material_category::where('product_id', $rows->product_id)->orderBy('level_order', 'asc')->active()->get('level');
            foreach ($levels as $level) {
                $productData .= '            
                        <li class="list-group-item p-0 border-none">
                            <span class="badge badge-dot me-4">
                                <i class="bg-info"></i>
                                <span class="text-dark text-xs">' . $level->level . '</span>
                            </span>
                        </li>
                        ';
            }
            $productData .= '
                    </ul>
                </td>
                <td>
                    <ul class="list-group">
                    ';
            $classList = explode(',', $rows->classes);
            foreach ($classList as $cl) {
                $class = Classes::where('class_id', $cl)->value('class');
                $productData .= '
                        <li class="list-group-item p-0 border-none">
                            <span class="badge badge-dot me-4">
                                <i class="bg-warning"></i>
                                <span class="text-dark text-xs">'.$class.'</span>
                            </span>
                        </li>
                        ';
            }
            $productData .= ' 
                    </ul>
                </td>
                <td class="text-sm">
                    <a class="ms-3" data-bs-toggle="tooltip" data-bs-original-title="Edit Product  ">
                        <i class="material-icons text-success position-relative text-lg" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">drive_file_rename_outline</i>
                    </a>
                    <a href="javascript:;" class="ms-3" data-bs-toggle="tooltip" data-bs-original-title="Activate Product  ">
                        <i class="material-icons text-info position-relative text-lg">power_settings_new</i>
                    </a>
                    <a href="javascript:;" class="ms-3" data-bs-toggle="tooltip" data-bs-original-title="Deactive Product">
                        <i class="material-icons text-danger position-relative text-lg">delete</i>
                    </a>
                </td>
             </tr>
        ';
        }
        return view('admin.product', compact('page_title', 'active', 'classes', 'productData'));
    }
    public function store(Request $request)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'product_name' => 'required',
                'number_of_levels' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json(['response' => 'error', 'message' => $validator->errors()]);
            } else {
                $product = new product();
                $product->product_name = $request->input('product_name');
                $product->number_of_levels = $request->input('number_of_levels');
                $product->classes = implode(',', $request->input('selected_class_ids'));
                // Loop through level names and assign to corresponding level fields
                for ($i = 1; $i <= $product->number_of_levels; $i++) {
                    $field = 'level' . $i;
                    $product->$field = isset($request->input('level_names')[$i - 1]) ? $request->input('level_names')[$i - 1] : null;
                }
                // Save the product to the database
                $is_inserted = $product->save();
                if ($is_inserted) {
                    // Retrieve the inserted ID
                    $product_id = $product->product_id;
                    for ($i = 1; $i <= $product->number_of_levels; $i++) {
                        $level = isset($request->input('level_names')[$i - 1]) ? $request->input('level_names')[$i - 1] : null;
                        $category_name = strtolower(str_replace(' ', '_', $product->product_name . '-' . $level));

                        $mc = new Material_category();
                        $mc->material_category_name = $category_name;
                        $mc->product_id = $product_id;
                        $mc->level = $level;
                        $mc->level_order = $i;
                        $mc->save();
                    }
                    return response()->json(['response' => 'success', 'message' => 'Product Successfully Created']);
                } else {
                    return response()->json(['response' => 'error', 'message' => 'Something went wrong while saving the product']);
                }
            }
        } else {
            return Redirect::route('login');
        }
    }
    // end of controller 
}
