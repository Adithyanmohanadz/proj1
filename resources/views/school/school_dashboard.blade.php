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

<div class="container-fluid py-1 text-uppercase mb-6">

    <div class="mt-1 d-none d-lg-block">
        <div class="row">
            <div class="col-md-12 ">
                <div class="d-flex justify-content-between align-items-center news-div bg-white">
                    <div class="d-flex flex-row flex-grow-1 flex-fill justify-content-center bg-primary py-2 text-white px-1 news   ">
                        <span class="d-flex align-items-center px-2">Notification</span>
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
            <a href="{{route('school.schoolProfile')}}">
                <div class="card mb-4 pb-2">
                    <div class="card-header p-3 pt-2">
                        <div class="icon icon-lg icon-shape bg-gradient-primary shadow text-center border-radius-md mt-n4 position-absolute">
                            <i class="material-symbols-outlined opacity-10">school</i>
                        </div>
                        <div class="text-end pt-1">
                            <h5 class="mb-0 h6">
                                School Profile
                            </h5>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0"> 
                </div>
            </a>
        </div> 
        <div class="col-lg-3 col-md-4 col-sm-6 mb-xl-0 mb-4">
            <a href="{{route('school.schoolStudentList')}}">
                <div class="card mb-4 pb-2">
                    <div class="card-header p-3 pt-2">
                        <div class="icon icon-lg icon-shape bg-gradient-danger shadow text-center border-radius-md mt-n4 position-absolute">
                            <i class="fas fa-user-graduate opacity-10" style='font-size:19px'></i>
                        </div>
                        <div class="text-end pt-1">
                            <h5 class="mb-0 h6">
                                Student
                            </h5>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0"> 
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 mb-xl-0 mb-4">
            <a href="school_registration_r">
                <div class="card mb-4 pb-2">
                    <div class="card-header p-3 pt-2">
                        <div class="icon icon-lg icon-shape bg-gradient-warning shadow text-center border-radius-md mt-n4 position-absolute">
                            <i class="material-symbols-outlined opacity-10">how_to_reg</i>
                        </div>
                        <div class="text-end pt-1">
                            <h5 class="mb-0 h6">
                                registration
                            </h5>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0"> 
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 mb-xl-0 mb-4">
            <a href="{{route('school.examView')}}">
                <div class="card mb-4 pb-2">
                    <div class="card-header p-3 pt-2">
                        <div class="icon icon-lg icon-shape bg-gradient-success shadow text-center border-radius-md mt-n4 position-absolute">
                            <i class="material-symbols-outlined opacity-10">stylus</i>
                        </div>
                        <div class="text-end pt-1">
                            <h5 class="mb-0 h6">
                                  Exam
                            </h5>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0"> 
                </div>
            </a>
        </div>  
        <div class="col-lg-3 col-md-4 col-sm-6 mb-xl-0 mb-4">
            <a href="school_result">
                <div class="card mb-4 pb-2">
                    <div class="card-header p-3 pt-2">
                        <div class="icon icon-lg icon-shape bg-gradient-secondary shadow text-center border-radius-md mt-n4 position-absolute">
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
            <a href="{{route('allResource')}}">
                <div class="card mb-4 pb-2">
                    <div class="card-header p-3 pt-2">
                        <div class="icon icon-lg icon-shape bg-gradient-info shadow text-center border-radius-md mt-n4 position-absolute">
                            <i class="material-symbols-outlined opacity-10">note_stack</i>
                        </div>
                        <div class="text-end pt-1">
                            <h5 class="mb-0 h6">
                            Resources
                            </h5>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0"> 
                </div>
            </a>
        </div>  
        <div class="col-lg-3 col-md-4 col-sm-6 mb-xl-0 mb-4">
            <a href="{{route('uploadOrder.index')}}">
                <div class="card mb-4 pb-2">
                    <div class="card-header p-3 pt-2">
                        <div class="icon icon-lg icon-shape bg-gradient-light shadow text-center border-radius-md mt-n4 position-absolute">
                            <i class="material-symbols-outlined opacity-10 text-dark">docs_add_on</i>
                        </div>
                        <div class="text-end pt-1">
                            <h5 class="mb-0 h6">
                            School Order
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
