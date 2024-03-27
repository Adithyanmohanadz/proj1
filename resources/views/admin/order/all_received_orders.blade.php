@extends('common.layout')
@section('page_content_body')
<div class="container-fluid py-1 mb-6">
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-header pb-0">
                    <div class="d-lg-flex">
                        <div>
                            <h5 class="mb-0">{{$page_title}}</h5>
                        </div>

                    </div>
                    
                </div>
                <div class="card-body px-0 pb-0">
                    <div class="table-responsive">
                        <table class="table table-flush " id="total-order">
                            <thead class="thead-light">
                                <tr>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">sl/no</th>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">Order Id</th>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">Order date</th>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">Coordinator</th> 
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">Godown</th> 
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">executed by</th>    
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">executed date</th>   
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder "> Challan</th>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder "> Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($receivedOrders as $rows)
                                <tr>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{$loop->iteration}}</p>
                                    </td>    
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{$rows->order_id}}</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{$rows->order_date}}</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{$rows->coordinator->coordinator_name}}</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0"> {{$rows->godown->godown_name}}</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{$rows->executive_name}}</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{ \Carbon\Carbon::parse($rows->executed_date)->format('d/m/Y') }}</p>
                                    </td> 
                                   
                                    <td class="text-sm">
                                        <a href="view_challan" target="_blank" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="View Challan">
                                            <i class="material-icons text-danger position-relative text-lg">picture_as_pdf</i>
                                        </a>
                                    </td>
                                    <td class="text-sm">
                                        <a href="{{ route('receivedOrderById.index', ['consolidate_order_id' => $rows->consolidate_order_id]) }}"  class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="View order">
                                            <i class="material-icons text-primary position-relative text-lg">visibility</i>
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
