@extends('common.layout')
@section('page_content_body')
<div class="container-fluid py-1 mb-6">
    <div class="row">
        <div class="col-12">
            <div class="row ">
                <div class="col-12 col-lg-11 m-auto ">
                    <div class="card">
                        <div class="card-body">
                            <form id="student_form" data-route="{{route('student.store')}}" >
                                <div class="  border-radius-xl bg-white ">
                                    <h5 class="font-weight-bolder mb-3">{{ $page_title }}</h5>
                                    <div class="button-row d-flex mt-n5">
                                        <button type="button" class="btn btn-outline-primary btn-sm ms-auto mb-0" data-bs-toggle="modal" data-bs-target="#import">
                                            Upload
                                        </button>

                                    </div>
                                    <div class="mt-2">
                                        <div class="row mt-3">
                                            <div class="col-12  ">
                                                <div class="input-group input-group-dynamic">
                                                    <label class="form-label text-primary " style="top: -.8rem; font-size: .7rem;">School</label>
                                                    <select class="form-control " name="school_id" id="choices-school">
                                                        <option value="" selected disabled>Select School</option>
                                                        @foreach ($schools as $row )
                                                          <option value="{{$row->school_id}}">{{$row->school_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-12 col-sm-6">
                                                <div class="input-group input-group-dynamic">
                                                    <label class="form-label text-primary " style="top: -.8rem; font-size: .7rem;">Product</label>
                                                    <select class="form-control " name="product_id" id="choices-product">
                                                        <option value="" selected disabled>Select Product</option>
                                                        @foreach ($products as $row )
                                                          <option value="{{$row->product_id}}">{{$row->product_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                                <div class="input-group input-group-dynamic">
                                                    <label class="form-label text-primary " style="top: -.8rem; font-size: .7rem;">level</label>
                                                    <select name="material_category_id" class="form-control " disabled  id="material_category_id">
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-12 col-sm-6 ">
                                                <div class="input-group input-group-dynamic">
                                                    <label class="form-label text-primary " style="top: -.8rem; font-size: .7rem;">Class</label>
                                                    <select class="form-control " name="class_id" id="choices-class">
                                                        <option value="" selected>Select Class</option>
                                                        @foreach ($classes as $row )
                                                        <option value="{{$row->class_id}}">{{$row->class}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                                <div class="input-group input-group-dynamic">
                                                    <label class="form-label"> Name</label>
                                                    <input class="  form-control" name="student_name" type="text" />
                                                </div>

                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-12 col-sm-6">
                                                <div class="input-group input-group-dynamic">
                                                    <label class="form-label">Username </label>
                                                    <input class="  form-control" name="student_username" type="text" />
                                                </div>

                                            </div>
                                            <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                                <div class="input-group input-group-dynamic">
                                                    <label class="form-label">Mobile</label>
                                                    <input class="  form-control" name="mobile" type="tel" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-12 col-sm-6">
                                                <div class="input-group input-group-dynamic">
                                                    <label class="form-label">Email </label>
                                                    <input class="  form-control" name="email" type="email" />
                                                </div>

                                            </div>
                                            <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                                <div class="input-group input-group-dynamic">
                                                    <label class="form-label">Password</label>
                                                    <input class="  form-control" name="password" type="password" id="password" />
                                                    <i id="icon" class="far fa-eye pasw z-index-5"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-12 col-sm-6">
                                                <div class="input-group input-group-dynamic">
                                                    <label class="form-label">Conform Password</label>
                                                    <input class="  form-control" name="password_confirmation" type="password" id="c-password" />
                                                    <i id="c-icon" class="far fa-eye pasw z-index-5"></i>
                                                </div>
                                            </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="input-group input-group-dynamic">
                                                <label class="form-label text-primary " style="top: -.8rem; font-size: .7rem;">Batch</label>
                                                <select class="form-control " name="year_id" id="year_id">
                                                    <option value="" selected disabled>Select Year</option>
                                                    @foreach ($years as $year => $year_id )
                                                      <option value="{{$year_id}}">{{$year}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    </div>

                                    <div class="button-row d-flex mt-4">
                                       <button class="ms-auto mb-0 px-6 btn bg-gradient-dark " type="submit" title="submit">Submit</button>
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

<div class="modal fade" id="import" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog mt-lg-10">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Import CSV</h5>
                <i class="material-icons ms-3">file_upload</i>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>You can browse your computer for a file.</p>
                <div class="input-group input-group-outline mb-3">
                    <input type="file" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-gradient-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn bg-gradient-primary btn-sm">Upload</button>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/plugins/choices.min.js')}}"></script>

<script>
        var All_student_list_url = "{{ route('student.all_students') }}";
        var fetchLevelUrl = "{{ route('student.fetch_level')}}"

    if (document.getElementById('choices-product')) {
        var element = document.getElementById('choices-product');
        const example = new Choices(element, {
            searchEnabled: false,
            shouldSort: false,
        });
    };
    if (document.getElementById('choices-school')) {
        var element = document.getElementById('choices-school');
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
    if (document.getElementById('choices-class')) {
        var element = document.getElementById('choices-class');
        const example = new Choices(element, {
            searchEnabled: false,
            shouldSort: false,
        });
    };
</script>
@endsection
