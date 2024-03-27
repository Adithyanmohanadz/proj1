@extends('student.common.student_layout')
@section('page_content_body')
<div class="container-fluid py-1 mb-6">
    <div class="row">
        <div class="col-12">
            <div class="row ">
                <div class="col-12 col-lg-11 m-auto ">
                    <div class="card">
                        <div class="card-body">
                            <div class="  border-radius-xl bg-white ">

                                <h5 class="font-weight-bolder mb-3">Coordinater Contact Info</h5>
                                <div class="row mt-3">
                                    <div class="col-md-3">
                                        <p class=" text-xs m-0">Coordinater Name</p>
                                        <h6 class="text-uppercase  mb-4">
                                            {{$coordinator->school->schoolRegistration->coordinator->coordinator_name}}
                                        </h6>
                                    </div>
                                    <div class="col-md-3">
                                        <p class=" text-xs m-0">Coordinater Address</p>
                                        <h6 class="text-uppercase  mb-4">
                                            {{$coordinator->school->schoolRegistration->coordinator->address}}
                                        </h6>
                                    </div>
                                    <div class="col-md-3">
                                        <p class=" text-xs m-0">Coordinater Email</p>
                                        <h6 class="   mb-4">
                                            {{$coordinator->school->schoolRegistration->coordinator->email}}
                                        </h6>
                                    </div>
                                    <div class="col-md-3">
                                        <p class=" text-xs m-0">Coordinater Mobile </p>
                                        <h6 class="text-uppercase  mb-4">
                                            {{$coordinator->school->schoolRegistration->coordinator->mobile}}
                                        </h6>
                                    </div>
                                </div>
                                <hr class="horizontal dark">
                                <h5 class="font-weight-bolder mb-3">National Coordinater Contact Info</h5>
                                <div class="row mt-3">
                                    <div class="col-md-3">
                                        <p class=" text-xs m-0">National Coordinater Name</p>
                                        <h6 class="text-uppercase  mb-4">
                                            {{$nationalCoordinator->school->schoolState->nationalCoordinator->coordinator->coordinator_name}}
                                        </h6>
                                    </div>
                                    <div class="col-md-3">
                                        <p class=" text-xs m-0">National Coordinater Address</p>
                                        <h6 class="text-uppercase  mb-4">
                                            {{$nationalCoordinator->school->schoolState->nationalCoordinator->coordinator->address}}
                                        </h6>
                                    </div>
                                    <div class="col-md-3">
                                        <p class=" text-xs m-0">National Coordinater Email</p>
                                        <h6 class="   mb-4">
                                            {{$nationalCoordinator->school->schoolState->nationalCoordinator->coordinator->email}}
                                        </h6>
                                    </div>
                                    <div class="col-md-3">
                                        <p class=" text-xs m-0">National Coordinater Mobile </p>
                                        <h6 class="text-uppercase  mb-4">
                                            {{$nationalCoordinator->school->schoolState->nationalCoordinator->coordinator->mobile}}
                                        </h6>
                                    </div>
                                </div>
                                <hr class="horizontal dark">
                                <h5 class="font-weight-bolder mb-3">Office Contact Info</h5>
                                <div class="row mt-3">
                                    <div class="col-md-3">
                                        <p class=" text-xs m-0">Office Name</p>
                                        <h6 class="text-uppercase  mb-4">
                                            {{$officeContact->office_name}}
                                        </h6>
                                    </div>
                                    <div class="col-md-3">
                                        <p class=" text-xs m-0">Office Address</p>
                                        <h6 class="text-uppercase  mb-4">
                                            {{$officeContact->address}}
                                        </h6>
                                    </div>
                                    <div class="col-md-3">
                                        <p class=" text-xs m-0">Office Email</p>
                                        <h6 class="   mb-4">
                                            {{$officeContact->email}}
                                        </h6>
                                    </div>
                                    <div class="col-md-3">
                                        <p class=" text-xs m-0">Office Mobile </p>
                                        <h6 class="text-uppercase  mb-4">
                                            {{$officeContact->mobile_number}}
                                        </h6>
                                    </div>
                                </div>
                                <hr class="horizontal dark">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
