@php
    use Carbon\Carbon;
@endphp
@extends('coordinator.common.coordinator_layout')
@section('page_content_body')
    <div class="container-fluid pt-1">
        <div class="row">
            <div class="col-12 m-auto">
                <div class="card  ">
                    <div class="card-body">
                        <h4 class="font-weight-bolder mb-3"> View Order</h4>
                        <p class="font-weight-normal h6 my-3">Order Information</p>
                        <div class="row">
                            <div class="col-md-6">
                                <p class=" text-xs m-0">Order Date</p>
                                <h6 class="text-uppercase  mb-4">
                                    {{ \Carbon\Carbon::now()->format('d/m/Y') }}
                                </h6>
                            </div>
                            <div class="col-md-6">
                                <p class=" text-xs m-0">Order id</p>
                                <h6 class="text-uppercase mb-4">
                                    {{-- #45400-20230929-30 --}}
                                    #{{ session('order_id') }}
                                </h6>
                            </div>
                            <div class="col-md-6">
                                <p class=" text-xs m-0">Coordinater</p>
                                <h6 class="text-uppercase mb-4">
                                    {{ auth()->user()->coordinator_name }}
                                </h6>
                            </div>
                            <div class="col-md-6">
                                <p class=" text-xs m-0">Coordinater Username</p>
                                <h6 class="text-uppercase mb-4">
                                    {{ auth()->user()->username }}
                                </h6>
                            </div>
                            <div class="col-md-6">
                                <p class=" text-xs m-0">Mobile Number</p>
                                <h6 class="text-uppercase  mb-4">
                                    {{ auth()->user()->mobile }}
                                </h6>
                            </div>
                            <div class="col-md-6">
                                <p class=" text-xs m-0">Email</p>
                                <h6 class="   mb-4">
                                    {{ auth()->user()->email }}
                                </h6>
                            </div>
                        </div>
                        <hr class="horizontal dark">
                        <div class="card-header p-0 ">
                            <div class="d-lg-flex">
                                <div>
                                    <p class="font-weight-normal h6 mb-3">Order Shiping Information</p>
                                </div>
                                <div class="col-md-3 col-6 ms-lg-auto mt-n2">
                                    <select class="form-control " name="shipping_id" id="shipping_id">
                                        <option value="" disabled selected>Select Order Shiping Information</option>
                                        @foreach ($shippingAddress as $row)
                                            <option value="{{ $row->shipping_address_id }}">{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row" id="shippingDataDisplay">

                        </div>
                        <hr class="horizontal dark">
                        <div class="card-header p-0">
                            <div class="d-lg-flex">
                                <div>
                                    <p class="font-weight-normal h6">Order item</p>
                                </div>
                                <div class="ms-auto my-auto mt-lg-0 mt-4">
                                    <div class="ms-auto my-auto">
                                        <a href="{{ route('order-taking.index') }}"
                                            class="btn  btn-outline-info btn-sm mb-0">edit</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="card-body px-0 pb-0">
                            <div class="table-responsive">
                                <table class="table table-striped align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                                                Sl no</th>
                                            <th
                                                class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                                                Material</th>
                                            <th
                                                class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                                                product</th>
                                            <th
                                                class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                                                level</th>
                                            <th
                                                class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                                                class</th>
                                            <th
                                                class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                                                Qty</th>
                                            <th
                                                class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                                                amount</th>
                                            <th
                                                class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                                                total amount</th>
                                    </thead>
                                    <tbody>
                                        @php
                                            $totalQuantity = 0;
                                            $totalAmount = 0;
                                        @endphp
                                        @foreach ($insertedOrders as $rows)
                                            <tr>
                                                <td class="align-middle ">
                                                    <p class="text-xs  font-weight-bold mb-0">{{ $loop->iteration }}</p>
                                                </td>
                                                <td class="align-middle ">
                                                    <p class="text-xs  font-weight-bold mb-0">{{ $rows->material_name }}
                                                    </p>
                                                </td>
                                                <td class="align-middle ">
                                                    <p class="text-xs  font-weight-bold mb-0">{{ $rows->product_name }}</p>
                                                </td>
                                                <td class="align-middle ">
                                                    <p class="text-xs  font-weight-bold mb-0">{{ $rows->level }}</p>
                                                </td>
                                                <td class="align-middle ">
                                                    <p class="text-xs  font-weight-bold mb-0">{{ $rows->class }}</p>
                                                </td>
                                                <td class="align-middle ">
                                                    <span class="text-secondary text-xs  ">{{ $rows->quantity }}</span>
                                                </td>
                                                <td class="align-middle ">
                                                    <span class="text-secondary text-xs  ">₹ {{ $rows->amount }}</span>
                                                </td>
                                                <td class="align-middle ">
                                                    <span class="text-secondary text-xs  ">₹
                                                        {{ $rows->total_amount }}</span>
                                                </td>
                                            </tr>
                                            @php
                                                $totalQuantity += $rows->quantity;
                                                $totalAmount += $rows->total_amount;
                                            @endphp
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td class="align-middle ">
                                                <p class="text-xs  font-weight-bold mb-0"> </p>
                                            </td>
                                            <td class="align-middle ">
                                                <p class="text-md  font-weight-bold mb-0">Total</p>
                                            </td>
                                            <td class="align-middle ">
                                                <p class="text-xs  font-weight-bold mb-0"> </p>
                                            </td>
                                            <td class="align-middle ">
                                                <p class="text-xs  font-weight-bold mb-0"> </p>
                                            </td>
                                            <td class="align-middle ">
                                                <p class="text-xs  font-weight-bold mb-0"> </p>
                                            </td>
                                            <td class="align-middle ">
                                                <span
                                                    class="text-secondary text-md font-weight-bold">{{ $totalQuantity }}</span>
                                            </td>
                                            <td class="align-middle ">
                                                <span class="text-secondary text-md  font-weight-bold "> </span>
                                            </td>
                                            <td class="align-middle ">
                                                <span class="text-secondary text-md  font-weight-bold ">₹
                                                    {{ $totalAmount }}</span>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>

                        <div class="button-row d-flex mt-4">
                            <a href="coordinator_dashboard" class="ms-auto"><button
                                    class="ms-auto px-6 mx-2 btn bg-gradient-secondary" type="button"
                                    title="submit">Cancel</button></a>
                            {{-- <a href="coordinator_order_r" class=" "><button class=" px-6 btn bg-gradient-primary "
                                    type="button" title="submit">Submit</button></a> --}}
                            <button class=" px-6 btn bg-gradient-primary " id="placeOrder" type="button"
                                title="submit">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/plugins/choices.min.js') }}"></script>
    <script>
        var allOrderUrl = "{{ route('allOrder') }}";
        var shippingAddressUrl = "{{ route('orderConfirmation.fetchShippingDetailsById') }}";
        var placeOrderUrl = "{{ route('orderPlacing') }}";

        if (document.getElementById('choices-country')) {
            var element = document.getElementById('choices-country');
            const example = new Choices(element, {
                searchEnabled: true,
                shouldSort: false,
            });
        };
        if (document.getElementById('choices-city')) {
            var element = document.getElementById('choices-city');
            const example = new Choices(element, {
                searchEnabled: true,
                shouldSort: false,
            });
        };
        if (document.getElementById('choices-state')) {
            var element = document.getElementById('choices-state');
            const example = new Choices(element, {
                searchEnabled: true,
                shouldSort: false,
            });
        };
        if (document.getElementById('shipping_id')) {
            var element = document.getElementById('shipping_id');
            const example = new Choices(element, {
                searchEnabled: true,
                shouldSort: false,
            });
        };
    </script>
@endsection
