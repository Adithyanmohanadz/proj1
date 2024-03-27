@extends('coordinator.common.coordinator_layout')
@section('page_content_body')
    <div class="container-fluid py-1 mb-6">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header pb-0">
                        <div class="d-lg-flex">
                            <div>
                                <h5 class="mb-0">{{ $page_title }} </h5>

                            </div>
                            <div class="ms-auto my-auto mt-lg-0 mt-4">
                                <div class="ms-auto my-auto">

                                    <button type="button" class="btn btn-outline-primary btn-sm ms-auto mb-0"
                                        data-bs-toggle="modal" data-bs-target="#import"> Upload </button>

                                    <!-- modal -->
                                    <div class="modal fade" id="import" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog mt-lg-10">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="ModalLabel">Import CSV</h5>
                                                    <i class="material-icons ms-3">file_upload</i>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>You can browse your computer for a file.</p>
                                                    <div class="input-group input-group-outline mb-3">
                                                        <input type="file" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn bg-gradient-secondary btn-sm"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="button"
                                                        class="btn bg-gradient-primary btn-sm">Upload</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- modal -->

                                    <button class="btn btn-outline-primary btn-sm export mb-0 mt-sm-0 mt-1" data-type="csv"
                                        type="button" name="button">Download</button>
                                </div>
                            </div>
                        </div>
                        <form action="">
                            <div class="d-lg-flex mt-4">
                                <div class="  my-auto mt-lg-0 mt-4 col-12 col-md-6 col-lg-3">
                                    <select class="form-control " name=" " id="choices-product">
                                        <option value="" selected>Product</option>
                                        <option value="12345678900">12345678900</option>
                                        <option value="2">2</option>
                                    </select>
                                </div>
                                <div class="ms-lg-3 my-auto mt-lg-0 mt-4 col-12 col-md-6 col-lg-3">
                                    <select class="form-control " name=" " id="choices-level">
                                        <option value="" selected>Level</option>
                                        <option value="12345678900">12345678900</option>
                                        <option value="2">2</option>
                                    </select>
                                </div>
                                <div class="ms-lg-3 my-auto mt-lg-0 mt-4 col-12 col-md-6 col-lg-3">
                                    <select class="form-control " name=" " id="choices-class">
                                        <option value="" selected>Class</option>
                                        <option value="12345678900">12345678900</option>
                                        <option value="2">2</option>
                                    </select>
                                </div>
                            </div>
                            <div class="d-lg-flex mt-4">
                                <div class="  my-auto mt-lg-0 mt-4 col-12 col-md-6 col-lg-3">
                                    <select class="form-control " name=" " id="choices-mock-final">
                                        <option value="" selected>Mock/Final</option>
                                        <option value="12345678900">12345678900</option>
                                        <option value="2">2</option>
                                    </select>
                                </div>
                                <div class=" ms-lg-3 my-auto mt-lg-0 mt-4 col-12 col-md-6 col-lg-3">
                                    <select class="form-control " name=" " id="choices-examname">
                                        <option value="" selected>Exam Name</option>
                                        <option value="12345678900">12345678900</option>
                                        <option value="2">2</option>
                                    </select>
                                </div>
                                <div class=" ms-lg-3 my-auto mt-lg-0 mt-4 col-12 col-md-6 col-lg-3">
                                    <select class="form-control " name=" " id="choices-batch">
                                        <option value="" selected>Year</option>
                                        <option value="12345678900">12345678900</option>
                                        <option value="2">2</option>
                                    </select>
                                </div>
                            </div>
                            <div class="d-lg-flex mt-4">

                                <div class=" my-auto mt-lg-0 mt-4 col-12 col-md-6 col-lg-3">
                                    <select class="form-control " name=" " id="choices-school">
                                        <option value="" selected>School</option>
                                        <option value="12345678900">12345678900</option>
                                        <option value="2">2</option>
                                    </select>
                                </div>
                            </div>
                            <div class="button-row d-flex mt-4">
                                <a href=" " class="ms-auto mb-0"><button class=" px-6 btn bg-gradient-dark "
                                        type="button" title="submit">Submit for Filter</button></a>
                            </div>
                        </form>
                    </div>
                    <div class="card-body px-0 pb-0">
                        <div class="table-responsive">
                            <table class="table table-flush" id="result-list">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="  text-uppercase text-secondary  ">sl/no</th>
                                        <th class="  text-uppercase text-secondary  "> School name </th>
                                        <th class="  text-uppercase text-secondary  "> student name </th>
                                        <th class="  text-uppercase text-secondary  "> product </th>
                                        <th class="  text-uppercase text-secondary  "> level </th>
                                        <th class="  text-uppercase text-secondary  "> class </th>
                                        <th class="  text-uppercase text-secondary  "> Year </th>
                                        <th class="  text-uppercase text-secondary  "> Exam name </th>
                                        <th class="  text-uppercase text-secondary  "> mock/final</th>
                                        <th class="  text-uppercase text-secondary  "> Exam date</th>
                                        <th class="  text-uppercase text-secondary  "> Exam score</th>
                                        <th class="text-center  text-uppercase text-secondary  "> Pass/fail</th>
                                        <th class="text-center  text-uppercase text-secondary text-xs font-weight-bolder ">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($students as $rows)
                                        <tr>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $loop->iteration }}</p>
                                            </td>
                                            <td>
                                                <h6 class="mb-0 text-md">{{ $rows->school_name }}</h6>
                                            </td>
                                            <td>
                                                <h6 class="mb-0 text-md">{{ $rows->student_name }}</h6>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">{{ $rows->product_name }}</p>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">{{ $rows->level }}</p>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">{{ $rows->class }}</p>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">Year</p>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">{{ $rows->exam_name }}</p>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">{{ $rows->type_of_exam }}</p>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">{{ $rows->exam_date }} </p>
                                            </td>
                                            <td class="align-middle  ">
                                                <div class="input-group input-group-outline ">
                                                    <input class=" form-control" name="score" type="number" placeholder="score" />
                                                </div>
                                            </td>
                                            {{-- <td class="resulttd align-middle text-center text-sm">
                                                <span class="badge badge-sm badge-success  ">Pass</span>
                                            </td> --}}
                                            <td id="resulttd_{{ $loop->iteration }}" class="resulttd align-middle text-center text-sm">
                                                <span class="badge badge-sm badge-secondary">pending</span>
                                            </td>
                                            
                                            
                                            <td class="text-sm text-center">
                                                <form action="">
                                                    <input type="hidden" name="student_id" value="{{ $rows->student_id }}">
                                                    <input type="hidden" name="school_id" value="{{ $rows->school_id }}">
                                                    <input type="hidden" name="product_id" value="{{ $rows->product_id }}">
                                                    <input type="hidden" name="material_category_id" value="{{ $rows->material_category_id }}">
                                                    <input type="hidden" name="class_id" value="{{ $rows->class_id }}">
                                                    <input type="hidden" name="year_id" value="{{ $rows->year_id }}">
                                                    <input type="hidden" name="exam_id" value="{{ $rows->exam_id }}">
                                                    <input type="hidden" name="type_of_exam" value="{{ $rows->type_of_exam }}">
                                                    <div class="button-container">
                                                        <button class="ms-3 btn btn-sm bg-gradient-light resultStatus" value="1" data-bs-toggle="tooltip" data-bs-original-title="Pass">
                                                            <i class="material-icons text-info position-relative text-lg">done</i>
                                                        </button>
                                                        <button class="ms-3 btn btn-sm bg-gradient-light resultStatus" value="0" data-bs-toggle="tooltip" data-bs-original-title="Fail">
                                                            <i class="material-icons text-danger position-relative text-lg">close</i>
                                                        </button>
                                                        <button class="ms-3 btn btn-sm bg-gradient-light resultStatus" value="2" data-bs-toggle="tooltip" data-bs-original-title="Absent ">
                                                            <i class="material-icons text-dark position-relative text-lg">person_remove</i>
                                                        </button>
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/plugins/datatables.js') }}"></script>
    <script src="{{ asset('js/plugins/choices.min.js') }}"></script>
    <script src="{{ asset('js/plugins/flatpickr.min.js') }}"></script>


    <script>
        var path = "{{ route('result-updation.store') }}";
        if (document.getElementById('result-list')) {
            const dataTableSearch = new simpleDatatables.DataTable("#result-list", {
                searchable: true,
                fixedHeight: false,
                perPage: 7
            });

            document.querySelectorAll(".export").forEach(function(el) {
                el.addEventListener("click", function(e) {
                    var type = el.dataset.type;

                    var data = {
                        type: type,
                        filename: "Result" + type,
                    };

                    if (type === "csv") {
                        // data.columnDelimiter = "|";
                    }

                    dataTableSearch.export(data);
                });
            });
        };
    </script>

    <script>
        if (document.getElementById('choices-mock-final')) {
            var element = document.getElementById('choices-mock-final');
            const example = new Choices(element, {
                searchEnabled: true,
                shouldSort: false,
            });
        };
        if (document.getElementById('choices-batch')) {
            var element = document.getElementById('choices-batch');
            const example = new Choices(element, {
                searchEnabled: true,
                shouldSort: false,
            });
        };
        if (document.getElementById('choices-school')) {
            var element = document.getElementById('choices-school');
            const example = new Choices(element, {
                searchEnabled: true,
                shouldSort: false,
            });
        };
        if (document.getElementById('choices-product')) {
            var element = document.getElementById('choices-product');
            const example = new Choices(element, {
                searchEnabled: true,
                shouldSort: false,
            });
        };
        if (document.getElementById('choices-level')) {
            var element = document.getElementById('choices-level');
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
        if (document.getElementById('choices-examname')) {
            var element = document.getElementById('choices-examname');
            const example = new Choices(element, {
                searchEnabled: true,
                shouldSort: false,
            });
        };
    </script>
@endsection
