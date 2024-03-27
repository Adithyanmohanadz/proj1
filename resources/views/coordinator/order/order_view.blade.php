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
                                    {{ Carbon::parse($consolidateOrder->order_date)->format('d/m/Y') }} </h6>
                            </div>

                            <div class="col-md-6">
                                <p class=" text-xs m-0">Order id</p>
                                <h6 class="text-uppercase mb-4">
                                    {{ $consolidateOrder->order_id }}
                                </h6>
                            </div>
                            <div class="col-md-6">
                                <p class=" text-xs m-0">Coordinater</p>
                                <h6 class="text-uppercase mb-4">
                                    {{ $consolidateOrder->coordinator_name }}
                                </h6>
                            </div>
                            <div class="col-md-6">
                                <p class=" text-xs m-0">Coordinater Username</p>
                                <h6 class="text-uppercase mb-4">
                                    {{ $consolidateOrder->username }}
                                </h6>
                            </div>
                            <div class="col-md-6">
                                <p class=" text-xs m-0">Mobile Number</p>
                                <h6 class="text-uppercase  mb-4">
                                    {{ $consolidateOrder->mobile }}
                                </h6>
                            </div>
                            <div class="col-md-6">
                                <p class=" text-xs m-0">Email </p>
                                <h6 class="   mb-4">
                                    {{ $consolidateOrder->email }}
                                </h6>
                            </div>
                            <div class="col-md-6">
                                <p class=" text-xs m-0"> Status</p>
                                <h6 class="text-capitalize  mb-4">
                                    @if ($consolidateOrder->order_status == 'pending')
                                        <span class="bg-light text-danger px-3 py-1 border-radius-lg">PENDING</span>
                                    @elseif ($consolidateOrder->order_status == 'dispatch')
                                        <span class="bg-light text-warning px-3 py-1 border-radius-lg">DISPATCH</span>
                                    @elseif ($consolidateOrder->order_status == 'executed')
                                        <span class="bg-light text-success px-3 py-1 border-radius-lg">EXECUTED</span>
                                    @elseif ($consolidateOrder->order_status == 'received')
                                        <span class="bg-light text-primary px-3 py-1 border-radius-lg">RECEIVED</span>
                                    @endif
                                </h6>
                            </div>
                        </div>
                        <hr class="horizontal dark">

                        <div class="card-header p-0 ">
                            <div class="d-lg-flex">
                                <div>
                                    <p class="font-weight-normal h6 mb-3">Order Shiping Information</p>
                                </div>
                                @if ($consolidateOrder->order_status == 'pending')
                                    <div class="col-md-3 col-6 ms-lg-auto mt-n2">
                                        <select class="form-control " name="co_shipping_id" id="co_shipping_id">
                                            <option value="" disabled selected>Select Order Shiping Information
                                            </option>
                                            @foreach ($shippingAddress as $row)
                                                <option value="{{ $row->shipping_address_id }}">{{ $row->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <br>

                        <div class="row" id="co_shippingDataDisplay">
                            <div class="col-md-4">
                                <p class=" text-xs m-0">Address</p>
                                <h6 class="text-uppercase  mb-4">
                                    {{ $consolidateOrder->address }}
                                </h6>
                            </div>
                            <div class="col-md-4">
                                <p class=" text-xs m-0">Landmark</p>
                                <h6 class="text-uppercase  mb-4">
                                    {{ $consolidateOrder->landmark }}
                                </h6>
                            </div>
                            <div class="col-md-4">
                                <p class=" text-xs m-0">City</p>
                                <h6 class="text-uppercase  mb-4">
                                    {{ $consolidateOrder->city }}
                                </h6>
                            </div>
                            <div class="col-md-4">
                                <p class=" text-xs m-0">State</p>
                                <h6 class="text-uppercase  mb-4">
                                    {{ $consolidateOrder->state }}
                                </h6>
                            </div>
                            <div class="col-md-4">
                                <p class=" text-xs m-0">Country</p>
                                <h6 class="text-uppercase  mb-4">
                                    {{ $consolidateOrder->country }}
                                </h6>
                            </div>
                            <div class="col-md-4">
                                <p class=" text-xs m-0">Postal code</p>
                                <h6 class="text-uppercase  mb-4">
                                    {{ $consolidateOrder->pincode }}
                                </h6>
                            </div>
                        </div>

                        <hr class="horizontal dark">
                        <div class="card-header p-0">
                            <div class="d-lg-flex">
                                <div>
                                    <p class="font-weight-normal h6">Order item</p>
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
                                        @foreach ($orders as $rows)
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
                                                    class="text-secondary text-md  font-weight-bold ">{{ $totalQuantity }}</span>
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
                        <hr class="horizontal dark">
                        @if ($consolidateOrder->order_status != 'pending')
                            <p class="font-weight-normal h6 mb-3">Order updation </p>
                            <div>
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <div class="input-group input-group-dynamic">
                                            <label class="form-label">Godown</label>
                                            <input class="  form-control" value="{{ $consolidateOrder->godown_name }}"
                                                disabled type="text" />
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                        <div class="input-group input-group-dynamic">
                                            <label class="form-label">Executed By</label>
                                            <input class="  form-control" value="{{ $consolidateOrder->executive_name }}"
                                                disabled type="text" />
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 mt-3">
                                        <div class="input-group input-group-dynamic">
                                            <label class="form-label">Executed Date</label>
                                            <input class="  form-control" value="{{ $consolidateOrder->executed_date }}"
                                                disabled type="text" />
                                        </div>
                                    </div>
                                </div>
                                @if ($consolidateOrder->order_status == 'executed')
                                <div class="row mt-4">
                                    <div class="col-12 col-sm-6">
                                        <div class="input-group input-group-dynamic">
                                            <label class="form-label text-primary "
                                                style="top: -.8rem; font-size: .7rem;">Courier
                                                Date</label>
                                            <input class="form-control" value="{{ $consolidateOrder->courier_date }}"
                                                disabled type="date" />
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                        <div class="input-group input-group-dynamic">
                                            <label class="form-label">Tracking ID</label>
                                            <input value="{{ $consolidateOrder->tracking_id }}" class=" form-control"
                                                disabled type="text" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-12 col-sm-6">
                                        <div class="input-group input-group-dynamic">
                                            <label class="form-label ">Method of Delivery</label>
                                            <input value="{{ $consolidateOrder->method_of_delivery }}"
                                                class="  form-control" disabled type="text" />
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                        <div class="input-group input-group-dynamic">
                                            <label class="form-label text-primary "
                                                style="top: -.8rem; font-size: .7rem;">Remark</label>
                                            <textarea  class=" form-control" disabled type="text" name=""
                                                id="" rows="1"> {{ $consolidateOrder->remark }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                        @endif
                        <div class="button-row d-flex mt-4">
                            @if ($consolidateOrder->order_status == 'executed')
                                <button value="{{$consolidateOrder->consolidate_order_id}}" class="btn btn-lg bg-gradient-success  px-6" id="orderReceived" type="button"
                                    title="Received">Order
                                    Received</button>
                            @endif
                            <!-- <button class="btn btn-lg bg-gradient-danger ms-3 px-6" type="button" title="Delete">Order Delete</button>  -->
                            @if ($consolidateOrder->order_status == 'pending')
                                <a href="coordinator_send_order"><button class="btn btn-lg bg-gradient-warning ms-3 px-6"
                                        type="button" title="Back">Order Edit</button></a>
                            @endif
                            <a href="coordinator_order_r" class="ms-auto"><button class="btn bg-gradient-dark btn-lg "
                                    type="button" title="Back">Back</button></a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/plugins/choices.min.js') }}"></script>
    <script>
        var allOrderUrl = "{{route('allOrder')}}"
        var fetchShippingAddress = "{{ route('orderConfirmation.fetchShippingDetailsById') }}";
        var orderReceivedUrl = "{{route('orderReceived')}}"

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
        if (document.getElementById('co_shipping_id')) {
            var element = document.getElementById('co_shipping_id');
            const example = new Choices(element, {
                searchEnabled: true,
                shouldSort: false,
            });
        };
    </script>
@endsection
