@extends('student.common.student_layout')
@section('page_content_body')
    <div class="container-fluid py-1 mb-6">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-lg-flex">
                            <div>
                                <h5 class="mb-0">E-Resources</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-lg-2 col-md-3 col-sm-4 col-6 mt-3">
                                <div class="card">
                                    <div class="card-header mx-4 p-3 text-center">
                                        <div
                                            class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                                            <i class="material-icons opacity-10">picture_as_pdf</i>
                                        </div>
                                    </div>
                                    <div class="card-body pt-0 p-3 text-center">
                                        <h6 class="text-center mb-0">{{ $material->material_name }}</h6>
                                        <span class="text-xs">File Details</span>
                                        <hr class="horizontal dark my-3">
                                        @if ($material->material_resource)
                                            <a class="btn btn-primary btn-sm text-xs"
                                                href="{{ asset($material->material_resource) }}" download>Download</a>
                                        @else
                                            <p>No file available</p>
                                        @endif
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
