<?php

namespace App\Http\Controllers\admin\location;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\admin\location\Country;
use Illuminate\Support\Facades\Validator;

class CountryController extends Controller
{
    public function index()
    {
        $page_title = 'Country List';
        $active = 'country';
        $countries = Country::where('deleted',0)->where('status',1)->get();
        return view('admin.location.country_creation', compact('page_title', 'active','countries'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'country' => 'required|string|unique:countries,country',
        ]);
        if ($validator->fails()) {
            return response()->json(['response' => 'error', 'message' => $validator->errors()]);
        } else {
            $data = Country::create([
                'country' => $request->input('country')
            ]);
            if ($data) {
                return response()->json(['response' => 'success', 'message' => 'Country Successfully Created']);
            } else {
                return response()->json(['response' => 'error', 'message' => 'Something went wrong']);
            }
        }
    }
    // end of class
}
