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
                                    <h5 class="font-weight-bolder mb-0">Online Registration</h5>
                                    <div class="mt-4">
                                        <h3 class="font-weight-bolder mb-0">{{auth()->user()->student_name}}</h3>
                                        <div class="row mt-3">
                                            <div class="col-sm-12">
                                                <p class=" text-xs m-0">Coordinator </p>
                                                <h6 class=" text-uppercase  mb-4">
                                                    {{ $studentData->school->schoolRegistration->coordinator->coordinator_name }}
                                                </h6>
                                            </div>
                                            <div class="col-sm-12">
                                                <p class=" text-xs m-0">School </p>
                                                <h6 class=" text-uppercase  mb-4">
                                                    {{ $studentData->school->school_name }}
                                                </h6>
                                            </div>
                                            <div class="col-sm-4">
                                                <p class=" text-xs m-0">Product </p>
                                                <h6 class=" text-uppercase  mb-4">
                                                    {{ $currentData->product->product_name }}
                                                </h6>
                                            </div>
                                            <div class="col-sm-4">
                                                <p class=" text-xs m-0">Level </p>
                                                <h6 class="text-uppercase  mb-4">
                                                    {{ $currentData->mc->level }}
                                                </h6>
                                            </div>
                                            <div class="col-sm-4">
                                                <p class=" text-xs m-0">Class</p>
                                                <h6 class="text-uppercase  mb-4">
                                                    {{ $currentData->class->class }}
                                                </h6>
                                            </div>
                                            <div class="col-sm-12">
                                                <p class=" text-xs m-0">Material Name</p>
                                                <h6 class="text-uppercase  mb-4">
                                                    {{ $materialData->material_name }}
                                                </h6>
                                            </div>
                                            <div class="col-sm-12">
                                                <p class=" text-xs m-0">Amount</p>
                                                <h6 class="text-uppercase  mb-4">
                                                    {{ $materialData->material_price }}
                                                </h6>
                                            </div>
                                            <form id="studentMaterialPurchaseForm" action="" data-route="{{route('studentDashboard.materialPurchase')}}" >
                                                <input type="hidden" name="product_id"
                                                    value="{{ $currentData->product_id }}">
                                                <input type="hidden" name="level_id"
                                                    value="{{ $currentData->material_category_id }}">
                                                <input type="hidden" name="class_id"
                                                    value="{{ $currentData->class_id }}">
                                                <input type="hidden" name="school_id"
                                                    value="{{ $studentData->school->school_id }}">
                                                <input type="hidden" name="material_id"
                                                    value="{{ $materialData->material_id }}">
                                                    <input type="hidden" name="coordinator_id"
                                                    value="{{ $studentData->school->schoolRegistration->coordinator->coordinator_id }} ">                                                   
                                                <div class="button-row d-flex mt-4 ">
                                                    <button class="ms-auto mb-0 px-6 btn bg-gradient-primary "
                                                        type="submit">Pay</button>
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
        </div>
    </div>
@endsection
<script>
    var dashboardUrl = "{{route('studentDashboard')}}";

</script>