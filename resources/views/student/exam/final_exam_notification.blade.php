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
                                <h5 class="font-weight-bolder mb-0">{{$page_title}}</h5>
                                <div class="mt-4">
                                    @if($finalExams)
                                    <h3 class="font-weight-bolder mb-0">{{$finalExams->final_exam_name}}</h3>
                                    <div class="row mt-3">
                                        <div class="col-sm-4">
                                            <p class=" text-xs m-0">Product </p>
                                            <h6 class="   mb-5">
                                                {{$finalExams->product->product_name}}
                                            </h6>
                                        </div>
                                        <div class="col-sm-4">
                                            <p class=" text-xs m-0">Level </p>
                                            <h6 class="text-uppercase  mb-5">
                                                {{$finalExams->level->level}}
                                            </h6>
                                        </div>
                                        <div class="col-sm-4">
                                            <p class=" text-xs m-0">Class</p>
                                            <h6 class="text-uppercase  mb-5">
                                                {{$finalExams->classModel->class}}
                                            </h6>
                                        </div>

                                        <div class="col-sm-4">
                                            <p class=" text-xs m-0">Year</p>
                                            <h6 class="text-uppercase mb-5">
                                                {{$finalExams->year->year}}
                                            </h6>
                                        </div>
                                        <div class="col-sm-4">
                                            <p class=" text-xs m-0">Start Date & Time</p>
                                            <h6 class="text-uppercase mb-5">
                                                {{$finalExams->exam_start_date_time}}
                                            </h6>
                                        </div>
                                        <div class="col-sm-4">
                                            <p class=" text-xs m-0">End Date & Time</p>
                                            <h6 class="text-uppercase mb-5">
                                                {{$finalExams->exam_end_date_time}}
                                            </h6>
                                        </div>
                                        <div class="button-row d-flex mt-4 ">
                                            <button class="ms-auto mb-0 px-6 btn bg-gradient-dark " type="button" data-bs-toggle="modal" data-bs-target="#finalConfirmModel">Start The Exam</button>
                                        </div>

                                        <!-- modal -->
                                        <div class="modal fade" id="finalConfirmModel" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
                                            <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h6 class="modal-title font-weight-normal " id="modal-title-notification">Your attention is required</h6>
                                                        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <form action="" id="finalExamConfirmForm" data-route="{{route('finalExamConfirm')}}">
                                                    <div class="modal-body">
                                                        <div class="py-3 text-center">
                                                            <i class="material-icons text-secondary" style="font-size: calc(1.625rem + 4.5vw);">notifications_active</i>
                                                            <h4 class="text-gradient text-danger mt-4 text-uppercase">You should read this !</h4>
                                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit, reiciendis fuga quo nemo nisi veniam magnam cum nihil esse recusandae quis tempora optio culpa ex voluptas atque error exercitationem praesentium!</p>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="final_exam_id" id="mock_exam_id" value="{{$finalExams->final_exam_id}}">
                                                    <div class="modal-footer">
                                                     <button type="submit" class="btn btn-primary">Start</button>
                                                        <button type="button" class="btn btn-link ml-auto" data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- modal -->
                                    </div>
                                </div>
                            </div>
                            <script>
                                var FinalgoogleLink = '{{ $finalExams->google_link }}';
                            </script>
                            @else
                            <p>No Final exams found.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
