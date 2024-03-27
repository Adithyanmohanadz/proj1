<?php

namespace App\Http\Controllers\admin\location;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\admin\location\Pincode;
use Illuminate\Support\Facades\Validator;

class PincodeController extends Controller
{
    public function index()
    {
        $page_title = 'Pincode List';
        $active = 'pincode';
        $pincodes = Pincode::where('deleted',0)->where('status',1)->get();
        return view('admin.location.pincode_creation', compact('page_title', 'active','pincodes'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'pincode' => 'required|string|unique:pincodes,pincode',
        ]);
        if ($validator->fails()) {
            return response()->json(['response' => 'error', 'message' => $validator->errors()]);
        } else {
            $data = Pincode::create([
                'pincode' => $request->input('pincode')
            ]);
            if ($data) {
                return response()->json(['response' => 'success', 'message' => 'Pincode Successfully Created']);
            } else {
                return response()->json(['response' => 'error', 'message' => 'Something went wrong']);
            }
        }
    }
    // end of class
}
