@extends('student.common.student_layout')
@section('page_content_body')
<div class="container-fluid  mb-6">
    <div class="row">
        <div class="col-12">
            <div class="row pt-1">
                <div class="col-12 col-lg-12 m-auto ">
                    <div class="card">
                        <div class="card-body">
                            @if ($examinerData)
                            <div class="  border-radius-xl bg-white ">
                                <h5 class="font-weight-bolder mb-0">Examiner</h5>
                                <div class="mt-4">
                                    <h3 class="font-weight-bolder mb-0">{{$examinerData->examiner_name}}</h3>
                                    <div class="row mt-3">
                                        <div class="col-sm-4">
                                            <p class=" text-xs m-0">Mobile </p>
                                            <h6 class="   mb-5">
                                                {{$examinerData->mobile}}
                                            </h6>
                                        </div>
                                        <div class="col-sm-4">
                                            <p class=" text-xs m-0">Email </p>
                                            <h6 class="text-uppercase  mb-5">
                                                {{$examinerData->email}}
                                            </h6>
                                        </div>
                                        @if ($examinerData->meet_link)
                                        <div class="col-sm-12">
                                            <p class=" text-xs m-0">Link</p>                                                
                                                <a href="{{$examinerData->meet_link}}" target="_blank">{{$examinerData->meet_link}}</a>
                                            </h6>
                                        </div>   
                                        @else
                                        <h6>No link added</h6>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @else
                            <h5>Examiner not added</h5>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
