@extends('common.layout')
@section('page_content_body')
<div class="container-fluid py-1 mb-6">
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-header pb-0">
                    <div class="d-lg-flex">
                        <div>
                            <h5 class="mb-0">Student </h5>

                        </div>

                        <div class="ms-auto my-auto mt-lg-0 mt-4">
                            <div class="ms-auto my-auto">

                                <a href="{{route('student.index')}}" class="btn bg-gradient-primary btn-sm mb-0">+ Add</a>

                                <button class="btn btn-outline-primary btn-sm export mb-0 mt-sm-0 mt-1" data-type="csv" type="button" name="button">Download</button>
                            </div>
                        </div>
                    </div>
                    <form action="">
                        <div class="d-lg-flex mt-4">
                            <div class=" my-auto mt-lg-0 mt-4 col-12 col-md-6 col-lg-3">
                                <div class="input-group input-group-dynamic">
                                    <label class="form-label text-primary " style="top: -.8rem; font-size: .7rem;">Product</label>
                                    <select class="form-control " name=" " id="choices-product">
                                        <option value="" selected>Select Product</option>
                                        <option value="12345678900">12345678900</option>
                                        <option value="2">2</option>
                                    </select>
                                </div>
                            </div>
                            <div class="ms-lg-3  my-auto mt-lg-0 mt-4 col-12 col-md-6 col-lg-3">
                                <div class="input-group input-group-dynamic">
                                    <label class="form-label text-primary " style="top: -.8rem; font-size: .7rem;">Level</label>
                                    <select class="form-control " name=" " id="choices-level">
                                        <option value="" selected>Select Level</option>
                                        <option value="12345678900">12345678900</option>
                                        <option value="2">2</option>
                                    </select>
                                </div>
                            </div>
                            <div class="ms-lg-3 my-auto mt-lg-0 mt-4 col-12 col-md-6 col-lg-3">
                                <div class="input-group input-group-dynamic">
                                    <label class="form-label text-primary " style="top: -.8rem; font-size: .7rem;">Class</label>
                                    <select class="form-control " name=" " id="choices-class">
                                        <option value="" selected>Select Class</option>
                                        <option value="12345678900">12345678900</option>
                                        <option value="2">2</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="d-lg-flex mt-4">
                            <div class=" my-auto mt-lg-0 mt-4 col-12 col-md-6 col-lg-3">
                                <div class="input-group input-group-dynamic">
                                    <label class="form-label text-primary " style="top: -.8rem; font-size: .7rem;">Country</label>
                                    <select class="form-control " name=" " id="choices-country">
                                        <option value="" selected>Select Country</option>
                                        <option value="12345678900">12345678900</option>
                                        <option value="2">2</option>
                                    </select>
                                </div>
                            </div>
                            <div class="ms-lg-3 my-auto mt-lg-0 mt-4 col-12 col-md-6 col-lg-3">
                                <div class="input-group input-group-dynamic">
                                    <label class="form-label text-primary " style="top: -.8rem; font-size: .7rem;">State</label>
                                    <select class="form-control " name=" " id="choices-state">
                                        <option value="" selected>Select State</option>
                                        <option value="12345678900">12345678900</option>
                                        <option value="2">2</option>
                                    </select>
                                </div>
                            </div>
                            <div class=" ms-lg-3 my-auto mt-lg-0 mt-4 col-12 col-md-6 col-lg-3">
                                <div class="input-group input-group-dynamic">
                                    <label class="form-label text-primary " style="top: -.8rem; font-size: .7rem;">City</label>
                                    <select class="form-control " name=" " id="choices-city">
                                        <option value="" selected>Select City</option>
                                        <option value="12345678900">12345678900</option>
                                        <option value="2">2</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="d-lg-flex mt-4">
                            <div class=" my-auto mt-lg-0 mt-4 col-12 col-md-6 col-lg-3">
                                <div class="input-group input-group-dynamic">
                                    <label class="form-label text-primary " style="top: -.8rem; font-size: .7rem;">Coordinator</label>
                                    <select class="form-control " name=" " id="choices-coordinator">
                                        <option value="" selected>Select Coordinator</option>
                                        <option value="12345678900">12345678900</option>
                                        <option value="2">2</option>
                                    </select>
                                </div>
                            </div>
                            <div class="ms-lg-3 my-auto mt-lg-0 mt-4 col-12 col-md-6 col-lg-3">
                                <div class="input-group input-group-dynamic">
                                    <label class="form-label text-primary " style="top: -.8rem; font-size: .7rem;">School</label>
                                    <select class="form-control " name=" " id="choices-school">
                                        <option value="" selected>Select School</option>
                                        <option value="12345678900">12345678900</option>
                                        <option value="2">2</option>
                                    </select>
                                </div>
                            </div>

                            <div class="ms-lg-3 my-auto mt-lg-0 mt-4 col-12 col-md-6 col-lg-3">
                                <div class="input-group input-group-dynamic">
                                    <label class="form-label text-primary " style="top: -.8rem; font-size: .7rem;">Payment Methods</label>
                                    <select class="form-control " name=" " id="choices-payment_method">
                                        <option value="" selected>Select Payment Methods</option>
                                        <option value="12345678900">12345678900</option>
                                        <option value="2">2</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="button-row d-flex mt-4">
                            <a href=" " class="ms-auto mb-0"><button class=" px-6 btn bg-gradient-dark " type="button" title="submit">Submit for Filter</button></a>
                        </div>
                    </form>
                </div>

                <div class="card-body px-0 pb-0">
                    <div class="table-responsive">
                        <table class="table table-flush" id="student-list">
                            <thead class="thead-light">
                                <tr>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">sl/no</th>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">STUDENT name</th>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">email</th>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">mobile number</th>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">SCHOOL name</th>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">Coordinator name</th>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">product</th>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">LEVEL</th>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">class</th>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">city</th>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">state</th>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">payment Method</th>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">pass/fail</th>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder text-center">Status</th>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allStudents as $row)
                                    
                                <tr>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{$loop->iteration}}</p>
                                    </td>
                                    <td>
                                        <h6 class="mb-0 text-md">{{$row->student_name}} </h6>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{$row->email}} </p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{$row->mobile}} </p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{$row->school_name}} </p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">Coordinator</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{$row->product_name}}  </p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{$row->level}} </p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{$row->class}} </p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">city</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">state</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">online/offline</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">pass/fail</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="badge badge-sm badge-danger">inactive</span>
                                    </td>
                                    <td class="text-sm">
                                        <a href="student_creation" class="ms-3" data-bs-toggle="tooltip" data-bs-original-title="Edit Student">
                                            <i class="material-icons text-success position-relative text-lg">drive_file_rename_outline</i>
                                        </a>
                                        <a href=" " class="ms-3" data-bs-toggle="tooltip" data-bs-original-title="Activate Student">
                                            <i class="material-icons text-info position-relative text-lg">power_settings_new</i>
                                        </a>
                                        <a href="javascript:;" class="ms-3" data-bs-toggle="tooltip" data-bs-original-title="Deactivate Student">
                                            <i class="material-icons text-danger position-relative text-lg">delete</i>
                                        </a>
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
<script src="{{ asset('js/plugins/datatables.js')}}"></script>
<script src="{{ asset('js/plugins/choices.min.js')}}"></script>

<script>
    if (document.getElementById('student-list')) {
        const dataTableSearch = new simpleDatatables.DataTable("#student-list", {
            searchable: true,
            fixedHeight: false,
            perPage: 7
        });

        document.querySelectorAll(".export").forEach(function(el) {
            el.addEventListener("click", function(e) {
                var type = el.dataset.type;

                var data = {
                    type: type,
                    filename: "student list " + type,
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
    if (document.getElementById('choices-school')) {
        var element = document.getElementById('choices-school');
        const example = new Choices(element, {
            searchEnabled: true,
            shouldSort: false,
        });
    };
    if (document.getElementById('choices-coordinator')) {
        var element = document.getElementById('choices-coordinator');
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
    if (document.getElementById('choices-city')) {
        var element = document.getElementById('choices-city');
        const example = new Choices(element, {
            searchEnabled: true,
            shouldSort: false,
        });
    };
    if (document.getElementById('choices-state')) {
        var element = document.getElementById('choices-state');
        const example = new Choices(element, {
            searchEnabled: true,
            shouldSort: false,
        });
    };
    if (document.getElementById('choices-country')) {
        var element = document.getElementById('choices-country');
        const example = new Choices(element, {
            searchEnabled: true,
            shouldSort: false,
        });
    };
    if (document.getElementById('choices-payment_method')) {
        var element = document.getElementById('choices-payment_method');
        const example = new Choices(element, {
            searchEnabled: true,
            shouldSort: false,
        });
    };
</script>
@endsection
