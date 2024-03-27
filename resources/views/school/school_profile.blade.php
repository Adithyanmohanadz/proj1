@extends('school.common.school_layout')
@section('page_content_body')
<div class="container-fluid  mb-6">
    <div class="row">
        <div class="col-12">
            <div class="row pt-1">
                <div class="col-12 col-lg-12 m-auto ">
                    <div class="card">
                        <div class="card-body">
                            <div class="  border-radius-xl bg-white ">
                                <h5 class="font-weight-bolder mb-0">School Info</h5>
                                <div class="mt-4">
                                    <h3 class="font-weight-bolder mb-0">{{$schoolProfile->school->school_name}}</h3>
                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <p class=" text-xs m-0">Email</p>
                                            <h6 class="   mb-4">
                                                {{$schoolProfile->school->email}}
                                            </h6>
                                        </div>
                                        <div class="col-md-6">
                                            <p class=" text-xs m-0">Mobile </p>
                                            <h6 class="text-uppercase  mb-4">
                                               {{$schoolProfile->school->mobile}}
                                            </h6>
                                        </div>
                                        <div class="col-md-6">
                                            <p class=" text-xs m-0">Address</p>
                                            <h6 class="text-uppercase  mb-4">
                                                {{$schoolProfile->school->address}}
                                            </h6>
                                        </div>

                                        <div class="col-md-6">
                                            <p class=" text-xs m-0">City</p>
                                            <h6 class="text-uppercase mb-4">
                                                {{$schoolProfile->school->schoolCity->city}}
                                            </h6>
                                        </div>
                                        <div class="col-md-6">
                                            <p class=" text-xs m-0">State</p>
                                            <h6 class="text-uppercase mb-4">
                                                {{$schoolProfile->school->schoolState->state}}
                                            </h6>
                                        </div>
                                        <div class="col-md-6">
                                            <p class=" text-xs m-0">Pin Code</p>
                                            <h6 class="text-uppercase mb-4">
                                                {{$schoolProfile->school->schoolPincode->pincode}}
                                            </h6>
                                        </div>

                                        <hr class="horizontal dark">

                                        <h5 class="font-weight-bolder mb-4">Contact Info</h5>
                                        <div class="col-md-3">
                                            <p class=" text-xs m-0"> Coordinater </p>
                                            <h6 class="text-uppercase mb-4">
                                                {{$schoolProfile->coordinator->coordinator_name}}
                                            </h6>
                                        </div>
                                        <div class="col-md-3">
                                            <p class=" text-xs m-0"> Coordinater Email </p>
                                            <h6 class="text-uppercase mb-4">
                                                {{$schoolProfile->coordinator->email}}
                                            </h6>
                                        </div>
                                        <div class="col-md-3">
                                            <p class=" text-xs m-0"> Coordinater Mobile </p>
                                            <h6 class="text-uppercase mb-4">
                                                {{$schoolProfile->coordinator->mobile}}
                                            </h6>
                                        </div>
                                        <div class="col-md-3">
                                            <p class=" text-xs m-0"> Coordinater Address </p>
                                            <h6 class="text-uppercase mb-4">
                                                {{$schoolProfile->coordinator->address}}
                                            </h6>
                                        </div>
                                        <div class="col-md-3">
                                            <p class=" text-xs m-0"> National Coordinater </p>
                                            <h6 class="text-uppercase mb-4">
                                                {{$schoolProfile->school->schoolState->nationalCoordinator->coordinator->coordinator_name}}
                                            </h6>
                                        </div>
                                        <div class="col-md-3">
                                            <p class=" text-xs m-0"> National Coordinater Email </p>
                                            <h6 class="text-uppercase mb-4">
                                                {{$schoolProfile->school->schoolState->nationalCoordinator->coordinator->email}}
                                            </h6>
                                        </div>
                                        <div class="col-md-3">
                                            <p class=" text-xs m-0"> National Coordinater Mobile </p>
                                            <h6 class="text-uppercase mb-4">
                                                {{$schoolProfile->school->schoolState->nationalCoordinator->coordinator->mobile}}
                                            </h6>
                                        </div>
                                        <div class="col-md-3">
                                            <p class=" text-xs m-0"> National Coordinater Address </p>
                                            <h6 class="text-uppercase mb-4">
                                                {{$schoolProfile->school->schoolState->nationalCoordinator->coordinator->address}}
                                            </h6>
                                        </div>
                                        <div class="col-md-3">
                                            <p class=" text-xs m-0"> Office </p>
                                            <h6 class="text-uppercase mb-4">
                                                {{$officeDetails->office_name}}
                                            </h6>
                                        </div>
                                        <div class="col-md-3">
                                            <p class=" text-xs m-0"> Office Email </p>
                                            <h6 class="text-uppercase mb-4">
                                                {{$officeDetails->email}}
                                            </h6>
                                        </div>
                                        <div class="col-md-3">
                                            <p class=" text-xs m-0"> Office Mobile </p>
                                            <h6 class="text-uppercase mb-4">
                                                {{$officeDetails->mobile_number}}
                                            </h6>
                                        </div>
                                        <div class="col-md-3">
                                            <p class=" text-xs m-0"> Office Address </p>
                                            <h6 class="text-uppercase mb-4">
                                                {{$officeDetails->address}}
                                            </h6>
                                        </div>
                                        <hr class="horizontal dark">
                                    </div>
                                </div>
                                <form class=" ">
                                    <h5 class="font-weight-bolder mb-2">Principal Info</h5>
                                    <div class=" ">
                                        <div class="row mt-3">
                                            <div class="col-12 col-sm-6">
                                                <div class="input-group input-group-dynamic">
                                                    <label class="form-label"> Name</label>
                                                    <input class="  form-control" type="text" />
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                                <div class="input-group input-group-dynamic">
                                                    <label class="form-label">UserName</label>
                                                    <input class=" form-control" type="text" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-12 col-sm-6">
                                                <div class="input-group input-group-dynamic">
                                                    <label class="form-label">Mobile </label>
                                                    <input class="  form-control" type="tel" />
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                                <div class="input-group input-group-dynamic">
                                                    <label class="form-label">Email </label>
                                                    <input class="  form-control" type="email" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-12 col-sm-6">
                                                <div class="input-group input-group-dynamic">
                                                    <label class="form-label">Password</label>
                                                    <input class="  form-control" type="password" />
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                                <div class="input-group input-group-dynamic">
                                                    <label class="form-label">Conform Password</label>
                                                    <input class="  form-control" type="password" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="button-row d-flex mt-4">
                                        <a href="" class="ms-auto mb-0"><button class=" px-6 btn bg-gradient-dark " type="button" title="submit">Save</button></a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
