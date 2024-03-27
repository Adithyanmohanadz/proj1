<?php

namespace App\Http\Controllers\admin\location;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\admin\location\State;
use App\Models\admin\location\Country;
use Illuminate\Support\Facades\Validator;

class StateController extends Controller
{
    public function index()
    {
        $page_title = 'State List';
        $active = 'state';
        $states = State::with('country')->where('deleted',0)->get();
        $countries = Country::where('deleted',0)->where('status',1)->get();

        return view('admin.location.state_creation', compact('page_title', 'active','states','countries'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'state' => 'required|string',
            'country_id' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['response' => 'error', 'message' => $validator->errors()]);
        } else {
            $data = State::create([
                'country_id' => $request->input('country_id'),
                'state' => $request->input('state')
            ]);
            if ($data) {
                return response()->json(['response' => 'success', 'message' => 'State Successfully Created']);
            } else {
                return response()->json(['response' => 'error', 'message' => 'Something went wrong']);
            }
        }
    }
    // end of class
}
