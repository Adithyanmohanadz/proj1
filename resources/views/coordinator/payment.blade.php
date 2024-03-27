@extends('coordinator.common.coordinator_layout')
@section('page_content_body')
    <div class="container-fluid py-1">
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
                                    <button class="btn btn-primary btn-sm export mb-0 mt-sm-0 mt-1" type="button"
                                        name="button" data-bs-toggle="modal" data-bs-target="#coordinatorPaymentModal">+
                                        Add </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="coordinatorPaymentModal" tabindex="-1" role="dialog"
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
                                                <form id="coordinatorPaymentForm" data-route="{{ route('payment.store') }}">
                                                    <div class="modal-body">
                                                        <div class="mt-4 input-group input-group-dynamic ">
                                                            <label class="form-label bg-white pe-6"
                                                                style="z-index: 1;">Select Date</label>
                                                            <input class="form-control" name="paid_date" type="date" />
                                                        </div>
                                                        <div class="mt-4 input-group input-group-dynamic ">
                                                            <label class="form-label ">Particulars</label>
                                                            <input class="form-control" name="particulars" type="text" />
                                                        </div>
                                                        <div class="mt-4 input-group input-group-dynamic ">
                                                            <label class="form-label ">Pay Amount</label>
                                                            <input class="form-control" name="paid_amount" type="number" />
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn bg-gradient-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn bg-gradient-primary">Submit
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-outline-primary btn-sm export mb-0 mt-sm-0 mt-1" data-type="csv"
                                        type="button" name="button">download</button>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-body px-0 pb-0">
                        <div class="table-responsive">
                            <table class="table table-flush" id="Payment-list">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="  text-uppercase text-secondary  ">sl/no</th>
                                        <th class="  text-uppercase text-secondary  "> PAYMENT ID </th>
                                        <th class="  text-uppercase text-secondary  "> PAYMENT DATE </th>
                                        <th class="  text-uppercase text-secondary  "> Particulars</th>
                                        <th class="  text-uppercase text-secondary  "> Amount </th>
                                        <th class="  text-uppercase text-secondary  "> PAYMENT STATUS </th>

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
                                                <p class="text-xs font-weight-bold mb-0">{{ $rows->coordinator_payment_id }}
                                                </p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $rows->paid_date }}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $rows->particulars }}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $rows->paid_amount }}</p>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span
                                                    class="badge badge-sm {{ $rows->status ? 'badge-success' : 'badge-danger' }} ">
                                                    {{ $rows->status == 1 ? 'Approved' : 'Not Approved' }}</span>
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

        if (document.querySelector('.datetimepicker')) {
            flatpickr('.datetimepicker', {
                allowInput: true
            }); // flatpickr
        }
    </script>
@endsection
