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
                                    <a href="{{ route('payment.ledger') }}"> <button
                                            class="btn btn-primary btn-sm export mb-0 mt-sm-0 mt-1" type="button"
                                            name="button">Ledger</button> </a>
                                    <button class="btn btn-primary btn-sm export mb-0 mt-sm-0 mt-1" type="button"
                                        name="button" data-bs-toggle="modal" data-bs-target="#adminAddPaymentModal">+ Add
                                    </button>
                                    <!--admin edit payment Modal -->
                                    <div class="modal fade" id="paymentEditModal" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Add
                                                        Payments</h5>
                                                    <button type="button" class="btn-close text-dark"
                                                        data-bs-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="" id="paymentEditForm"
                                                    data-route="{{ route('paymentEdit') }}">
                                                    <div class="modal-body">
                                                        <div class="mt-5 input-group input-group-dynamic ">
                                                            <label class="form-label text-primary "
                                                                style="top: -.8rem; font-size: .7rem;">Coordinators</label>

                                                            <input class="form-control" disabled type="text"
                                                                id="pe_coordinatorName">
                                                        </div>
                                                        <div class="mt-4 input-group input-group-dynamic ">
                                                            <label class="form-label text-primary"
                                                                style="top: -.8rem; font-size: .7rem;">Select Date</label>
                                                            <input class="form-control" name="date" id="pe_date"
                                                                type="date" />
                                                        </div>
                                                        <div class="mt-4 input-group input-group-dynamic ">
                                                            <label class="form-label ">Particulars</label>
                                                            <input class="form-control" value="" name="particulars"
                                                                id="pe_particulars" type="text" />
                                                        </div>
                                                        <div class="mt-4 input-group input-group-dynamic ">
                                                            <label class="form-label "> Amount</label>
                                                            <input class="form-control" value="" name="amount"
                                                                id="pe_amount" type="number" />
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="coordinator_payment_id"
                                                        id="coordinator_payment_id">
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn bg-gradient-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn bg-gradient-primary">Update
                                                            Payments</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!--admin add payment against coordinator Modal -->
                                    <div class="modal fade" id="adminAddPaymentModal" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Add
                                                        Payments</h5>
                                                    <button type="button" class="btn-close text-dark"
                                                        data-bs-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="" id="adminAddPaymentForm"
                                                    data-route="{{ route('adminAddPayment') }}">
                                                    <div class="modal-body">
                                                        <div class="mt-5 input-group input-group-dynamic ">
                                                            <label class="form-label text-primary "
                                                                style="top: -.8rem; font-size: .7rem;">Coordinators</label>
                                                            <select class="form-control " name="coordinator_id"
                                                                id="choices-coodinator">
                                                                <option value="" disabled selected>Select
                                                                    Coordinators
                                                                </option>
                                                                @foreach ($allCoordinators as $coordinatorId => $coordinatorName)
                                                                    <option value="{{ $coordinatorId }}">
                                                                        {{ $coordinatorName }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="mt-4 input-group input-group-dynamic ">
                                                            <label class="form-label text-primary"
                                                                style="top: -.8rem; font-size: .7rem;">Select Date</label>
                                                            <input class="form-control" name="paid_date" id=""
                                                                type="date" />
                                                        </div>
                                                        <div class="mt-4 input-group input-group-dynamic ">
                                                            <label class="form-label ">Particulars</label>
                                                            <input class="form-control" value="" name="particulars"
                                                                id="" type="text" />
                                                        </div>
                                                        <div class="mt-4 input-group input-group-dynamic ">
                                                            <label class="form-label "> Amount</label>
                                                            <input class="form-control" value="" name="paid_amount"
                                                                id="" type="number" />
                                                        </div>
                                                        <input type="hidden" name="fromWhere" value="admin">
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn bg-gradient-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn bg-gradient-primary">Add
                                                            Payments</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-outline-primary btn-sm export mb-0 mt-sm-0 mt-1"
                                        data-type="csv" type="button" name="button">download</button>
                                </div>
                            </div>
                        </div>
                        <form action="">
                            <div class="d-lg-flex mt-4">
                                <div class="  my-auto mt-lg-0 mt-4 col-12 col-md-6 col-lg-3">
                                    <div class="input-group input-group-static">
                                        <label>Start Date</label>
                                        <input class="form-control datetimepicker" type="text" data-input>
                                    </div>
                                </div>
                                <div class="ms-lg-3 my-auto mt-lg-0 mt-4 col-12 col-md-6 col-lg-3">
                                    <div class="input-group input-group-static">
                                        <label>End Date</label>
                                        <input class="form-control datetimepicker" type="text" data-input>
                                    </div>
                                </div>
                            </div>
                            <div class="d-lg-flex mt-4">
                                <div class="  my-auto mt-lg-0 mt-4 col-12 col-md-6 col-lg-3">
                                    <div class="mt-1 input-group input-group-dynamic ">
                                        <label class="form-label text-primary "
                                            style="top: -.8rem; font-size: .7rem;">Payment Status</label>
                                        <select class="form-control " name=" " id="choices-payment-status">
                                            <option value="" disabled selected>Select Payment Status</option>
                                            <option value="1"> 1</option>
                                            <option value="1"> 2</option>
                                            <option value="1"> 5</option>
                                            <option value="1"> 4</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="ms-lg-3  my-auto mt-lg-0 mt-4 col-12 col-md-6 col-lg-3">
                                    <div class="mt-1 input-group input-group-dynamic ">
                                        <label class="form-label text-primary "
                                            style="top: -.8rem; font-size: .7rem;">Coordinators</label>
                                        <select class="form-control " name=" " id="choices-payment-coodinator">
                                            <option value="" disabled selected>Select Coordinators</option>
                                            <option value="1"> 1</option>
                                            <option value="1"> 2</option>
                                            <option value="1"> 5</option>
                                            <option value="1"> 4</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="button-row d-flex mt-4">
                                <a href=" " class="ms-auto mb-0"><button class=" px-6 btn bg-gradient-dark "
                                        type="button" title="submit">Submit for Filter</button></a>
                            </div>
                        </form>
                    </div>
                    <div class="card-body px-0 pb-0">
                        <div class="table-responsive">
                            <table class="table table-flush" id="Payment-list">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="  text-uppercase text-secondary  ">sl/no</th>
                                        <th class="  text-uppercase text-secondary  "> coodinator </th>
                                        <th class="  text-uppercase text-secondary  "> coodinator username</th>
                                        <th class="  text-uppercase text-secondary  "> PAYMENT ID </th>
                                        <th class="  text-uppercase text-secondary  "> PAYMENT DATE </th>
                                        <th class="  text-uppercase text-secondary  "> Particulars</th>
                                        <th class="  text-uppercase text-secondary  "> Amount </th>
                                        <th class="  text-uppercase text-secondary  "> PAYMENT STATUS </th>
                                        <th class="text-center  text-uppercase text-secondary  "> Action </th>
                                    </tr>
                                </thead>
                                <tbody id="table_div">
                                    @php
                                        $totalAmount = 0;
                                    @endphp
                                    @foreach ($payments as $rows)
                                        <tr>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $loop->iteration }}</p>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">
                                                    {{ $rows->coordinator->coordinator_name }}</p>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">
                                                    {{ $rows->coordinator->username }}</p>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">
                                                    {{ $rows->coordinator_payment_id }} </p>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">{{ $rows->paid_date }}</p>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">{{ $rows->particulars }}</p>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">{{ $rows->paid_amount }}</p>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span
                                                    class="badge badge-sm {{ $rows->status ? 'badge-success' : 'badge-danger' }} ">
                                                    {{ $rows->status == 1 ? 'Approved' : 'Not Approved' }}</span>
                                            </td>
                                            <td class="text-sm text-center">
                                                @if ($rows->status == 0)
                                                    <a href="#" value="{{ $rows->coordinator_payment_id }}"
                                                        data-amount="{{ $rows->paid_amount }}"
                                                        data-coordinator-id={{ $rows->coordinator_id }}
                                                        data-paid-date="{{ $rows->paid_date }}"
                                                        data-particulars="{{ $rows->particulars }}"
                                                        id="paymentConfirmButton" class="btn btn-sm btn-light py-1 mx-2"
                                                        data-bs-toggle="tooltip"
                                                        data-bs-original-title="Payment Approved">
                                                        <i
                                                            class="material-icons text-success position-relative text-lg">done</i>
                                                    </a>
                                                    <a href="#" value="{{ $rows->coordinator_payment_id }}"
                                                        data-date="{{ $rows->paid_date }}"
                                                        data-coordinator-name="{{ $rows->coordinator->coordinator_name }}"
                                                        data-particulars="{{ $rows->particulars }}"
                                                        data-paid_amount="{{ $rows->paid_amount }}"
                                                        id="paymentEditButton" class="btn btn-sm btn-light py-1 mx-2"
                                                        data-bs-toggle="tooltip" data-bs-original-title="Payment Edit">
                                                        <i
                                                            class="material-icons text-warning position-relative text-lg">edit</i>
                                                    </a>
                                                @endif
                                            </td>
                                        </tr>
                                        @php
                                            $totalAmount += $rows->paid_amount;
                                        @endphp
                                    @endforeach
                                    <tr class="bg-light">
                                        <th class="  text-uppercase text-secondary  "></th>
                                        <th class="  text-uppercase text-secondary  "> </th>
                                        <th class="  text-uppercase text-secondary  "> </th>
                                        <th class="  text-uppercase text-secondary  "> </th>
                                        <th class="  text-uppercase text-secondary  "> Total</th>
                                        <th class="  text-uppercase text-secondary  "> </th>
                                        <th class="  text-uppercase text-secondary  "> {{ $totalAmount }}/- </th>
                                        <th class="  text-uppercase text-secondary  "> </th>
                                        <th class="  text-uppercase text-secondary  "> </th>
                                    </tr>
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
        var paymentConfirmUrl = "{{ route('paymentConfirm') }}"

        if (document.getElementById('Payment-list')) {
            const dataTableSearch = new simpleDatatables.DataTable("#Payment-list", {
                searchable: true,
                fixedHeight: false,
                perPage: 7
            });

            document.querySelectorAll(".export").forEach(function(el) {
                el.addEventListener("click", function(e) {
                    var type = el.dataset.type;

                    var data = {
                        type: type,
                        filename: "Payment " + type,
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
        if (document.getElementById('choices-payment-status')) {
            var element = document.getElementById('choices-payment-status');
            const example = new Choices(element, {
                searchEnabled: true,
                shouldSort: false,
            });
        };
        if (document.getElementById('choices-payment-coodinator')) {
            var element = document.getElementById('choices-payment-coodinator');
            const example = new Choices(element, {
                searchEnabled: true,
                shouldSort: false,
            });
        };
        if (document.getElementById('choices-coodinator')) {
            var element = document.getElementById('choices-coodinator');
            const example = new Choices(element, {
                searchEnabled: true,
                shouldSort: false,
            });
        };

        if (document.querySelector('.datetimepicker')) {
            flatpickr('.datetimepicker', {
                allowInput: true
            }); // flatpickr
        }
    </script>
@endsection
