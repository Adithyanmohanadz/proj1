@extends('common.layout')
@section('page_content_body')
    <div class="container-fluid py-1 mb-6 vh-100">
        <div class="row">
            <div class="col-12">
                <div class="row  ">
                    <div class="col-12 col-lg-12 m-auto ">
                        <div class="card">
                            <div class="card-body">
                                <form action="" id="coordinatorForm" data-route="{{route('coordinator.store')}}" >
                                    <div class="border-radius-xl bg-white">
                                        <h5 class="font-weight-bolder mb-2">{{$page_title}}</h5>
                                        <div class=" ">
                                            <div class="row mt-3">
                                                <div class="col-12 col-sm-6">
                                                    <div class="input-group input-group-dynamic">
                                                        <label class="form-label"> Name</label>
                                                        <input class=" form-control" name="coordinator_name" type="text" />
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                                    <div class="input-group input-group-dynamic">
                                                        <label class="form-label">Username</label>
                                                        <input class=" form-control" name="username" type="text" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-12 col-sm-6">
                                                    <div class="input-group input-group-dynamic">
                                                        <label class="form-label">Mobile </label>
                                                        <input class="  form-control" name="mobile" type="tel" />
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                                    <div class="input-group input-group-dynamic">
                                                        <label class="form-label">Email </label>
                                                        <input class="  form-control" name="email" type="email" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-12 col-sm-6">
                                                    <div class="input-group input-group-dynamic">
                                                        <label class="form-label">Prefix </label>
                                                        <input class="  form-control" name="prefix" type="text" />
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                                    <div class="input-group input-group-dynamic">
                                                        <label class="form-label">Opening Balance </label>
                                                        <input class="  form-control" name="ob" type="number" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-12 col-sm-6">
                                                    <div class="input-group input-group-dynamic">
                                                        <label class="form-label">Password</label>
                                                        <input class="  form-control" type="password" name="password" id="password" />
                                                        <i id="icon" class="far fa-eye pasw z-index-5"></i>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                                    <div class="input-group input-group-dynamic">
                                                        <label class="form-label">Conform Password</label>
                                                        <input class="  form-control" name="password_confirmation" type="password" id="c-password" />
                                                        <i id="c-icon" class="far fa-eye pasw z-index-5"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-12  ">
                                                    <div class="input-group input-group-dynamic">
                                                        <label class="form-label"> Address </label>
                                                        <input class="  form-control" name="address" type="text" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-12 col-sm-3">
                                                    <select class="form-control " name="country_id" id="co_country_id">
                                                        <option value="" selected disabled >Select Country</option>
                                                        @foreach ($countries as $row)
                                                        <option value="{{ $row->country_id }}">{{ $row->country }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-12 col-sm-3 mt-3 mt-sm-0">
                                                    <select class="form-control " name="state_id" id="co_state_id">
                                                        <option value="" selected disabled >Select State</option>
                                                       
                                                    </select>
                                                </div>
                                                <div class="col-12 col-sm-3 mt-3 mt-sm-0">
                                                    <select class="form-control " name="city_id" id="co_city_id">
                                                        <option value="" selected disabled >Select City</option>
                                                        
                                                    </select>
                                                </div>
                                                <div class="col-12 col-sm-3 mt-3 mt-sm-0">
                                                        <select class="form-control " name="pincode_id" id="pincode_id">
                                                            <option value="" selected disabled >Select Pincode</option>
                                                            @foreach ($pincodes as $row)
                                                            <option value="{{ $row->pincode_id }}">{{ $row->pincode }}</option>
                                                            @endforeach
                                                        </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="button-row d-flex mt-4">
                                        <a href="all_coordinator" class="ms-auto mb-0">
                                            <button class="ms-auto mb-0 px-6 btn bg-gradient-dark " type="submit"
                                                title="submit" data-bs-toggle="modal"
                                                data-bs-target="#modal-coordinator">Submit</button>
                                        </a>
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
        var allCoordinatorsListUrl ="{{route('coordinator.allCoordinators')}}"
        var fetchStateUrl ="{{route('common.fetch_state')}}"
        var fetchCityUrl ="{{route('common.fetch_city')}}"

        if (document.getElementById('choices-country')) {
            var element = document.getElementById('choices-country');
            const example = new Choices(element, {
                searchEnabled: true,
                shouldSort: false,
            });
        };
        if (document.getElementById('choices-state')) {
            var element = document.getElementById('choices-state');
            const example = new Choices(element, {
                searchEnabled: true,
                shouldSort: false,
            });
        };
        if (document.getElementById('choices-city')) {
            var element = document.getElementById('choices-city');
            const example = new Choices(element, {
                searchEnabled: true,
                shouldSort: false,
            });
        };
    </script>
@endsection
