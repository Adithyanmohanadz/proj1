@extends('common.layout')
@section('page_content_body')
    <div class="container-fluid py-1 mb-6">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-lg-flex">
                            <div>
                                <h5 class="mb-0">{{ $page_title }}</h5>
                            </div>
                            <div class="ms-auto my-auto mt-lg-0 mt-4">
                                <div class="ms-auto my-auto">
                                    <button class="btn btn-outline-primary btn-sm export mb-0 mt-sm-0 mt-1" data-type="csv"
                                        type="button" name="button">download</button>
                                </div>
                            </div>
                        </div>
                        <form id="fetchCoordinatorLedgerForm" data-route="{{route('payment.fetchLedger')}}">
                            <div class="d-lg-flex mt-4">
                                <div class="my-auto mt-lg-0 mt-4 col-12 col-md-6 col-lg-3">
                                    <div class="mt-1 input-group input-group-dynamic ">
                                        <label class="form-label text-primary "
                                            style="top: -.8rem; font-size: .7rem;">Coordinators</label>
                                        <select class="form-control " name="coordinator_id" id="ledger_coordinator_id">
                                            <option value="" disabled selected>Select Coordinators</option>
                                            @foreach ($allCoordinators as $coordinatorId => $coordinatorName)
                                                <option value="{{ $coordinatorId }}">
                                                    {{ $coordinatorName }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="button-row d-flex mt-4">
                                <button class="ms-auto mb-0 px-6 btn bg-gradient-dark "
                                        type="submit" title="submit">Submit for Filter</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-body px-0 pb-0">
                        <div class="ps-4 d-md-flex">
                            <h5 id="coordinatorNameId" class="mb-2">Coordinator Name</h5>
                            <h5 class="mb-2 ms-md-4">Outstanding - <span id="coordinatorOutstandingId"></span></h5>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-flush" id="Ledger-list">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="  text-uppercase text-secondary  ">sl/no</th>
                                        <th class="  text-uppercase text-secondary  "> Date </th>
                                        <th class="  text-uppercase text-secondary  "> Affected Date </th>

                                        <th class="  text-uppercase text-secondary  "> Number</th>
                                        <th class="  text-uppercase text-secondary  "> Particulars </th>
                                        <th class="  text-uppercase text-secondary  "> Narration </th>
                                        <th class="  text-uppercase text-secondary  "> in </th>
                                        <th class="  text-uppercase text-secondary  "> out</th>
                                        <th class="  text-uppercase text-secondary  "> Balance</th>
                                    </tr>
                                </thead>
                                <tbody id="coordinatorLedgerData">
                                   
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
    <script src="{{ asset('js/plugins/flatpickr.min.js') }}"></script>
    <script>
        if (document.getElementById('Ledger-list')) {
            const dataTableSearch = new simpleDatatables.DataTable("#Ledger-list", {
                searchable: true,
                fixedHeight: false,
                perPage: 7
            });
            document.querySelectorAll(".export").forEach(function(el) {
                el.addEventListener("click", function(e) {
                    var type = el.dataset.type;

                    var data = {
                        type: type,
                        filename: "Ledger " + type,
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
        if (document.getElementById('ledger_coordinator_id')) {
            var element = document.getElementById('ledger_coordinator_id');
            const example = new Choices(element, {
                searchEnabled: true,
                shouldSort: false,
            });
        };
    </script>
@endsection
