@extends('coordinator.common.coordinator_layout')
@section('page_content_body')
    <div class="container-fluid py-1">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header pb-0">
                        <div class="d-lg-flex">
                            <div>
                                <h5 class="mb-0">Delivery Challan</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-0">
                        <div class="table-responsive">
                            <table class="table table-flush " id="total-order">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">sl/no</th>
                                        <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">Order Id
                                        </th>
                                        <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">Order date
                                        </th>
                                        <th class="  text-uppercase text-secondary text-xs font-weight-bolder text-center">
                                            order status</th>
                                        <th class="  text-uppercase text-secondary text-xs font-weight-bolder "> Challan
                                        </th>
                                        <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">View order
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($allOrders as $rows)
                                        <tr>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $loop->iteration }}</p>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">{{ $rows->order_id }}</p>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">
                                                    {{ \Carbon\Carbon::createFromFormat('Y-m-d', $rows->order_date)->format('d/m/Y') }}
                                                </p>
                                            </td>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                @php
                                                    switch ($rows->order_status) {
                                                        case 'pending':
                                                            $badgeClass = 'badge-danger';
                                                            $statusText = 'Pending';
                                                            break;
                                                        case 'dispatch':
                                                            $badgeClass = 'badge-warning';
                                                            $statusText = 'Dispatch';
                                                            break;
                                                        case 'executed':
                                                            $badgeClass = 'badge-success';
                                                            $statusText = 'Executed';
                                                            break;
                                                        case 'received':
                                                            $badgeClass = 'badge-primary';
                                                            $statusText = 'Received';
                                                            break;
                                                        default:
                                                            $badgeClass = 'badge-secondary';
                                                            $statusText = 'Unknown Status';
                                                    }
                                                @endphp
                                                <span class="badge badge-sm {{ $badgeClass }}">{{ $statusText }}</span>
                                            </td>
                                            <td class="text-sm">
                                                @if ($rows->order_status == 'pending')
                                                Nill
                                                @else
                                                    <a href="view_challan" target="_blank" class="mx-3"
                                                        data-bs-toggle="tooltip" data-bs-original-title="View Challan">
                                                        <i
                                                            class="material-icons text-danger position-relative text-lg">picture_as_pdf</i>
                                                    </a>
                                                @endif
                                            </td>
                                            <td class="text-sm">
                                                <a href="{{ route('consolidateOrderView', ['consolidate_order_id' => $rows->consolidate_order_id]) }}"
                                                    class="mx-3" data-bs-toggle="tooltip"
                                                    data-bs-original-title="View order">
                                                    <i
                                                        class="material-icons text-primary position-relative text-lg">visibility</i>
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
        if (document.getElementById('total-order')) {
            const dataTableSearch = new simpleDatatables.DataTable("#total-order", {
                searchable: true,
                fixedHeight: false,
                perPage: 7
            });
            document.querySelectorAll(".export").forEach(function(el) {
                el.addEventListener("click", function(e) {
                    var type = el.dataset.type;
                    var data = {
                        type: type,
                        filename: "Total Order " + type,
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
        if (document.getElementById('choices-coordinator')) {
            var element = document.getElementById('choices-coordinator');
            const example = new Choices(element, {
                searchEnabled: true,
                shouldSort: false,
            });
        };
        if (document.getElementById('choices-material')) {
            var element = document.getElementById('choices-material');
            const example = new Choices(element, {
                searchEnabled: true,
                shouldSort: false,
            });
        };
        if (document.getElementById('choices-order-status')) {
            var element = document.getElementById('choices-order-status');
            const example = new Choices(element, {
                searchEnabled: true,
                shouldSort: false,
            });
        };
        if (document.getElementById('choices-godown')) {
            var element = document.getElementById('choices-godown');
            const example = new Choices(element, {
                searchEnabled: true,
                shouldSort: false,
            });
        };
    </script>
@endsection
