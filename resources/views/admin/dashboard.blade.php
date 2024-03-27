@extends('common.layout')
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

<div class="container-fluid py-1 text-uppercase mb-6">

    <div class="mt-1 d-none d-lg-block">
        <div class="row">
            <div class="col-md-12 ">
                <div class="d-flex justify-content-between align-items-center news-div bg-white">
                    <div class="d-flex flex-row flex-grow-1 flex-fill justify-content-center bg-dark py-2 text-white px-1 news   ">
                        <span class="d-flex align-items-center text-sm px-2">News&nbsp;&&nbsp;Notification</span>
                    </div>
                    <marquee class="news-scroll" behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();">
                        <a href="#"><span class="position-relative mx-2 badge bg-primary rounded-0">new</span>School level registration 2023-2024</a>
                        <a href="#"><span class="position-relative mx-2 badge bg-primary rounded-0">new</span>Training resgistration 2023-2024 </a>
                    </marquee>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4 mt-lg-5">
        <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-xl-0 mb-4">
            <a href="{{route('school.registered_schools')}}">
                <div class="card mb-4 pb-2">
                    <div class="card-header p-3 pt-2">
                        <div class="icon iicon-md icon-shape bg-gradient-info shadow text-center border-radius-md mt-n4 position-absolute">
                            <i class="material-icons opacity-10">school</i>
                        </div>
                        <div class="text-end pt-1">
                            <h5 class="mb-0 h6 text-sm">
                                Schools
                            </h5>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0  ">

                </div>
            </a>
        </div>
        <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-xl-0 mb-4">
            <a href="{{route('coordinator.allCoordinators')}}">
                <div class="card mb-4 pb-2">
                    <div class="card-header p-3 pt-2">
                        <div class="icon iicon-md icon-shape bg-gradient-light shadow text-center border-radius-md mt-n4 position-absolute">
                            <i class="material-icons opacity-10 text-dark">groups</i>
                        </div>
                        <div class="text-end pt-1">
                            <h5 class="mb-0 h6 text-sm">
                                Coordinators
                            </h5>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                </div>
            </a>
        </div>
        <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-xl-0 mb-4">
            <a href="{{route('dashboard.allOrders')}}">
                <div class="card mb-4 pb-2">
                    <div class="card-header p-3 pt-2">
                        <div class="icon iicon-md icon-shape bg-gradient-secondary shadow text-center border-radius-md mt-n4 position-absolute">
                            <i class="material-symbols-outlined opacity-10">order_approve</i>
                        </div>
                        <div class="text-end pt-1">
                            <h5 class="mb-0 h6 text-sm">
                                orders
                            </h5>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                </div>
            </a>
        </div>
        <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-xl-0 mb-4">
            <a href="{{route('stock.index')}}">
                <div class="card mb-4 pb-2">
                    <div class="card-header p-3 pt-2">
                        <div class="icon iicon-md icon-shape bg-gradient-success shadow text-center border-radius-md mt-n4 position-absolute">
                            <i class="material-symbols-outlined opacity-10">inventory_2</i>
                        </div>
                        <div class="text-end pt-1">

                            <h5 class="mb-0 h6 text-sm">
                                Stock
                            </h5>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                </div>
            </a>
        </div>
        <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-xl-0 mb-4">
            <a href="reg_pan_india">
                <div class="card mb-4 pb-2">
                    <div class="card-header p-3 pt-2">
                        <div class="icon iicon-md icon-shape bg-gradient-warning shadow text-center border-radius-md mt-n4 position-absolute">
                            <i class="material-symbols-outlined opacity-10">how_to_reg</i>
                        </div>
                        <div class="text-end pt-1">
                            <h5 class="mb-0 h6 text-sm">
                                Registrations
                            </h5>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                </div>
            </a>
        </div>
        <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-xl-0 mb-4">
            <a href="{{route('paymentList')}}">
                <div class="card mb-4 pb-2">
                    <div class="card-header p-3 pt-2">
                        <div class="icon iicon-md icon-shape bg-gradient-primary shadow text-center border-radius-md mt-n4 position-absolute">
                            <i class="material-icons opacity-10">payments</i>
                        </div>
                        <div class="text-end pt-1">
                            <h5 class="mb-0 h6 text-sm">
                                Payments
                            </h5>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                </div>
            </a>
        </div>
        <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-xl-0 mb-4">
            <a href="{{route('student.all_students')}}">
                <div class="card mb-4 pb-2">
                    <div class="card-header p-3 pt-2">
                        <div class="icon iicon-md icon-shape bg-gradient-danger shadow text-center border-radius-md mt-n4 position-absolute">
                            <i class="fas fa-user-graduate opacity-10" style='font-size:19px'></i>
                        </div>
                        <div class="text-end pt-1">
                            <h5 class="mb-0 h6 text-sm">
                                Students
                            </h5>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                </div>
            </a>
        </div>
        <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-xl-0 mb-4">
            <a href="sub_printing">
                <div class="card mb-4 pb-2">
                    <div class="card-header p-3 pt-2">
                        <div class="icon iicon-md icon-shape bg-gradient-dark shadow text-center border-radius-md mt-n4 position-absolute">
                            <i class="material-symbols-outlined opacity-10">print</i>
                        </div>
                        <div class="text-end pt-1">
                            <h5 class="mb-0 h6 text-sm">
                                Print
                            </h5>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                </div>
            </a>
        </div>
        <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-xl-0 mb-4">
            <a href="{{route('examiner.index')}}">
                <div class="card mb-4 pb-2">
                    <div class="card-header p-3 pt-2">
                        <div class="icon icon-md icon-shape bg-pink shadow text-center border-radius-md mt-n4 position-absolute">
                            <i class="material-symbols-outlined opacity-10">stylus_note</i>
                        </div>
                        <div class="text-end pt-1">
                            <h5 class="mb-0 h6 text-sm">
                                EXAMINERS
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