
@extends('coordinator.common.coordinator_layout')
@section('page_content_body')
<div class="container-fluid py-1 mb-6">
    <div class="row">
        <div class="col-12 ">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-lg-flex">
                        <div>
                            <h5 class="mb-0">{{$page_title}}</h5>
                        </div>
                        <div class="ms-auto my-auto mt-lg-0 mt-4">
                            <div class="ms-auto my-auto"> 
                                <button class="btn btn-outline-primary btn-sm export mb-0 mt-sm-0 mt-1" data-type="csv" type="button" name="button">Download</button>
                            </div>
                        </div>
                    </div> 
                    <div class="ms-auto my-auto ">
                        <a href="{{route('coordinatorAssignExaminerToSchool')}}" class="btn bg-gradient-primary btn-sm mb-0 mt-3" type="button" >Assign to Schools</a>
                        <a href="{{route('examinerMeetLink')}}" class="btn bg-gradient-primary btn-sm mb-0 mt-3" type="button" >Add Examiners meet link </a>
                    </div>
                </div>
                <div class="card-body px-0 pb-0">
                    <div class="table-responsive">
                        <table class="table table-flush" id="Examiner-list">
                            <thead class="thead-light">
                                <tr>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">sl/no</th>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">Examiner </th>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">mobile </th>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">email </th>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">State </th>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">city </th>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">School</th> 
                                </tr>
                            </thead>
                            <tbody>
                               {!! $data !!}
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
