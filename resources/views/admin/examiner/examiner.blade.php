@extends('common.layout')
@section('page_content_body')
<div class="container-fluid py-1 mb-6">
    <div class="row">
        <div class="col-12 ">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-lg-flex">
                        <div>
                            <h5 class="mb-0">Examiners List</h5>
                        </div>
                        <div class="ms-auto my-auto mt-lg-0 mt-4">
                            <div class="ms-auto my-auto">
                                <button class="btn bg-gradient-primary btn-sm mb-0" type="button" data-bs-toggle="modal" data-bs-target="#addExaminerModel">+ Add</button>
                                <button class="btn btn-outline-primary btn-sm export mb-0 mt-sm-0 mt-1" data-type="csv" type="button" name="button">Download</button>
                            </div>
                        </div>
                    </div>
                    <div class="ms-auto my-auto ">
                        <a href="{{route('examiner.coordinatorAssign')}}" class="btn bg-gradient-primary btn-sm mb-0 mt-3" type="button" >Assign To Coordinator</a>
                        <a href="{{route('examiner.schoolAssign')}}" class="btn bg-gradient-primary btn-sm mb-0 mt-3" type="button" >Assign to Schools</a>
                    </div>
                </div>
                <div class="card-body px-0 pb-0">
                    <div class="table-responsive">
                        <table class="table table-flush" id="">
                            <thead class="thead-light">
                                <tr>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">sl/no</th>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">Examiner </th>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">mobile </th>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">email </th>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">State </th>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">city </th>
                                    <th class=" text-center text-uppercase text-secondary text-xs font-weight-bolder ">status</th>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">Action</th>

                                </tr>
                            </thead>
                            <tbody id="table_div">
                                @foreach ($examiners as $rows )
                                <tr>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{$loop->iteration}}</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{$rows->examiner_name}} </p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{$rows->mobile}} </p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{$rows->email}}</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{$rows->state->state}}</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{$rows->city->city}}</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        @if ($rows->status)
                                        <span class="badge badge-sm badge-success">active</span>
                                        @else
                                        <span class="badge badge-sm badge-danger">Inactive</span>    
                                        @endif
                                    </td>
                                    <td class="text-sm">
                                        <a class="ms-3" data-bs-toggle="tooltip" data-bs-original-title="Edit Examiner">
                                            <i class="material-icons text-success position-relative text-lg" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">drive_file_rename_outline</i>
                                        </a>
                                        <a href="javascript:;" class="ms-3" data-bs-toggle="tooltip" data-bs-original-title="Activate Examiner  ">
                                            <i class="material-icons text-info position-relative text-lg">power_settings_new</i>
                                        </a>
                                        <a href="javascript:;" class="ms-3" data-bs-toggle="tooltip" data-bs-original-title="Deactive Examiner">
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Edit Examiner </h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="mt-4 input-group input-group-dynamic ">
                    <label class="form-label">Examiner Name</label>
                    <input class="form-control" type="text" />
                </div>
                <div class="mt-4 input-group input-group-dynamic ">
                    <label class="form-label">Email</label>
                    <input class="form-control" type="email" />
                </div>
                <div class="mt-4 input-group input-group-dynamic ">
                    <label class="form-label">Mobile</label>
                    <input class="form-control" type="tel" />
                </div>
                <div class="mt-4 input-group input-group-dynamic ">
                    <label class="form-label">Address </label>
                    <input class="form-control" type="text" />
                </div>
                <div class="mt-4 input-group input-group-dynamic ">
                    <label class="form-label text-primary " style="top: -.8rem; font-size: .7rem;">State</label>
                    <select class="form-control " name=" " id="choices-state-1">
                       
                    </select>
                </div>
                <div class="mt-4 input-group input-group-dynamic ">
                    <label class="form-label text-primary " style="top: -.8rem; font-size: .7rem;">City</label>
                    <select class="form-control " name=" " id="choices-state-1">
                        <option value="" selected disabled>Select City</option>
                        <option value="">1</option>
                        <option value="">2</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn bg-gradient-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->

<!-- Modal -->
<div class="modal fade" id="addExaminerModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Add Examiner </h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="addExaminerForm" data-route="{{route('examiner.store')}}" method="POST">
                <div class="modal-body">
                    <div class="mt-4 input-group input-group-dynamic ">
                        <label class="form-label">Examiner Name</label>
                        <input class="form-control" name="examiner_name" type="text" />
                    </div>
                    <div class="mt-4 input-group input-group-dynamic ">
                        <label class="form-label">Email</label>
                        <input class="form-control" name="email" type="email" />
                    </div>
                    <div class="mt-4 input-group input-group-dynamic ">
                        <label class="form-label">Mobile</label>
                        <input class="form-control" name="mobile" type="tel" />
                    </div>
                    <div class="mt-4 input-group input-group-dynamic ">
                        <label class="form-label">Address </label>
                        <input class="form-control" name="address" type="text" />
                    </div>
                    <div class="mt-4 input-group input-group-dynamic ">
                        <label class="form-label text-primary " style="top: -.8rem; font-size: .7rem;">State</label>
                        <select class="form-control " name="ex_state_id" id="ex_state_id">
                            <option selected disabled>Select State</option>
                            @foreach ($states as $state => $state_id)
                                <option value="{{$state_id}}">{{$state}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-4 input-group input-group-dynamic ">
                        <label class="form-label text-primary " style="top: -.8rem; font-size: .7rem;">City</label>
                        <select class="form-control " name="ex_city_id" id="ex_city_id">
                            <option value="" selected disabled>Select City</option>
                         
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn bg-gradient-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal -->
<script src="{{ asset('js/plugins/datatables.js') }}"></script>
<script src="{{ asset('js/plugins/choices.min.js') }}"></script>
<script>
    var fetchCityUrl = "{{route('examiner.fetch_city')}}"
    if (document.getElementById('Examiner-list')) {
        const dataTableSearch = new simpleDatatables.DataTable("#Examiner-list", {
            searchable: true,
            fixedHeight: false,
            perPage: 7
        });
        document.querySelectorAll(".export").forEach(function(el) {
            el.addEventListener("click", function(e) {
                var type = el.dataset.type;

                var data = {
                    type: type,
                    filename: "Examiner " + type,
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
    if (document.getElementById('choices-state-1')) {
        var element = document.getElementById('choices-state-1');
        const example = new Choices(element, {
            searchEnabled: true,
            
        });
    };
    if (document.getElementById('ex_state_id')) {
        var element = document.getElementById('ex_state_id');
        const example = new Choices(element, {
            searchEnabled: true,
            shouldSort: false,
        });
    };
    if (document.getElementById('choices-city-1')) {
        var element = document.getElementById('choices-city-1');
        const example = new Choices(element, {
            searchEnabled: true,
            shouldSort: false,
        });
    };
    if (document.getElementById('choices-city-2')) {
        var element = document.getElementById('choices-city-2');
        const example = new Choices(element, {
            searchEnabled: true,
            shouldSort: false,
        });
    };
</script>
@endsection
