@extends('school.common.school_layout')
@section('page_content_body')
<div class="container-fluid py-1">
    <div class="row">
        <div class="col-12">
            <div class="card">
            <div class="card-header pb-0">
                    <div class="d-lg-flex">
                        <div>
                            <h5 class="mb-0">{{$page_title}}</h5>
                        </div> 
                    </div> 
                </div>
                <div class="card-body ">
                    <div class="row">
                        @foreach ($files as $rows)
                        <div class="col-lg-2 col-md-3 col-sm-4 col-6 mt-3">
                            <div class="card">
                                <div class="card-header mx-4 p-3 text-center">
                                    <div
                                        class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                                        <i class="material-icons opacity-10">picture_as_pdf</i>
                                    </div>
                                </div>
                                <div class="card-body pt-0 p-3 text-center">
                                    <h6 class="text-center mb-0">{{$rows->file_name}}</h6>
                                    <span class="text-xs">{{$rows->file_details}}</span>
                                    <hr class="horizontal dark my-3">
                                    {{-- <button type="button" class="btn bg-gradient-success btn-sm mb-0">download</button> --}}
                                    <a href="{{ asset($rows->file_path) }}" download="{{ $rows->file_name }}"
                                        class="btn bg-gradient-success btn-sm mb-0">Download</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
