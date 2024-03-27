@extends('coordinator.common.coordinator_layout')
@section('page_content_body')
<div class="container-fluid py-1">
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

                                <a href="{{route('coordinator.schoolRegistration')}}" class="btn bg-gradient-primary btn-sm mb-0">+ Add </a>

                                <button class="btn btn-outline-primary btn-sm export mb-0 mt-sm-0 mt-1" data-type="csv" type="button" name="button">Download</button>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="card-body px-0 pb-0">
                    <div class="table-responsive">
                        <table class="table table-flush" id="school-list">
                            <thead class="thead-light">
                                <tr>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">sl/no</th>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">School name</th> 
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">city</th>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">state</th>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder text-center">document</th>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder text-center">Approval status</th>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder text-center">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($all_schools as $row)
                                    
                                <tr>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{$loop->iteration}}</p>
                                    </td>
                                    <td>
                                        <h6 class="mb-0 text-md">{{$row->school_name}}</h6>
                                    </td> 
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{$row->city}}</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{$row->state}}</p>
                                    </td>
                                    <td class="download-cell " data-file="{{ $row->school_file }}">
                                        @if ($row->school_file)
                                            <a class="btn btn-primary btn-sm text-xs" href="{{ asset($row->school_file) }}" download>Download</a>
                                        @else
                                            <p>No file available</p>
                                        @endif
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        @if ($row->status == 1)
                                            <span class="badge badge-sm badge-success">approved</span>
                                        @else
                                            <span class="badge badge-sm badge-danger">not approved</span>
                                        @endif
                                    </td>
                                    <td class="text-sm text-center">
                                        <a href="coordinator_school_creation" class="" data-bs-toggle="tooltip" data-bs-original-title="Edit School Profile">
                                            <i class="material-icons text-success position-relative text-lg">drive_file_rename_outline</i>
                                        </a>
                                        <a href="javascript:;" class="ms-3" data-bs-toggle="tooltip" data-bs-original-title="Deactivate School">
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
</script>
@endsection
