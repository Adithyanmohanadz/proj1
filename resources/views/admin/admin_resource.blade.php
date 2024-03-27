@extends('common.layout')
@section('page_content_body')
    <div class="container-fluid py-1 mb-6">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form id="adminResourceForm" data-route="{{ route('adminResource.store') }}"
                            enctype="multipart/form-data">
                            <div class="border-radius-xl bg-white">
                                <h5 class="font-weight-bolder mb-0">{{ $page_title }} </h5>
                                <div class=" ">
                                    <div class="row mt-3">
                                        <div class="col-12 col-sm-6 ">
                                            <div class="input-group input-group-dynamic">
                                                <label class="form-label ">File Name </label>
                                                <input name="file_name" class="form-control" type="text" />
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                            <div class="input-group input-group-dynamic">
                                                <label class="form-label ">File Details </label>
                                                <input name="file_details" class="form-control" type="text" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-12  ">
                                            <label class="form-label mt-4">Upload Files</label><br>
                                            <input id="demo2" class="demo1 " type="file" placeholder="Select  Files"
                                                name="resource" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-5 border-radius-xl bg-white ">
                                <div class="  mt-3">
                                    <div class="button-row d-flex mt-4"><button
                                            class="ms-auto mb-0 px-6 btn bg-gradient-dark " type="submit"
                                            title="submit">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-header pb-0">
                        <div class="d-lg-flex">
                            <div>
                                <h5 class="mb-0">View Resources</h5>

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
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
    <script src="{{ asset('js/plugins/file-upload.js') }}"></script>
    <script src="{{ asset('js/plugins/choices.min.js') }}"></script>
    <script>
        if (document.getElementById('choices-class')) {
            var element = document.getElementById('choices-class');
            const example = new Choices(element, {
                searchEnabled: false,
                shouldSort: false,
            });
        };
        if (document.getElementById('choices-level')) {
            var element = document.getElementById('choices-level');
            const example = new Choices(element, {
                searchEnabled: false,
                shouldSort: false,
            });
        };
        if (document.getElementById('choices-product')) {
            var element = document.getElementById('choices-product');
            const example = new Choices(element, {
                searchEnabled: false,
                shouldSort: false,
            });
        };
    </script>
@endsection
