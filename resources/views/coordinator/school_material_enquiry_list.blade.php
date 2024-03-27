@extends('coordinator.common.coordinator_layout')
@section('page_content_body')
    <div class="container-fluid py-1 mb-6">
        <div class="row">
            <div class="col-12 ">
                <div class="card">

                    <div class="card-header pb-0">
                        <div class="d-lg-flex">
                            <div>
                                <h5 id="ccccc" class="mb-0">{{ $page_title }} </h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-0">
                        <div class="table-responsive">
                            <table class="table table-flush" id="Level-list">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">sl/no</th>
                                        <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">School Name
                                        </th>
                                        <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">Class </th>
                                        <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">Product
                                        </th>
                                        <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">Level </th>
                                        <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">Material
                                        </th>
                                        <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">Enquiry Date
                                        </th>
                                        <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="table_div">
                                    @foreach ($allEnquires as $row)
                                        <tr>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">{{ $loop->iteration }}</p>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">{{ $row->school_name }}</p>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">{{ $row->class }}</p>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">{{ $row->product_name }}</p>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">{{ $row->level }}</p>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">{{ $row->material_name }}</p>
                                            </td>

                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">{{ $row->created_at }}</p>
                                            </td>

                                            <td class="text-sm">
                                                <a href="#" value="{{ $row->school_material_enquiry_id }}"
                                                    id="schoolMaterialAvailableStatus" class="ms-3 btn btn-sm btn-primary"
                                                    data-bs-toggle="tooltip" data-bs-original-title="">
                                                    Available
                                                </a>
                                                <a href="#" id="" value=""
                                                    class="ms-3 btn btn-sm btn-secondary" data-bs-toggle="tooltip"
                                                    data-bs-original-title="">
                                                    Not Available
                                                </a>
                                                <a href="javascript:;" class="ms-3" data-bs-toggle="tooltip"
                                                    data-bs-original-title="Deactive Class">
                                                    <i
                                                        class="material-icons text-danger position-relative text-lg">delete</i>
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
    <script src="{{ asset('js/plugins/datatables.js') }}"></script>
    <script src="{{ asset('js/plugins/choices.min.js') }}"></script>
    <script>
        var materialAvailableUrl = "{{ route('schoolMaterialEnquiry.materialAvailable') }}";

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
