@extends('common.layout')
@section('page_content_body')
<style>
    .choices .choices__input {
        width: 100%;
    }

    .border-none {
        border-color: #fff;
    }
</style>

<div class="container-fluid py-1 mb-6">
    <div class="row">
        <div class="col-12 ">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-lg-flex">
                        <div>
                            <h5 class="mb-0">Assign To Coordinator</h5>
                        </div>
                        <div class="ms-auto my-auto mt-lg-0 mt-4">
                            <div class="ms-auto my-auto">
                                <a href=" " class="btn bg-gradient-primary btn-sm mb-0" type="button" data-bs-toggle="modal" data-bs-target="#assignExaminerToCoordinatorModel">+&nbsp; Add </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pb-0">
                    <div class="table-responsive">
                        <table class="table table-flush" id="Assign-list">
                            <thead class="thead-light">
                                <tr>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">sl/no</th>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">Coordinator </th>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">Examiners List</th>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">Action</th>
                                </tr>
                            </thead>
                            <tbody id="table_div">
                                {!! $data !!}                   
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
                <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Edit Assign To Coordinator </h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="">
                <div class="modal-body">
                    <div class="mt-4 input-group input-group-dynamic ">
                        <label class="form-label text-primary " style="top: -.8rem; font-size: .7rem;">Coordinator</label>
                        <select class="form-control " name=" " id="choices-coordinator-2">
                            <option value="" selected disabled>Select Coordinator</option>
                            <option value="">1</option>
                            <option value="">2</option>
                        </select>
                    </div>
                    <div class="mt-4  ">
                        <label class="mt-4 form-label">Select Examiners </label>
                        <select class="form-control" name="" id="examiners-add-2" multiple>
                            <option value="Choice 3">Examiners 1</option>
                            <option value="Choice 4">Examiners 2</option>
                            <option value="Choice 1">Examiners 3</option>
                            <option value="Choice 1">Examiners 4</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn bg-gradient-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal -->

<!-- Modal -->
<div class="modal fade" id="assignExaminerToCoordinatorModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Assign To Coordinator</h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="assignExaminerToCoordinatorForm" data-route="{{route('examiner.coordinatorAssignStore')}}">
                <div class="modal-body">
                    <div class="mt-4 input-group input-group-dynamic ">
                        <label class="form-label text-primary " style="top: -.8rem; font-size: .7rem;">Coordinator</label>
                        <select class="form-control " name="coordinator_id" id="choices-coordinator-1">
                            <option value="" selected disabled>Select Coordinator</option>
                            @foreach ($coordinators as  $coordinator_name => $coordinator_id)
                                <option value="{{$coordinator_id}}">{{$coordinator_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-4  ">
                        <label class="mt-4 form-label">Select Examiners </label>
                        <select class="form-control" name="examiner_ids" id="examiner_ids" multiple>
                            @foreach ($examiners as  $examiner_name => $examiner_id)
                                <option value="{{$examiner_id}}">{{$examiner_name}}</option>
                            @endforeach
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


<script src="{{ asset('js/plugins/datatables.js')}}"></script>
<script src="{{ asset('js/plugins/choices.min.js')}}"></script>


<script>
    if (document.getElementById('Assign-list')) {
        const dataTableSearch = new simpleDatatables.DataTable("#Assign-list", {
            searchable: true,
            fixedHeight: false,
            perPage: 7
        });

        document.querySelectorAll(".export").forEach(function(el) {
            el.addEventListener("click", function(e) {
                var type = el.dataset.type;

                var data = {
                    type: type,
                    filename: "Assign To Coordinator " + type,
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
    if (document.getElementById('examiner_ids')) {
        var element = document.getElementById('examiner_ids');
        const example = new Choices(element, {
            removeItemButton: true,
        });
    }
    if (document.getElementById('choices-coordinator-1')) {
        var element = document.getElementById('choices-coordinator-1');
        const example = new Choices(element, {
            searchEnabled: true,
            shouldSort: false,
        });
    };
    if (document.getElementById('examiners-add-2')) {
        var element = document.getElementById('examiners-add-2');
        const example = new Choices(element, {
            removeItemButton: true,
        });
    }
    if (document.getElementById('choices-coordinator-2')) {
        var element = document.getElementById('choices-coordinator-2');
        const example = new Choices(element, {
            searchEnabled: true,
            shouldSort: false,
        });
    };
</script>
@endsection
