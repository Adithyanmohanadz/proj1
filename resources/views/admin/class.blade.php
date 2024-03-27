@extends('common.layout')
@section('page_content_body')
    <div class="container-fluid py-1 mb-6">
        <div class="row">
            <div class="col-12 ">
                <div class="card">

                    <div class="card-header pb-0">
                        <div class="d-lg-flex">
                            <div>
                                <h5 class="mb-0">{{ $page_title }}</h5>
                            </div>

                            <div class="ms-auto my-auto mt-lg-0 mt-4">
                                <div class="ms-auto my-auto">
                                    <a href=" " class="btn bg-gradient-primary btn-sm mb-0" type="button"
                                        data-bs-toggle="modal" data-bs-target="#class_add_model">+&nbsp; Add </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-0">
                        <div class="table-responsive"  >
                            <table class="table table-flush table-bordered rounded-3" id="Le vel-list">
                                <thead class="thead-dark">
                                    <tr>
                                        <th class="  text-uppercase text-dark text-sm font-weight-bolder ">sl/no</th>
                                        <th class="  text-uppercase text-dark text-sm font-weight-bolder ">Class </th>
                                        <th class=" text-center text-uppercase text-dark text-sm font-weight-bolder ">
                                            status</th>
                                        <th class="  text-uppercase text-dark text-sm font-weight-bolder ">Action</th>

                                    </tr>
                                </thead>
                                <tbody id="table_div">
                                    @foreach ($classes as $row)
                                        <tr>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">{{ $loop->iteration }}</p>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">{{ $row->class }}</p>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                @if ($row->status == 1)
                                                    <span class="badge badge-sm badge-success">Active</span>
                                                @else
                                                    <span class="badge badge-sm badge-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td class="text-sm">
                                                <a href="#" id="edit_class" value="{{ $row->class_id }}" class="ms-3" data-bs-toggle="tooltip"
                                                    data-bs-original-title="Edit Class Name">
                                                    <i class="material-icons text-success position-relative text-lg"
                                                        type="button" >drive_file_rename_outline</i>
                                                </a>
                                                <a href="javascript:;" class="ms-3" data-bs-toggle="tooltip"
                                                    data-bs-original-title="Activate Class  ">
                                                    <i
                                                        class="material-icons text-info position-relative text-lg">power_settings_new</i>
                                                </a>
                                                <a href="javascript:;" class="ms-3" data-bs-toggle="tooltip"
                                                    data-bs-original-title="Deactive Class">
                                                    <i
                                                        class="material-icons text-danger position-relative text-lg">delete</i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr></tr>

                                </tbody>
                            </table>
                        </div>

                        <!-- Modal -->
                       
                        <!-- Modal -->

                        <!-- Modal -->
                        <div class="modal fade" id="class_add_model" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel2" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <form action="" id="class_form" data-route="{{ route('class.store') }}">
                                        @csrf
                                        <div class="modal-header">
                                            <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Add Class
                                            </h5>
                                            <button type="button" class="btn-close text-dark" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mt-4 input-group input-group-dynamic ">
                                                <label class="form-label">Class Name</label>
                                                <input class="form-control" name="class_name" type="text" />
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn bg-gradient-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn bg-gradient-primary">Add</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Modal -->

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/plugins/datatables.js') }}"></script>
    <script src="{{ asset('js/plugins/choices.min.js') }}"></script>


    <script>
        if (document.getElementById('Level-list')) {
            const dataTableSearch = new simpleDatatables.DataTable("#Level-list", {
                searchable: true,
                fixedHeight: false,
                perPage: 7
            });

            document.querySelectorAll(".export").forEach(function(el) {
                el.addEventListener("click", function(e) {
                    var type = el.dataset.type;

                    var data = {
                        type: type,
                        filename: "Level " + type,
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
        if (document.getElementById('choices-state')) {
            var element = document.getElementById('choices-state');
            const example = new Choices(element, {
                searchEnabled: true,
                shouldSort: false,
            });
        };
        if (document.getElementById('choices-state-2')) {
            var element = document.getElementById('choices-state-2');
            const example = new Choices(element, {
                searchEnabled: true,
                shouldSort: false,
            });
        };
    </script>
@endsection
@section('edit_model')
    @include('common.edit_model')
@endsection