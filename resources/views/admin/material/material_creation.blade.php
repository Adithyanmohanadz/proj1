@extends('common.layout')
@section('page_content_body')
    <div class="container-fluid py-1 mb-6">
        <div class="row">
            <div class="col-12">
                <div class="row ">
                    <div class="col-12 col-lg-12 m-auto ">
                        <div class="card">
                            <div class="card-body">
                                <form id="material_form" enctype="multipart/form-data"
                                    data-route="{{ route('material.store') }}">
                                    <div class="  border-radius-xl bg-white ">
                                        <h5 class="font-weight-bolder mb-2">Material Creation</h5>
                                        <div class=" ">
                                            <div class="row mt-3">
                                                <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                                    <div class="mt-1 input-group input-group-dynamic ">
                                                        <label class="form-label text-primary "
                                                            style="top: -.8rem; font-size: .7rem;">Product </label>
                                                        <select class="form-control " name="product_id" id="product_id">
                                                            <option value="" selected disabled>Select product</option>
                                                            @foreach ($products as $row)
                                                                <option value="{{ $row->product_id }}">
                                                                    {{ $row->product_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                                    <div class="mt-1 input-group input-group-dynamic ">
                                                        <label class="form-label text-primary "
                                                            style="top: -.8rem; font-size: .7rem;">Product Level</label>
                                                        <select class="form-control " name="category_level_id"
                                                            id="category_level_id">
                                                            <option value="" selected disabled>Select Level</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-12 col-sm-6">
                                                    <div class="mt-1 input-group input-group-dynamic ">
                                                        <label class="form-label text-primary "
                                                            style="top: -.8rem; font-size: .7rem;">Class</label>
                                                        <select class="form-control " name="class_id" id="choices-class">
                                                            <option value="" selected disabled>Select Class</option>
                                                            @foreach ($classes as $row)
                                                                <option value="{{ $row->class_id }}">{{ $row->class }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-3">

                                                <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                                    <div class="input-group input-group-dynamic">
                                                        <label class="form-label">Material Name</label>
                                                        <input class="  form-control" type="text" name="material_name" />
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6 ">
                                                    <div class="input-group input-group-dynamic">
                                                        <label class="form-label">Material Price</label>
                                                        <input class="  form-control" type="number"
                                                            name="material_price" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-3">

                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-12  ">
                                                    <label class="form-label mt-3">Upload RESOURCES Files</label><br>
                                                    <input id="demo2" class="demo1 " type="file" multiple
                                                        placeholder="Select RESOURCES Files" name="material_resource" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="button-row d-flex mt-4">
                                            <button class="ms-auto mb-0 px-6 btn bg-gradient-dark " type="submit"
                                                title="submit">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
    <script src="{{ asset('js/plugins/choices.min.js') }}"></script>
    <script src="{{ asset('js/plugins/file-upload.js') }}"></script>

    <script>
        var allMaterialList = "{{route('material.all_materials')}}"
        var fetchMaterialLevel = "{{route('material.fetch_level')}}"

        if (document.getElementById('choices-product')) {
            var element = document.getElementById('choices-product');
            const example = new Choices(element, {
                searchEnabled: true,
                shouldSort: false,
            });
        };
        if (document.getElementById('product_id')) {
            var element = document.getElementById('product_id');
            const example = new Choices(element, {
                searchEnabled: true,
                shouldSort: false,
            });
        };

        if (document.getElementById('choices-class')) {
            var element = document.getElementById('choices-class');
            const example = new Choices(element, {
                searchEnabled: true,
                shouldSort: false,
            });
        };
    </script>
@endsection
