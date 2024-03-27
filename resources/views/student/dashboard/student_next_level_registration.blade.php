@extends('student.common.student_layout')
@section('page_content_body')
<div class="container-fluid  mb-6">
    <div class="row">
        <div class="col-12">
            <div class="row pt-1">
                <div class="col-12 col-lg-12 m-auto ">
                    <div class="card">
                        <div class="card-body">

                            <div class="  border-radius-xl bg-white ">
                                <h5 class="font-weight-bolder mb-0">Registration</h5>
                                <div class="mt-4">
                                    <h3 class="font-weight-bolder mb-0">For Online Registration</h3>
                                    <div class="row mt-3">  

                                        <div class="button-row d-flex ">
                                            <a href="{{route('studentDashboard.onlineRegistration')}}" class="ms-auto mb-0 px-6 btn bg-gradient-primary " type="button">Next</a>
                                        </div> 

                                    </div>
                                </div>
                                <div class="mt-4">
                                    <h3 class="font-weight-bolder mb-0">For Offline Registration</h3>
                                    <div class="row mt-3">
                                        <div class="col-sm-4"> 
                                            <h6 class="">
                                                Pleace Contact your School Or Coordinator
                                            </h6>
                                        </div> 

                                        <div class="button-row d-flex ">
                                            <a href="{{route('student.studentOfficeContact')}}" class="ms-auto mb-0 px-6 btn bg-gradient-secondary " type="button">Contact</a>
                                        </div> 

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
