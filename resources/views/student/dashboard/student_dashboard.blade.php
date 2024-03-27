@extends('student.common.student_layout')
@section('page_content_body')
    <style>
        .news {
            width: 160px;
            border-radius: 10px 0px 0px 10px;
        }
        .news-div {
            border-radius: 10px;
        }
    </style>
    <div class="container-fluid py-1 mb-6">
        <div class="mt-1 d-none d-lg-block">
            <div class="row">
                <div class="col-md-12 ">
                    <div class="d-flex justify-content-between align-items-center news-div bg-white">
                        <div
                            class="d-flex flex-row flex-grow-1 flex-fill justify-content-center bg-primary py-2 text-white px-1 news   ">
                            <span class="d-flex align-items-center px-2">Notification</span>
                        </div>
                        <marquee class="news-scroll" behavior="scroll" direction="left" onmouseover="this.stop();"
                            onmouseout="this.start();">
                            <a href="#"><span
                                    class="position-relative mx-2 badge bg-primary rounded-0">new</span>School level
                                registration 2023-2024</a>
                            <a href="#"><span
                                    class="position-relative mx-2 badge bg-primary rounded-0">new</span>Training
                                resgistration 2023-2024 </a>
                        </marquee>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4 pt-1">
            <div class="col-12 col-lg-12 m-auto ">
                <div class="card">
                    <div class="card-body">
                        <div class="  border-radius-xl bg-white ">
                            <div class="">
                                <h3 class="font-weight-bolder mb-0 text-uppercase">{{auth()->user()->student_name}}</h3>
                                <div class="row mt-4">
                                    <div class="col-6 col-sm-3">
                                        <p class=" text-xs m-0">Product </p>
                                        <h6 class=" text-uppercase   ">
                                            {{ auth()->user()->product->product_name }}
                                        </h6>
                                    </div>
                                    <div class="col-6 col-sm-3">
                                        <p class=" text-xs m-0">Level </p>
                                        <h6 class="text-uppercase   ">
                                            {{$currentLevel}}
                                        </h6>
                                    </div>
                                    <div class="col-6 col-sm-3">
                                        <p class=" text-xs m-0">Class</p>
                                        <h6 class="text-uppercase   ">
                                            {{ auth()->user()->class->class }}
                                        </h6>
                                    </div>
                                    <div class="col-6 col-sm-3">
                                        <p class=" text-xs m-0">Year</p>
                                        <h6 class="text-uppercase  ">
                                            Year
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if ($studentPurchaseStatus==0)   
                    <div class="card-body m-0">
                        <div class="  border-radius-xl bg-gradient-primary  p-3">
                            <div class="">
                                <h3 class="font-weight-bolder text-white mb-0">Eligibility </h3>
                                <div class="d-lg-flex mt-3">
                                    <div>
                                        <h5 class="mb-0 text-white">you are eligibil fo next level</h5>

                                    </div>

                                    <div class="ms-auto my-auto mt-lg-0 mt-4">
                                        <div class="ms-auto my-auto">
                                            <a href="{{route('studentDashboard.studentNextLevelRegistration')}}" class="btn bg-light btn-sm mb-0 "
                                                type="button">register to Next Level</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="row mt-4 mt-lg-5 text-uppercase">
            <div class="col-lg-3 col-md-4 col-sm-6 mb-xl-0 mb-4">
                <a href="{{route('student.profile')}}">
                    <div class="card mb-4 pb-2">
                        <div class="card-header p-3 pt-2">
                            <div
                                class="icon icon-lg icon-shape bg-gradient-primary shadow text-center border-radius-md mt-n4 position-absolute">
                                <i class="fas fa-user-graduate opacity-10 ps-1" style='font-size:19px'></i>
                            </div>
                            <div class="text-end pt-1">
                                <h5 class="mb-0 h6">
                                    Student Profile
                                </h5>
                            </div>
                        </div>
                        <hr class="dark horizontal my-0">
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 mb-xl-0 mb-4">
                <a href="{{route('studentres')}}">
                    <div class="card mb-4 pb-2">
                        <div class="card-header p-3 pt-2">
                            <div
                                class="icon icon-lg icon-shape bg-gradient-success shadow text-center border-radius-md mt-n4 position-absolute">
                                <i class="material-symbols-outlined opacity-10">picture_as_pdf</i>
                            </div>
                            <div class="text-end pt-1">

                                <h5 class="mb-0 h6">
                                    E-Resources
                                </h5>
                            </div>
                        </div>
                        <hr class="dark horizontal my-0">
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 mb-xl-0 mb-4">
                <a href="{{route('mockExamNotification.index')}}">
                    <div class="card mb-4 pb-2">
                        <div class="card-header p-3 pt-2">
                            <div
                                class="icon icon-lg icon-shape bg-gradient-danger shadow text-center border-radius-md mt-n4 position-absolute">
                                <i class=" material-symbols-outlined opacity-10">stylus_note</i>
                            </div>
                            <div class="text-end pt-1">
                                <h5 class="mb-0 h6">
                                    Mock Exam
                                </h5>
                            </div>
                        </div>
                        <hr class="dark horizontal my-0">
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 mb-xl-0 mb-4">
                <a href="{{route('finalExamNotification.index')}}">
                    <div class="card mb-4 pb-2">
                        <div class="card-header p-3 pt-2">
                            <div
                                class="icon icon-lg icon-shape bg-gradient-danger shadow text-center border-radius-md mt-n4 position-absolute">
                                <i class=" material-symbols-outlined opacity-10">stylus_note</i>
                            </div>
                            <div class="text-end pt-1">
                                <h5 class="mb-0 h6">
                                    Final Exam
                                </h5>
                            </div>
                        </div>
                        <hr class="dark horizontal my-0">
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 mb-xl-0 mb-4">
                <a href="{{route('studentExaminer')}}">
                    <div class="card mb-4 pb-2">
                        <div class="card-header p-3 pt-2">
                            <div
                                class="icon icon-lg icon-shape bg-gradient-secondary shadow text-center border-radius-md mt-n4 position-absolute">
                                <i class=" material-symbols-outlined opacity-10">stylus_note</i>
                            </div>
                            <div class="text-end pt-1">
                                <h5 class="mb-0 h6">
                                    Examiners
                                </h5>
                            </div>
                        </div>
                        <hr class="dark horizontal my-0">
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 mb-xl-0 mb-4">
                <a href="student_result">
                    <div class="card mb-4 pb-2">
                        <div class="card-header p-3 pt-2">
                            <div
                                class="icon icon-lg icon-shape bg-gradient-warning shadow text-center border-radius-md mt-n4 position-absolute">
                                <i class="material-symbols-outlined opacity-10">list_alt</i>
                            </div>
                            <div class="text-end pt-1">
                                <h5 class="mb-0 h6">
                                    Result
                                </h5>
                            </div>
                        </div>
                        <hr class="dark horizontal my-0">
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 mb-xl-0 mb-4">
                <a href="student_payment">
                    <div class="card mb-4 pb-2">
                        <div class="card-header p-3 pt-2">
                            <div
                                class="icon icon-lg icon-shape bg-gradient-info shadow text-center border-radius-md mt-n4 position-absolute">
                                <i class="material-symbols-outlined opacity-10">Payments</i>
                            </div>
                            <div class="text-end pt-1">
                                <h5 class="mb-0 h6">
                                    Payment
                                </h5>
                            </div>
                        </div>
                        <hr class="dark horizontal my-0">
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 mb-xl-0 mb-4">
                <a href="{{route('student.studentOfficeContact')}}">
                    <div class="card mb-4 pb-2">
                        <div class="card-header p-3 pt-2">
                            <div
                                class="icon icon-lg icon-shape bg-gradient-dark shadow text-center border-radius-md mt-n4 position-absolute">
                                <i class="material-symbols-outlined opacity-10">call</i>
                            </div>
                            <div class="text-end pt-1">
                                <h5 class="mb-0 h6">
                                    Contact Us
                                </h5>
                            </div>
                        </div>
                        <hr class="dark horizontal my-0">
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
