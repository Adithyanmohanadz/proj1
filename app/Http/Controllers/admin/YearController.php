<?php

namespace App\Http\Controllers\admin;

use App\Models\admin\Year;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class YearController extends Controller
{
    public function index()
    {
        $page_title = 'Year List';
        $active = 'year';
        $years = Year::where('deleted',0)->where('status',1)->paginate(5);
        return view('admin.year.year_creation', compact('page_title', 'active','years'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'year' => 'required|string|unique:years,year',
        ]);
        if ($validator->fails()) {
            return response()->json(['response' => 'error', 'message' => $validator->errors()]);
        } else {
            $data = Year::create([
                'year' => $request->input('year')
            ]);
            if ($data) {
                return response()->json(['response' => 'success', 'message' => 'Year Successfully Created']);
            } else {
                return response()->json(['response' => 'error', 'message' => 'Something went wrong']);
            }
        }
    }
    // end of class
}
