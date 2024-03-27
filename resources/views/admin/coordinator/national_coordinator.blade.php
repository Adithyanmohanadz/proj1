@extends('common.layout')
@section('page_content_body')
    <div class="container-fluid py-1 mb-6">
        <div class="row">
            <div class="col-12 ">
                <div class="card mb-3">
                    <div class="card-body">
                        <form id="nationalCoordinatorForm" data-route="{{ route('coordinator.nationalCoordinatorStore') }}">
                            <div class="border-radius-xl bg-white">
                                <h5 class="font-weight-bolder mb-2">{{ $page_title }}</h5>
                                <div class=" ">
                                    <div class="row mt-4">
                                        <div class="col-12 col-sm-6">
                                            <div class="input-group input-group-dynamic">
                                                <label class="form-label text-primary "
                                                    style="top: -.8rem; font-size: .7rem;"> State</label>
                                                <select class="form-control " name="state_id" id="choices-n-state">
                                                    <option value="" selected disabled>Select State </option>
                                                    @foreach ($states as $rows)
                                                        <option value="{{ $rows->state_id }}"> {{ $rows->state }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="input-group input-group-dynamic">
                                                <label class="form-label text-primary "
                                                    style="top: -.8rem; font-size: .7rem;">National Coordinater</label>
                                                <select class="form-control " name="coordinator_id"
                                                    id="choices-national-coordinater">
                                                    <option value="" selected disabled>Select National Coordinater
                                                    </option>
                                                    @foreach ($coordinators as $rows)
                                                        <option value="{{ $rows->coordinator_id }}">
                                                            {{ $rows->coordinator_name }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="  mt-3">
                                <div class="button-row d-flex">
                                    <button class="ms-auto mb-0 px-6 btn bg-gradient-dark " type="submit"
                                        title="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card">

                    <div class="card-header pb-0">
                        <div class="d-lg-flex">
                            <div>
                                <h5 class="mb-0">National Coordinaters</h5>
                            </div>
                            <div class="ms-auto my-auto mt-lg-0 mt-4">
                                <div class="ms-auto my-auto">
                                    <button class="btn btn-outline-primary btn-sm export mb-0 mt-sm-0 mt-1" data-type="csv"
                                        type="button" name="button">download</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-0">
                        <div class="table-responsive">
                            <table class="table table-flush" id="national-coordinater">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">sl/no</th>
                                        <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">State</th>
                                        <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">National
                                            Coordinater</th>
                                        <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="table_div">
                                    @foreach ($nationalCoordinators as $rows)
                                        <tr>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">{{$loop->iteration}}</p>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">{{$rows->state->state}}</p>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">{{$rows->coordinator->coordinator_name}}</p>
                                            </td>
                                            <td class="text-sm">
                                                <a href="javascript:;" class="ms-3" data-bs-toggle="tooltip"
                                                    data-bs-original-title="Delete ">
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
        if (document.getElementById('national-coordinater')) {
            const dataTableSearch = new simpleDatatables.DataTable("#national-coordinater", {
                searchable: true,
                fixedHeight: false,
                perPage: 7
            });

            document.querySelectorAll(".export").forEach(function(el) {
                el.addEventListener("click", function(e) {
                    var type = el.dataset.type;

                    var data = {
                        type: type,
                        filename: "National Coordinater " + type,
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
        if (document.getElementById('choices-national-coordinater')) {
            var element = document.getElementById('choices-national-coordinater');
            const example = new Choices(element, {
                searchEnabled: true,
                shouldSort: false,
            });
        };
        if (document.getElementById('choices-n-state')) {
            var element = document.getElementById('choices-n-state');
            const example = new Choices(element, {
                searchEnabled: true,
                shouldSort: false,
            });
        };
    </script>
@endsection
