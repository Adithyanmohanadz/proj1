<?php

namespace App\Http\Controllers\coordinator;

use App\Models\coordinator\ShippingAddress;
use Illuminate\Http\Request;
use App\Models\admin\location\City;
use App\Http\Controllers\Controller;
use App\Models\admin\location\State;
use App\Models\admin\location\Country;
use App\Models\admin\location\Pincode;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ShippingAddressController extends Controller
{
    public function index()
    {
        $shippingAddressModel = new ShippingAddress();
        $page_title = 'Shipping Address';
        $active = 'shipping_address';
        $shippingAddress = $shippingAddressModel->shippingAddressByCoordinator();
        $countries = Country::where('deleted', 0)->where('status', 1)->get();
        $pincodes = Pincode::where('deleted', 0)->where('status', 1)->get();
        return view('coordinator.shipping_address', compact('page_title', 'active', 'countries', 'pincodes','shippingAddress'));
    }
    public function fetch_state(Request $request)
    {
        $country_id = $request->input('country_id');
        $state = State::where('deleted', 0)->where('country_id', $country_id)->get();
        $to_send = '<option disabled selected >Select State</option>';
        foreach ($state as $row) {
            $to_send .= '<option value="' . $row->state_id . '">' . $row->state . '</option>';
        }
        return response()->json(['result' => $to_send]);
    }
    public function fetch_city(Request $request)
    {
        $state_id = $request->input('state_id');
        $city = City::where('deleted', 0)->where('state_id', $state_id)->get();
        $to_send = '<option disabled selected >Select City</option>';
        foreach ($city as $row) {
            $to_send .= '<option value="' . $row->city_id . '">' . $row->city . '</option>';
        }
        return response()->json(['result' => $to_send]);
    }
    public function store(Request $request)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'address' => 'required',
                'landmark' => 'required',
                'country_id' => 'required',
                'state_id' => 'required',
                'city_id' => 'required',
                'pincode_id' => 'required',
            ])->setAttributeNames([
                'country_id' => 'Country ',
                'state_id' => 'State ',
                'city_id' => 'City ',
                'pincode_id' => 'Pincode ',
            ]);
            if ($validator->fails()) {
                return response()->json(['response' => 'error', 'message' => $validator->errors()]);
            } else {
                $data = ShippingAddress::create([
                    'coordinator_id' => auth()->user()->coordinator_id,
                    'name' => $request->input('name'),
                    'address' => $request->input('address'),
                    'landmark' => $request->input('landmark'),
                    'country_id' => $request->input('country_id'),
                    'state_id' => $request->input('state_id'),
                    'city_id' => $request->input('city_id'),
                    'pincode_id' => $request->input('pincode_id'),
                ]);
                if ($data) {
                    return response()->json(['response' => 'success', 'message' => 'Shipment Address Successfully Created']);
                } else {
                    return response()->json(['response' => 'error', 'message' => 'Something went wrong']);
                }
            }
        } else {
            return Redirect::route('login');
        }
    }
    // end of controller
}
