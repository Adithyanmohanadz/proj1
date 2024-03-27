<?php

namespace App\Http\Controllers\admin\location;

use Illuminate\Http\Request;
use App\Models\admin\location\City;
use App\Http\Controllers\Controller;
use App\Models\admin\location\State;
use Illuminate\Support\Facades\Validator;

class CityController extends Controller
{
    public function index()
    {
        $page_title = 'City List';
        $active = 'city';
        $cities = City::with('state')->where('deleted',0)->get();
        $states = State::where('deleted',0)->where('status',1)->get();
        return view('admin.location.city_creation', compact('page_title', 'active','cities','states'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'city' => 'required|string',
            'state_id' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['response' => 'error', 'message' => $validator->errors()]);
        } else {
            $data = City::create([
                'state_id' => $request->input('state_id'),
                'city' => $request->input('city')
            ]);
            if ($data) {
                return response()->json(['response' => 'success', 'message' => 'City Successfully Created']);
            } else {
                return response()->json(['response' => 'error', 'message' => 'Something went wrong']);
            }
        }
    }
    // end of class
}
