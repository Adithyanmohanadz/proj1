@extends('common.layout')
@section('page_content_body')
<style>
    .choices .choices__input {
        width: 100%;
    }

    .border-none {
        border-color: #fff;
    }
</style>
<div class="container-fluid  py-1 mb-6">
    <div class="row">
        <div class="col-12">
            <div class="row pt-1">
                <div class="col-12 col-lg-11 m-auto ">
                    <div class="card">
                        <div class="card-body">
                            <form id="school_registration_form" data-route="{{route('school.school_registration')}}" enctype="multipart/form-data">
                                <div class="  border-radius-xl bg-white ">
                                    <h5 class="font-weight-bolder mb-2">School Registration</h5>
                                    <div class=" ">
                                        <div class="row mt-3">
                                            <div class="col-12 col-sm-6">
                                                <div class=" mt-1 input-group input-group-dynamic ">
                                                    <label class="form-label text-primary " style="top: -.8rem; font-size: .7rem;">Coordinator</label>
                                                    <select class="form-control " name="coordinator_id" id="choices-coordinator">
                                                        <option value="" selected disabled>Select Coordinator</option>
                                                        @foreach ($coordinators as $row)
                                                        <option value="{{ $row->coordinator_id }}">{{ $row->coordinator_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-12 col-sm-6">
                                                <div class=" mt-1 input-group input-group-dynamic ">
                                                    <label class="form-label text-primary " style="top: -.8rem; font-size: .7rem;">Country</label>
                                                    <select class="form-control " name="country_id" id="choices-country">
                                                        <option value="" selected disabled>Select Country</option>
                                                        @foreach ($countries as $row)
                                                        <option value="{{ $row->country_id }}">{{ $row->country }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                                <div class=" mt-1 input-group input-group-dynamic ">
                                                    <label class="form-label text-primary " style="top: -.8rem; font-size: .7rem;">State</label>
                                                    <select class="form-control " name="reg_state_id" id="reg_state_id">
                                                        <option value="" selected disabled>Select State </option>
                                                        
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-12 col-sm-6">
                                                <div class=" mt-1 input-group input-group-dynamic ">
                                                    <label class="form-label text-primary " style="top: -.8rem; font-size: .7rem;">City</label>
                                                    <select class="form-control " name="reg_city_id" id="reg_city_id">
                                                        <option value="" selected disabled>Select City</option>
                                                       
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                                <div class=" mt-1 input-group input-group-dynamic ">
                                                    <label class="form-label text-primary " style="top: -.8rem; font-size: .7rem;">School</label>
                                                    <select class="form-control " name="reg_school_id" id="reg_school_id">
                                                        <option value="" selected disabled>Select School</option>
                                          
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-12 col-sm-6">
                                                <div class=" mt-1 input-group input-group-dynamic ">
                                                    <label class="form-label text-primary " style="top: -.8rem; font-size: .7rem;">Select Product</label>
                                                    <select class="form-control" name="reg_product_id" id="select-product" multiple>
                                                        @foreach ($products as $row)
                                                        <option value="{{ $row->product_id }}">{{ $row->product_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                   
                                            </div>
                                            <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                                <div class=" mt-1 input-group input-group-dynamic ">
                                                    <label class="form-label text-primary " style="top: -.8rem; font-size: .7rem;">Select Class</label>
                                                    <select class="form-control" name="reg_class_id" id="select-class" multiple>
                                                        @foreach ($classes as $row)
                                                        <option value="{{ $row->class_id }}">{{ $row->class }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                             
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-12 col-sm-6">
                                            <div class="input-group input-group-static">
                                                <label class="form-labe l">School Principal Name</label>
                                                <input class="  form-control" name="principal_name" type="text" />
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                            <div class="input-group input-group-static">
                                                <label class="form-labe l"> Username</label>
                                                <input class=" form-control" name="username" type="text" />
                                            </div>
                                        </div>
                                    </div>
                          
                                    <div class="row mt-3">
                                        <div class="col-12 col-sm-6">
                                            <div class="input-group input-group-static">
                                                <label class="form-labe l">Password</label>
                                                <input class="  form-control" type="password" name="password" id="password" />
                                                <i id="icon" class="far fa-eye pasw z-index-5"></i>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                            <div class="input-group input-group-static">
                                                <label class="form-labe l">Conform Password</label>
                                                <input class="  form-control" type="password" name="password_confirmation" id="c-password" />
                                                <i id="c-icon" class="far fa-eye pasw z-index-5"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-12  ">
                                            <label class="form-label mt-3">Upload Form</label><br>
                                            <input id="demo2" class="demo1 " type="file" multiple placeholder="Select Form Files" id="school_files" name="school_files" />
                                        </div>
                                    </div>
                 
                                    <div class="button-row d-flex mt-4">
                                        <button class="ms-auto mb-0 px-6 btn bg-gradient-dark " type="submit" title="submit">Submit</button>

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
<script src="{{ asset('js/plugins/choices.min.js')}}"></script>
<script src="{{ asset('js/plugins/file-upload.js')}}"></script>

<script>
    var allRegSchoolsUrl = "{{route('school.registered_schools')}}"
    var stateFetchUrl = "{{ route('school.fetch_state') }}";
    var cityFetchUrl = "{{ route('school.fetch_city') }}";
    var schoolFetchUrl = "{{ route('school.fetch_school') }}";

    if (document.getElementById('choices-coordinator')) {
        var element = document.getElementById('choices-coordinator');
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
    if (document.getElementById('choices-school')) {
        var element = document.getElementById('choices-school');
        const example = new Choices(element, {
            searchEnabled: false,
            shouldSort: false,
        });
    };

    if (document.getElementById('select-product')) {
        var element = document.getElementById('select-product');
        const example = new Choices(element, {
            removeItemButton: true,
            shouldSort: false,

        });
    }
    if (document.getElementById('select-class')) {
        var element = document.getElementById('select-class');
        const example = new Choices(element, {
            removeItemButton: true,
        });
    }
</script>
@endsection 