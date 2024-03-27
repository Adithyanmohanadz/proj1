@extends('common.layout')
@section('page_content_body')
<div class="container-fluid py-1 mb-6">
    <div class="row">
        <div class="col-12">
            <div class="row  ">
                <div class="col-12 col-lg-11 m-auto ">
                    <div class="card">
                        <div class="card-body">
                            <form id="notificationCreateForm" enctype="multipart/form-data" data-route="{{route('notification.store')}}">
                                <div class="border-radius-xl bg-white">
                                    <h5 class="font-weight-bolder mb-0">{{$page_title}} </h5>
                                    <div class=" ">
                                        <div class="row mt-3">
                                            <div class="col-12 col-sm-6">
                                                <div class="mt-1 input-group input-group-dynamic">
                                                    <label class="form-label text-primary " style="top: -.8rem; font-size: .7rem;">Product</label>
                                                    <select class="form-control "  name="not_product_id" id="not_product_id">
                                                        <option value="" selected disabled>Select Product</option>
                                                        @foreach ($products as $product_name => $product_id)
                                                        <option value="{{$product_id}}">{{$product_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                                <div class="mt-1 input-group input-group-dynamic">
                                                    <label class="form-label text-primary " style="top: -.8rem; font-size: .7rem;">Level</label>
                                                    <select class="form-control " name="not_material_category_id" id="not_material_category_id">
                                                        <option value="" selected disabled>Select Level</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-12 col-sm-6 ">
                                                <div class="mt-1 input-group input-group-dynamic">
                                                    <label class="form-label text-primary " style="top: -.8rem; font-size: .7rem;">Class</label>
                                                    <select class="form-control " name="not_class_id" id="not_class_id">
                                                        <option value="" selected disabled>Select Class</option>
                                                        @foreach ($classes as $class => $class_id)
                                                        <option value="{{$class_id}}">{{$class}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                                <div class="input-group input-group-dynamic">
                                                    <label class="form-label ">Enter Title </label>
                                                    <input class="form-control" name="title" type="text" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <h6 class="font-weight-bolder mb-3">Select For</h6>
                                            <div class="col-12 ">
                                                <div class="form-check">
                                                    <input class="form-check-input" name="all" type="checkbox" value="all" id="all">
                                                    <label class="custom-control-label" for="all">All</label>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 col-md-3 mt-3 mt-sm-0">
                                                <div class="form-check">
                                                    <input class="form-check-input" name="coordinator" type="checkbox" value="coordinator" id="co">
                                                    <label class="custom-control-label" for="1">Coordinator</label>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 col-md-3 mt-3 mt-sm-0">
                                                <div class="form-check">
                                                    <input class="form-check-input" name="school" type="checkbox" value="school" id="sc">
                                                    <label class="custom-control-label" for="2">School</label>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 col-md-3 mt-3 mt-sm-0">
                                                <div class="form-check">
                                                    <input class="form-check-input" name="student" type="checkbox" value="student" id="st">
                                                    <label class="custom-control-label" for="3">Student</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-12  ">
                                                <label class="form-label mt-4">Upload Files</label><br>
                                                <input id="demo2" class="demo1 " type="file" multiple placeholder="Select  Files" name="notification_file" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-5 border-radius-xl bg-white ">
                                    <div class="  mt-3">
                                        <div class="button-row d-flex mt-4">
                                           <button class="ms-auto mb-0 px-6 btn bg-gradient-dark " type="submit" title="submit">Submit</button>
                                        </div>
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
<script src="{{ asset('js/plugins/choices.min.js')}}"></script>
<script src="{{ asset('js/plugins/file-upload.js')}}"></script>

<script>
    var levelUrl   = "{{ route('notification.fetch_level') }}";
    var allNotificationUrl   = "{{ route('notification.allNotification') }}";
    if (document.getElementById('not_class_id')) {
        var element = document.getElementById('not_class_id');
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
    if (document.getElementById('not_product_id')) {
        var element = document.getElementById('not_product_id');
        const example = new Choices(element, {
            searchEnabled: false,
            shouldSort: false,
        });
    };
</script>
@endsection    
