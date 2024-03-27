@extends('school.common.school_layout')
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
<div class="container-fluid py-1 text-uppercase">
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
        <div class="col-lg-3 col-md-4 col-sm-6 mb-xl-0 mb-4">
            <a href="{{route('school.SchoolViewMockExamList')}}">
                <div class="card mb-4">
                    <div class="card-header p-3 pt-2">
                        <div class="icon icon-lg icon-shape bg-gradient-success shadow text-center border-radius-md mt-n4 position-absolute">
                            <i class="material-symbols-outlined opacity-10">stylus</i>
                        </div>
                        <div class="text-end pt-1">
                            <h5 class="mb-0 h6">
                                Mock
                            </h5>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer d-flex p-1">
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 mb-xl-0 mb-4">
            <a href="{{route('school.SchoolViewFinalExamList')}}">
                <div class="card mb-4">
                    <div class="card-header p-3 pt-2">
                        <div class="icon icon-lg icon-shape bg-gradient-success shadow text-center border-radius-md mt-n4 position-absolute">
                            <i class="material-symbols-outlined opacity-10">stylus</i>
                        </div>
                        <div class="text-end pt-1">
                            <h5 class="mb-0 h6">
                            Final
                            </h5>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer d-flex p-1">
                  
                </div>
            </a>
        </div>  
    </div>
</div>
@endsection
