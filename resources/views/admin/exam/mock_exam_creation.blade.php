@extends('common.layout')
@section('page_content_body')
    <div class="container-fluid py-1 mb-6">
        <div class="row">
            <div class="col-md-12">
                <div class="card  ">
                    <div class="card-body  ">
                        <form id="mockExamForm" data-route="{{route('mockExam.store')}}">
                            <div class="border-radius-xl bg-white">
                                <h5 class="font-weight-bolder mb-0">{{$page_title}}</h5>
                                <p class="mb-0 text-sm"> informations</p>
                                <div class=" ">
                                    <div class="row mt-3">
                                        <div class="col-12 col-md-4">
                                            <div class="mt-1 input-group input-group-dynamic">
                                                <label class="form-label text-primary "
                                                    style="top: -.8rem; font-size: .7rem;">Product</label>
                                                <select class="form-control " name="exam_product_id" id="exam_product_id">
                                                    <option value="" selected disabled>Select Product</option>
                                                    @foreach ($products as $row)
                                                        <option value="{{ $row->product_id }}">{{ $row->product_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4 mt-3 mt-md-0">
                                            <div class="mt-1 input-group input-group-dynamic">
                                                <label class="form-label text-primary "
                                                    style="top: -.8rem; font-size: .7rem;">Level</label>
                                                <select class="form-control " name="exam_level_id" id="exam_level_id">
                                                    <option value="" selected disabled>Select Level</option>
                                                </select>   
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4 mt-3 mt-md-0">
                                            <div class="mt-1 input-group input-group-dynamic">
                                                <label class="form-label text-primary "
                                                    style="top: -.8rem; font-size: .7rem;">Class</label>
                                                <select class="form-control " name="exam_class_id" id="exam_class_id">
                                                    <option value="" selected disabled>Select Class</option>
                                                    @foreach ($classes as $row)
                                                    <option value="{{ $row->class_id }}">{{ $row->class }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-12 col-md-4">
                                            <div class="mt-1 input-group input-group-dynamic">
                                                <label class="form-label text-primary "
                                                    style="top: -.8rem; font-size: .7rem;">Year</label>
                                                <select class="form-control " name="exam_year_id" id="exam_year_id">
                                                    <option value="" selected disabled>Select Year</option>
                                                    @foreach ($year as $row)
                                                    <option value="{{ $row->year_id }}">{{ $row->year }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4 mt-3 mt-md-0">
                                            <div class="input-group input-group-dynamic ">
                                                <label for=" " class="form-label">Mock Test Exam Name</label>
                                                <input class="  form-control" type="text" id="" name="mock_exam_name" />
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4 mt-3 mt-md-0">
                                            <div class="input-group input-group-dynamic ">
                                                <label for=" " class="form-label">Google Form Link</label>
                                                <input class="  form-control" type="link" id="" name="mock_exam_google_link" />
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4 mt-3 mt-md-0">
                                            <div class="input-group input-group-dynamic ">
                                                <label class="form-label bg-white pe-7" style="z-index: 1;">Start
                                                    Date&Time</label>
                                                <input class=" form-control" name="mock_exam_start_date_time" type="datetime-local" />
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4 mt-3 mt-md-0">
                                            <div class="input-group input-group-dynamic ">
                                                <label class="form-label bg-white pe-7" style="z-index: 1;">End
                                                    Date&Time</label>
                                                <input class=" form-control" name="mock_exam_end_date_time" type="datetime-local" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-5">
                                <h5 class="font-weight-bolder mb-0">Exam Status</h5>
                                <div class="col-12 col-sm-6 mt-3">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" name="status" type="checkbox" id="active-inactive" checked="">
                                        <label class="form-check-label" for="active-inactive">Active Or Inactive</label>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-2 border-radius-xl bg-white ">
                                <div class="  mt-3">
                                    <div class="button-row d-flex mt-4">
                                        <a href="mock_exam_list" class="ms-auto mb-0"><button
                                                class=" px-6 btn bg-gradient-dark " type="submit"
                                                title="submit">Submit</button></a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
    <script src="{{ asset('js/plugins/choices.min.js') }}"></script>
    <script src="{{ asset('js/plugins/file-upload.js') }}"></script>
    <script>
                    var mockExam_list_url = "{{ route('mockExam.list') }}";
                    var fetchLevelUrl = "{{ route('mockExam.fetch_level') }}";

        if (document.getElementById('exam_class_id')) {
            var element = document.getElementById('exam_class_id');
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
        if (document.getElementById('exam_year_id')) {
            var element = document.getElementById('exam_year_id');
            const example = new Choices(element, {
                searchEnabled: false,
                shouldSort: false,
            });
        };
        if (document.getElementById('exam_product_id')) {
            var element = document.getElementById('exam_product_id');
            const example = new Choices(element, {
                searchEnabled: false,
                shouldSort: false,
            });
        };
    </script>
@endsection
