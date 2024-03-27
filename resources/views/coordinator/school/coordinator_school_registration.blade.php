@extends('coordinator.common.coordinator_layout')
@section('page_content_body')
    <div class="container-fluid  ">
        <div class="row">
            <div class="col-12">
                <div class="row pt-4">
                    <div class="col-12 col-lg-11 m-auto ">
                        <div class="card">
                            <div class="card-body">
                                <form id="coordinatorRegisterSchoolForm"
                                    data-route="{{ route('coordinator.schoolRegistrationStore') }}"
                                    enctype="multipart/form-data">
                                    <div class="  border-radius-xl bg-white ">
                                        <h5 class="font-weight-bolder mb-2">{{$page_title}}</h5>
                                        <div class=" ">
                                            <div class="row mt-3">
                                                <div class="col-12 col-sm-4">
                                                    <select class="form-control " name="country_id" id="cr_country_id">
                                                        <option value="" selected disabled>Select Country</option>
                                                        @foreach ($countries as $row)
                                                            <option value="{{ $row->country_id }}">{{ $row->country }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-12 col-sm-4 mt-3 mt-sm-0">
                                                    <select class="form-control " name="state_id" id="cr_state_id">
                                                        <option value="" selected disabled>Select State</option>

                                                    </select>
                                                </div>
                                                <div class="col-12 col-sm-4 mt-3 mt-sm-0">
                                                    <select class="form-control " name="city_id" id="cr_city_id">
                                                        <option value="" selected disabled>Select City</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-12  ">
                                                    <select class="form-control " name="cr_school_id" id="cr_school_id">
                                                        <option value="" selected disabled>Select School</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-12 col-sm-6">
                                                <div class=" mt-1 input-group input-group-dynamic ">
                                                    <label class="form-label text-primary "
                                                        style="top: -.8rem; font-size: .7rem;">Select Product</label>
                                                    <select class="form-control" name="reg_product_id" id="product_ids"
                                                        multiple>
                                                        @foreach ($products as $row)
                                                            <option value="{{ $row->product_id }}">{{ $row->product_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                            </div>
                                            <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                                <div class=" mt-1 input-group input-group-dynamic ">
                                                    <label class="form-label text-primary "
                                                        style="top: -.8rem; font-size: .7rem;">Select Class</label>
                                                    <select class="form-control" name="reg_class_id" id="class_ids"
                                                        multiple>
                                                        @foreach ($classes as $row)
                                                            <option value="{{ $row->class_id }}">{{ $row->class }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-12 col-sm-6">
                                                <div class="input-group input-group-dynamic">
                                                    <label class="form-label">School Principal Name</label>
                                                    <input class=" form-control" name="principal_name" type="text" />
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                                <div class="input-group input-group-dynamic">
                                                    <label class="form-label">UserName</label>
                                                    <input class="form-control" name="username" type="text" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-12 col-sm-6">
                                                <div class="input-group input-group-dynamic">
                                                    <label class="form-label">Password</label>
                                                    <input class="  form-control" type="password" name="password"
                                                        id="password" />
                                                    <i id="icon" class="far fa-eye pasw z-index-5"></i>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                                <div class="input-group input-group-dynamic">
                                                    <label class="form-label">Conform Password</label>
                                                    <input class="  form-control" type="password"
                                                        name="password_confirmation" id="c-password" />
                                                    <i id="c-icon" class="far fa-eye pasw z-index-5"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-12  ">
                                                <label class="form-label mt-3">Upload Form</label><br>
                                                <input id="demo2" class="demo1 " type="file" multiple
                                                    placeholder="Select Form Files" id="school_files" name="school_files" />
                                            </div>
                                        </div>
                                        <div class="button-row d-flex mt-4">
                                            <button class="ms-auto mb-0 px-6 btn bg-gradient-dark " type="submit"
                                                title="submit">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
    <script src="{{ asset('js/plugins/choices.min.js') }}"></script>
    <script src="{{ asset('js/plugins/file-upload.js') }}"></script>

    <script>
        var fetchStateUrl = "{{ route('coordinatorSchool.fetch_state')}}"
        var fetchCityUrl = "{{ route('coordinatorSchool.fetch_city')}}"
        var fetchSchoolUrl = "{{ route('coordinatorSchool.fetch_school')}}"

        if (document.getElementById('choices-school')) {
            var element = document.getElementById('choices-school');
            const example = new Choices(element, {
                searchEnabled: false,
                shouldSort: false,
            });
        };
        if (document.getElementById('choices-country')) {
            var element = document.getElementById('choices-country');
            const example = new Choices(element, {
                searchEnabled: false,
                shouldSort: false,
            });
        };
        if (document.getElementById('choices-state')) {
            var element = document.getElementById('choices-state');
            const example = new Choices(element, {
                searchEnabled: false,
                shouldSort: false,
            });
        };
        if (document.getElementById('choices-city')) {
            var element = document.getElementById('choices-city');
            const example = new Choices(element, {
                searchEnabled: false,
                shouldSort: false,
            });
        };
        if (document.getElementById('product_ids')) {
            var element = document.getElementById('product_ids');
            const example = new Choices(element, {
                removeItemButton: true,
                shouldSort: false,

            });
        }
        if (document.getElementById('class_ids')) {
            var element = document.getElementById('class_ids');
            const example = new Choices(element, {
                removeItemButton: true,
            });
        }
    </script>
@endsection
