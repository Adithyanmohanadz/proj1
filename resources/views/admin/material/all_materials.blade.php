@extends('common.layout')
@section('page_content_body')
    <div class="container-fluid py-1 mb-6">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-lg-flex">
                            <div>
                                <h5 class="mb-0">{{$page_title}}</h5>
                            </div>
                            <div class="ms-auto my-auto mt-lg-0 mt-4">
                                <div class="ms-auto my-auto">
                                    <a href="{{route('material.index')}}" class="btn bg-gradient-primary btn-sm mb-0">+&nbsp; Add </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-0">
                        <div class="table-responsive">
                            <table class="table table-flush" id="material-list">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">sl/no</th>
                                        <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">material
                                            name</th>
                                        <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">product
                                        </th>
                                        <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">level </th>
                                        <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">class </th>
                                        <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">material
                                            price </th>
                                        <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">RESOURCES
                                            file</th>
                                        <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($materials as $rows )
                                    <tr>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{$loop->iteration}}</p>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0"> {{$rows->material_name}}</p>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0">{{$rows->product->product_name}} </p>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0">{{$rows->materialCategory->level}} </p>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0">{{$rows->class->class}}  </p>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0"> {{$rows->material_price}} </p>
                                        </td>
                                        <td class="download-cell">
                                            @if ($rows->material_resource)
                                                <a class="btn btn-primary btn-sm text-xs"
                                                    href="{{ asset($rows->material_resource) }}" download>Download</a>
                                            @else
                                                <p>No file available</p>
                                            @endif
                                        </td>
                                        <td class="text-sm">
                                            <a href="material_creation" class="mx-3" data-bs-toggle="tooltip"
                                                data-bs-original-title="Edit  ">
                                                <i
                                                    class="material-icons text-primary position-relative text-lg">drive_file_rename_outline</i>
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
        if (document.getElementById('material-list')) {
            const dataTableSearch = new simpleDatatables.DataTable("#material-list", {
                searchable: true,
                fixedHeight: false,
                perPage: 7
            });

            document.querySelectorAll(".export").forEach(function(el) {
                el.addEventListener("click", function(e) {
                    var type = el.dataset.type;

                    var data = {
                        type: type,
                        filename: "Material list " + type,
                    };

                    if (type === "csv") {
                        // data.columnDelimiter = "|";
                    }

                    dataTableSearch.export(data);
                });
            });
        };
    </script>
@endsection
