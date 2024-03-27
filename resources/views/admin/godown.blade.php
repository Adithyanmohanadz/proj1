@extends('common.layout')
@section('page_content_body')
<div class="container-fluid py-1 mb-6">
    <div class="row">
        <div class="col-12 ">
            <div class="card">

                <div class="card-header pb-0">
                    <div class="d-lg-flex">
                        <div>
                            <h5 class="mb-0">Godown List</h5>
                        </div>

                        <div class="ms-auto my-auto mt-lg-0 mt-4">
                            <div class="ms-auto my-auto">
                                <a href=" " class="btn bg-gradient-primary btn-sm mb-0" type="button" data-bs-toggle="modal" data-bs-target="#godownAddModal">+ Add</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pb-0">
                    <div class="table-responsive">
                        <table class="table table-flush table-bordered rounded-3" id="bra nch-list">
                            <thead class="thead-dark">
                                <tr>
                                    <th class="  text-uppercase text-dark text-sm font-weight-bolder ">sl/no</th>
                                    <th class="  text-uppercase text-dark text-sm font-weight-bolder ">Godown </th>
                                    <th class="  text-uppercase text-dark text-sm font-weight-bolder ">Godown Name</th>
                                    <th class="  text-uppercase text-dark text-sm font-weight-bolder ">Godown state</th>
                                    <th class=" text-center text-uppercase text-dark text-sm font-weight-bolder ">status</th>
                                    <th class="  text-uppercase text-dark text-sm font-weight-bolder ">Action</th>

                                </tr>
                            </thead>
                            <tbody id="table_div">
                                @foreach ($godowns as $row )
                                    
                                <tr>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{ $loop->iteration }}</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">Godwon {{$loop->iteration }}</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{$row->godown_name}}</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{$row->godownState->state}}</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        @if ($row->status == 1)
                                            <span class="badge badge-sm badge-success">Active</span>
                                        @else
                                            <span class="badge badge-sm badge-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td class="text-sm">
                                        <a class="ms-3" data-bs-toggle="tooltip" data-bs-original-title="Edit Godown State">
                                            <i class="material-icons text-success position-relative text-lg" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">drive_file_rename_outline</i>
                                        </a>
                                        <a href="javascript:;" class="ms-3" data-bs-toggle="tooltip" data-bs-original-title="Activate Godown  ">
                                            <i class="material-icons text-info position-relative text-lg">power_settings_new</i>
                                        </a>
                                        <a href="javascript:;" class="ms-3" data-bs-toggle="tooltip" data-bs-original-title="Deactive Godown">
                                            <i class="material-icons text-danger position-relative text-lg">delete</i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                <tr></tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="godownAddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Add Godown State</h5>
                                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action=""  id="godownForm" data-route="{{ route('godown.store') }}">
                                <div class="modal-body">
                                    <div class="mt-4 input-group input-group-dynamic ">
                                        <label class="form-label text-primary " style="top: -.8rem; font-size: .7rem;">State</label>
                                        <select class="form-control " name="state_id" id="choices-state-1">
                                            <option value="" selected disabled>Select State</option>
                                            @foreach ($states as $row)
                                            <option value="{{ $row->state_id }}">{{ $row->state }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mt-4 input-group input-group-dynamic ">
                                        <label class="form-label">Godown Name</label>
                                        <input class="form-control" name="godown_name" type="text" />
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
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn bg-gradient-primary">Save changes</button>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->

                    <!-- Modal -->
                    <div class="modal fade" id="godownEditModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Add Godown </h5>
                                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="">
                                <div class="modal-body">
                                    <div class="mt-4 input-group input-group-dynamic ">
                                        <label class="form-label text-primary " style="top: -.8rem; font-size: .7rem;">State</label>
                                        <select class="form-control " name=" " id="choices-state-2">
                                            <option value="" selected disabled>Select State</option>
                                            <option value="">1</option>
                                            <option value="">2</option>
                                        </select>
                                    </div>
                                    <div class="mt-4 input-group input-group-dynamic ">
                                        <label class="form-label">Godown Name</label>
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
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn bg-gradient-primary">Add</button>
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
<script src="{{ asset('js/plugins/datatables.js')}}"></script>
<script src="{{ asset('js/plugins/choices.min.js')}}"></script>


<script>
    if (document.getElementById('branch-list')) {
        const dataTableSearch = new simpleDatatables.DataTable("#branch-list", {
            searchable: true,
            fixedHeight: false,
            perPage: 7
        });

        document.querySelectorAll(".export").forEach(function(el) {
            el.addEventListener("click", function(e) {
                var type = el.dataset.type;

                var data = {
                    type: type,
                    filename: "Branch " + type,
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
