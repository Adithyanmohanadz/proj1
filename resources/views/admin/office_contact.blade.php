@extends('common.layout')
@section('page_content_body')
<div class="container-fluid py-1">
    <div class="row">
        <div class="col-12">
            <div class="row  ">
                <div class="col-12  m-auto ">
                    <div class="card">
                        <div class="card-body">
                            <form id="officeContactForm" data-route="{{route('officeContact.store')}}">
                                <div class="border-radius-xl bg-white">
                                    <h5 class="font-weight-bolder mb-2">Office Contact Info</h5> 
                                    <div class=" "> 
                                        <div class="row mt-3">
                                            <div class="col-12 col-sm-6">
                                                <div class="input-group input-group-dynamic ">
                                                    <label for="validationCustom01" class="form-label">Office Name</label>
                                                    <input class="form-control" value="{{ optional($officeContact)->office_name }}" name="office_name" type="text" id="validationCustom01"/>
                                                </div>
                                            </div> 
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-12 col-sm-6">
                                                <div class="input-group input-group-dynamic ">
                                                    <label class="form-label">Mobile Number</label>
                                                    <input class="form-control" value="{{ optional($officeContact)->mobile_number }}" name="mobile_number" type="number" />
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 mt-3 mt-sm-0">

                                                <div class="input-group input-group-dynamic ">
                                                    <label class="form-label">Email </label>
                                                    <input class="  form-control" value="{{ optional($officeContact)->email }}" name="email" type="email" />
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="row mt-3">
                                            <div class="col-12  ">
                                                <div class="input-group input-group-dynamic">
                                                    <label class="form-label"> Address </label>
                                                    <input class="  form-control" value="{{ optional($officeContact)->address }}" name="address" type="text" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                <div class="button-row d-flex mt-4">
                                    <button class="ms-auto mb-0 px-6 btn bg-gradient-dark " type="submit" title="submit">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
@endsection
