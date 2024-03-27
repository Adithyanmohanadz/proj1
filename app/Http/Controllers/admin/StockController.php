<?php

namespace App\Http\Controllers\admin;

use App\Models\admin\Stock;
use App\Models\admin\Godown;
use Illuminate\Http\Request;
use App\Models\admin\Classes;
use App\Models\admin\Product;
use App\Models\admin\Material;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\admin\Material_category;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class StockController extends Controller
{
    public function index()
    {
        $page_title = 'Godown';
        $active = 'stock_list';
        $godowns = Godown::where('deleted', 0)->where('status', 1)->get();
        return view('admin.stock.all_godowns', compact('page_title', 'active', 'godowns'));
    }

    public function selectedGodown(Request $request)
    {
        $stockModel = new Stock();
        $page_title = '';
        $active = 'stock_list';
        $godown_id = $request->query('godown_id');
        session(['godown_id' => $godown_id]);
        $godownName = Godown::where('godown_id', $godown_id)->value('godown_name');
        session(['godownName' => $godownName]);
        $distinctStocks = Stock::with('product', 'materialCategory', 'class', 'material')
        ->where('godown_id', $godown_id)
        ->selectRaw('material_id, product_id,material_category_id,class_id, SUM(stock_quantity) as total_stock_quantity')
        ->groupBy('material_id', 'product_id','material_category_id','class_id')
        ->get();
        return view('admin.stock.godown_stock', compact('page_title', 'active', 'godownName', 'distinctStocks', 'godown_id'));
    }
    public function addStock()
    {
        $page_title = 'Stock';
        $active = 'stock_list';
        $godown_id = session('godown_id');
        $products = Product::where('deleted', 0)->where('status', 1)->get();
        $classes = Classes::where('deleted', 0)->where('status', 1)->orderBy('class_id', 'asc')->get();

        return view('admin.stock.add_stock', compact('page_title', 'active', 'products', 'classes', 'godown_id'));
    }
    public function fetch_material(Request $request)
    {
        $product_id = $request->input('product_id');
        $material_category_id = $request->input('level_id');
        $class_id = $request->input('class_id');

        $material = Material::where('deleted', 0)->where('product_id', $product_id)->where('material_category_id', $material_category_id)->where('class_id', $class_id)->get();
        $to_send = '<option disabled selected >Material</option>';
        foreach ($material as $row) {
            $to_send .= '<option value="' . $row->material_id . '">' . $row->material_name . '</option>';
        }
        return response()->json(['result' => $to_send]);
    }
    public function fetch_level(Request $request)
    {
        $product_id = $request->input('product_id');
        $category_level = Material_category::where('deleted', 0)->where('product_id', $product_id)->get();
        $to_send = '<option disabled selected >Level</option>';
        foreach ($category_level as $row) {
            $to_send .= '<option value="' . $row->material_category_id . '">' . $row->level . '</option>';
        }
        return response()->json(['result' => $to_send]);
    }
    public function store(Request $request)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'stock_product_id' => 'required',
                'stock_category_level_id' => 'required',
                'stock_class_id' => 'required',
                'stock_material_id' => 'required',
                'stock_quantity' => 'required|numeric',
                'source' => 'required',
                'remark' => 'required',
            ])->setAttributeNames([
                'stock_product_id' => 'Product ',
                'stock_category_level_id' => 'Level',
                'stock_class_id' => 'Class',
                'stock_material_id' => 'Material',
                'stock_quantity' => 'Stock quantity',
            ]);
            if ($validator->fails()) {
                return response()->json(['response' => 'error', 'message' => $validator->errors()]);
            } else {

                $data = Stock::create([
                    'godown_id' => session('godown_id'),
                    'product_id' => $request->input('stock_product_id'),
                    'material_category_id' => $request->input('stock_category_level_id'),
                    'class_id' => $request->input('stock_class_id'),
                    'material_id' => $request->input('stock_material_id'),
                    'stock_quantity' => $request->input('stock_quantity'),
                    'source' => $request->input('source'),
                    'remark' => $request->input('remark'),
                ]);
                if ($data) {
                    return response()->json(['response' => 'success', 'message' => 'Stock Successfully Registered']);
                } else {
                    return response()->json(['response' => 'error', 'message' => 'Something went wrong']);
                }
            }
        } else {
            return Redirect::route('login');
        }
    }
    // source view
    public function selectedGodownSourceView(Request $request)
    {
        $page_title = '';
        $active = 'stock_list';
        $godown_id = $request->query('godown_id');
        $godownName = Godown::where('godown_id', $godown_id)->value('godown_name');
        $sourceView = Stock::with('product', 'materialCategory', 'class', 'material')->active()->where('godown_id', $godown_id)->get();
        return view('admin.stock.source_view', compact('page_title', 'active', 'sourceView', 'godownName'));
    }
    // end of controller
}
