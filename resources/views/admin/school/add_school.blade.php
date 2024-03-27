@extends('common.layout')
@section('page_content_body')
<style>
    .pic-holder {
        border-radius: 10px;
        width: 400px;
        max-height: 200px;
        height: 100%;
    }
</style>
<div class="container-fluid  mb-6">
    <div class="row">
        <div class="col-12">
            <div class="row pt-4">
                <div class="col-12 col-lg-11 m-auto ">
                    <div class="card">
                        <div class="card-body">
                            <form id="add_school_form" data-route="{{route('school.add_school_store')}}" >
                                @csrf
                                <div class="  border-radius-xl bg-white ">
                                    <h5 class="font-weight-bolder mb-2">Add School  </h5> 
                                    <div class="button-row d-flex mt-n5">
                                        <div class="ms-auto my-auto">

                                            <a href="{{route('school.all_schools')}}" class="btn bg-gradient-primary btn-sm mb-0">List Of School</a>

                                            <button type="button" class="btn btn-outline-primary btn-sm ms-auto mb-0" data-bs-toggle="modal" data-bs-target="#import">
                                                upload
                                            </button>
                                        </div>

                                        <div class="modal fade" id="import" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog mt-lg-10">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="ModalLabel">Import CSV</h5>
                                                        <i class="material-icons ms-3">file_upload</i>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>You can browse your computer for a file.</p>
                                                        <div class="input-group input-group-outline mb-3">
                                                            <input type="file" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn bg-gradient-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                                                        <button type="button" class="btn bg-gradient-primary btn-sm">Upload</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class=" ">
                                        <div class="row mt-3">
                                            <div class="col-12 col-sm-6">
                                                <div class="input-group input-group-dynamic">
                                                    <label class="form-label">Name</label>
                                                    <input class="  form-control" name="school_name" type="text" />
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                                <div class="input-group input-group-dynamic">
                                                    <label class="form-label">Email  </label>
                                                    <input class="  form-control" name="email" type="text" />
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
                                                    <label class="form-label">Address </label>
                                                    <input class=" form-control" name="address" type="text" />
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="row mt-3">
                                            <div class="col-12 col-sm-3">
                                                <select class="form-control " name="country_id" id="country_id">
                                                    <option value="" selected disabled >Select Country</option>
                                                    @foreach ($countries as $row)
                                                    <option value="{{ $row->country_id }}">{{ $row->country }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-12 col-sm-3 mt-3 mt-sm-0">
                                                <select class="form-control " name="state_id" id="state_id">
                                                    <option value="" selected disabled >Select State</option>
                                                    
                                                </select>
                                            </div>
                                            <div class="col-12 col-sm-3 mt-3 mt-sm-0">
                                                <select class="form-control " name="city_id" id="city_id">
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
                                    <div class="button-row d-flex mt-4">
                                       <button type="submit" class="ms-auto mb-0 px-6 btn bg-gradient-dark " type="button" title="submit">Submit</button>
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
<script src="{{ asset('js/plugins/choices.min.js')}}"></script>

<script>
    var All_school_list_url = "{{ route('school.all_schools') }}";
    var stateFetchUrl = "{{ route('school.fetch_state') }}";
    var cityFetchUrl = "{{ route('school.fetch_city') }}";

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
</script>
@endsection    
