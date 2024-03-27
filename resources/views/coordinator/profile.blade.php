
@extends('coordinator.common.coordinator_layout')
@section('page_content_body')
<div class="container-fluid py-1">
    <div class="row">
        <div class="col-12">
            <div class="row  ">
                <div class="col-12 col-lg-11 m-auto ">
                    <div class="card">
                        <div class="card-body">
                            <form action="" id="coordinatorProfileForm" data-route="{{route('coordinator.profileEdit')}}" >
                                <div class="border-radius-xl bg-white">
                                    <h5 class="font-weight-bolder mb-2"> Coordinator Info</h5> 
                                    <div class=" ">
                                        <div class="row mt-3">
                                            <div class="col-12 col-sm-6">
                                                <div class="input-group input-group-dynamic">
                                                    <label class="form-label"> name</label>
                                                    <input name="coordinator_name" class=" form-control" value="{{auth()->user()->coordinator_name}}"  type="text" />
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                                <div class="input-group input-group-dynamic">
                                                    <label class="form-label">UserName</label>
                                                    <input name="username" class=" form-control" value="{{auth()->user()->username}}" disabled type="text" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-12 col-sm-6">
                                                <div class="input-group input-group-dynamic">
                                                    <label class="form-label">Mob</label>
                                                    <input name="mobile" class=" form-control" value="{{auth()->user()->mobile}}" type="tel" />
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                                <div class="input-group input-group-dynamic">
                                                    <label class="form-label">Email </label>
                                                    <input name="email" class="  form-control" value="{{auth()->user()->email}}" type="email" />
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div class="row mt-3">
                                            <div class="col-12 col-sm-6">
                                                <div class="input-group input-group-dynamic">
                                                    <label class="form-label">Password</label>
                                                    <input class="  form-control" type="password" id="password" />
                                                    <i id="icon" class="far fa-eye pasw z-index-5"></i>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                                <div class="input-group input-group-dynamic">
                                                    <label class="form-label">Conform Password</label>
                                                    <input class="  form-control" type="password" id="c-password" />
                                                    <i id="c-icon" class="far fa-eye pasw z-index-5"></i>
                                                </div>
                                            </div>
                                        </div> --}}
                                        <div class="row mt-3">
                                            <div class="col-12">
                                                <div class="input-group input-group-dynamic">
                                                    <label class="form-label"> Address </label>
                                                    <input name="address" class="  form-control" value="{{auth()->user()->address}}" type="text" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-12 col-sm-3 mt-3 mt-sm-0">
                                                <select class="form-control " name="country_id" id="choices-country">
                                                    <option value="" selected disabled>Country</option>
                                                    @foreach($countries as $rows)
                                                    <option value="{{ $rows->country_id }}" @if(auth()->user()->country_id == $rows->country_id) selected @endif>
                                                        {{ $rows->country }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-12 col-sm-3 mt-3 mt-sm-0">
                                                <select class="form-control " name="state_id" id="choices-state">
                                                    <option value="" selected disabled>State</option>
                                                    @foreach($states as $rows)
                                                    <option value="{{ $rows->state_id }}" @if(auth()->user()->state_id == $rows->state_id) selected @endif>
                                                        {{ $rows->state }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-12 col-sm-3">
                                                <select class="form-control " name="city_id" id="choices-city">
                                                    <option value="" selected disabled>City</option>
                                                    @foreach($cities as $rows)
                                                    <option value="{{ $rows->city_id }}" @if(auth()->user()->city_id == $rows->city_id) selected @endif>
                                                        {{ $rows->city }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>                                          
                                            <div class="col-12 col-sm-3 mt-3 mt-sm-0">
                                                <select class="form-control " name="pincode_id" id="choices-pincode">
                                                    <option value="" selected disabled>Pincode</option>
                                                    @foreach($pincodes as $rows)
                                                    <option value="{{ $rows->pincode_id }}" @if(auth()->user()->pincode_id == $rows->pincode_id) selected @endif>
                                                        {{ $rows->pincode }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                <div class="button-row d-flex mt-4">
                                    <a href=" " class="ms-auto mb-0">
                                        <button class="ms-auto mb-0 px-6 btn bg-gradient-dark " type="submit" title="submit">Save</button></a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/plugins/choices.min.js') }}"></script>
<script>
    if (document.getElementById('choices-state')) {
        var element = document.getElementById('choices-state');
        const example = new Choices(element, {
            searchEnabled: false
        });
    };
    if (document.getElementById('choices-city')) {
        var element = document.getElementById('choices-city');
        const example = new Choices(element, {
            searchEnabled: false
        });
    };
    if (document.getElementById('choices-country')) {
        var element = document.getElementById('choices-country');
        const example = new Choices(element, {
            searchEnabled: false
        });
    };
    if (document.getElementById('choices-pincode')) {
        var element = document.getElementById('choices-pincode');
        const example = new Choices(element, {
            searchEnabled: false
        });
    };
</script>
@endsection
