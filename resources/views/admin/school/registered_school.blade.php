@extends('common.layout')
@section('page_content_body')
 
    <div class="container-fluid py-1 mb-6">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header pb-0">
                        <div class="d-lg-flex">
                            <div>
                                <h5 class="mb-0">Registered Schools </h5>
                            </div>

                            <div class="ms-auto my-auto mt-lg-0 mt-4">
                                <div class="ms-auto my-auto">

                                    <a href="{{route('school.index')}}" class="btn bg-gradient-primary btn-sm mb-0">+ Add</a>

                                    <button class="btn btn-outline-primary btn-sm export mb-0 mt-sm-0 mt-1" data-type="csv"
                                        type="button" name="button">Download</button>
                                </div>
                            </div>
                        </div>
                        <form action="">
                            <div class="d-lg-flex mt-4">
                                <div class=" my-auto mt-lg-0 mt-4 col-12 col-md-6 col-lg-3">
                                    <select class="form-control " name=" " id="choices-country">
                                        <option value="" selected>Country</option>
                                        <option value="12345678900">12345678900</option>
                                        <option value="2">2</option>
                                    </select>
                                </div>
                                <div class="ms-lg-3 my-auto mt-lg-0 mt-4 col-12 col-md-6 col-lg-3">
                                    <select class="form-control " name=" " id="choices-state">
                                        <option value="" selected> State</option>
                                        <option value="12345678900">12345678900</option>
                                        <option value="2">2</option>
                                    </select>
                                </div>
                                <div class="ms-lg-3 my-auto mt-lg-0 mt-4 col-12 col-md-6 col-lg-3">
                                    <select class="form-control " name=" " id="choices-city">
                                        <option value="" selected> city</option>
                                        <option value="12345678900">12345678900</option>
                                        <option value="2">2</option>
                                    </select>
                                </div>
                            </div>
                            <div class="d-lg-flex mt-4">
                                <div class=" my-auto mt-lg-0 mt-4 col-12 col-md-6 col-lg-3">
                                    <select class="form-control " name=" " id="choices-coodinator">
                                        <option value="" selected> Coordinator</option>
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
                        <div class="table-responsive ">
                            <table class="table table-flush table-bordered rounded-3" id=" -list">
                                <thead class="thead-drak">
                                    <tr>
                                        <th class="  text-uppercase text-dark text-sm font-weight-bolder ">sl/no</th>
                                        <th class="  text-uppercase text-dark text-sm font-weight-bolder ">School </th>
                                        <th class="  text-uppercase text-dark text-sm font-weight-bolder "> coordinater
                                        </th>
                                        <th class="  text-uppercase text-dark text-sm font-weight-bolder ">city</th>
                                        <th class="  text-uppercase text-dark text-sm font-weight-bolder ">state</th>
                                        <th class="  text-uppercase text-dark text-sm font-weight-bolder text-center">
                                            document</th>
                                        <th class="  text-uppercase text-dark text-sm font-weight-bolder text-center">
                                            Approval status</th>
                                        <th class="  text-uppercase text-dark text-sm font-weight-bolder text-center">
                                            Action</th>

                                    </tr>
                                </thead>
                                <tbody id="table_div">
                                    @foreach ($all_schools as $row)
                                        <tr>
                                            <td class="align-middle text-center  ">
                                                <p class="text-xs font-weight-bold mb-0">{{$loop->iteration}}</p>
                                            </td>
                                            <td class="align-middle text-center  ">
                                                <p class="text-sm font-weight-bold mb-0 text-md">{{ $row->school_name }}</p>
                                            </td>
                                            <td class="align-middle text-center  ">
                                                <p class="text-sm font-weight-bold mb-0">{{ $row->coordinator_name }}</p>
                                            </td>
                                            <td class="align-middle text-center  ">
                                                <p class="text-sm font-weight-bold mb-0">{{ $row->city }}</p>
                                            </td>
                                            <td class="align-middle text-center  ">
                                                <p class="text-sm font-weight-bold mb-0">{{ $row->state }}</p>
                                            </td>
                                            <td class="download-cell align-middle text-center" data-file="{{ $row->school_file }}">
                                                @if ($row->school_file)
                                                    <a class="btn btn-primary btn-sm text-xs mb-0"
                                                        href="{{ asset($row->school_file) }}" download>Download</a>
                                                @else
                                                    <p class="mb-0">No file available</p>
                                                @endif
                                            </td>

                                            <td class="align-middle text-center text-sm">
                                                @if ($row->status == 2)
                                                    <span class="badge badge-sm badge-warning">Processing</span>
                                                @elseif ($row->status == 1)
                                                    <span class="badge badge-sm badge-success"> Approved</span>
                                                @else    
                                                <span class="badge badge-sm badge-danger"> Disapproved</span>
                                                @endif
                                            </td>
                                            <td class="text-sm align-middle text-center">
                                                <a href="school_registion" class="" data-bs-toggle="tooltip"
                                                    data-bs-original-title="Edit School">
                                                    <i
                                                        class="material-icons text-success position-relative text-lg mb-0">drive_file_rename_outline</i>
                                                </a>
                                                @if ($row->status != 1)
                                                <a href="#" value="{{ $row->school_registration_id }}"
                                                    id="adminApproveSchool" class="btn btn-sm btn-light py-1 mx-2 mb-0"
                                                    data-bs-toggle="tooltip"
                                                    data-bs-original-title=" Approve">
                                                    <i
                                                        class="material-icons text-success position-relative text-lg">done</i>
                                                </a>
                                                <a href="#" value="{{ $row->school_registration_id }}"                                                   
                                                    id="adminDisapproveSchool" data-disapprove="disapprove" class="btn btn-sm btn-light py-1 mx-2 mb-0"
                                                    data-bs-toggle="tooltip" data-bs-original-title="Disapprove ">
                                                    <i
                                                        class="material-icons text-warning position-relative text-lg">close</i>
                                                </a>
                                            @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr></tr>
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


    <script>
            var adminSchoolApprovelUrl = "{{ route('school.adminApproveOrDisapproveSchool') }}";

        if (document.getElementById('school-list')) {
            const dataTableSearch = new simpleDatatables.DataTable("#school-list", {
                searchable: true,
                fixedHeight: false,
                perPage: 7
            });

            document.querySelectorAll(".export").forEach(function(el) {
                el.addEventListener("click", function(e) {
                    var type = el.dataset.type;

                    var data = {
                        type: type,
                        filename: "school list " + type,
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
        if (document.getElementById('choices-coodinator')) {
            var element = document.getElementById('choices-coodinator');
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
    </script>
@endsection
