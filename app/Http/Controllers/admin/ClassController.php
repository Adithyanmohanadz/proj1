<?php

namespace App\Http\Controllers\admin;

use App\Models\admin\Classes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ClassController extends Controller
{
    public function index()
    {
        $page_title = 'Class List';
        $active = 'class';
        $classes = Classes::where('deleted',0)->where('status',1)->get();
        return view('admin.class', compact('page_title', 'active', 'classes'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'class_name' => 'required|string|unique:classes,class',
        ]);
        if ($validator->fails()) {
            return response()->json(['response' => 'error', 'message' => $validator->errors()]);
        } else {
            $data = Classes::create([
                'class' => $request->input('class_name')
            ]);
            if ($data) {
                return response()->json(['response' => 'success', 'message' => 'Class Successfully Created']);
            } else {
                return response()->json(['response' => 'error', 'message' => 'Something went wrong']);
            }
        }
    }
    // end of class
}
