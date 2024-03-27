@php
    use Carbon\Carbon;
@endphp
@extends('common.layout')
@section('page_content_body')
    <div class="container-fluid py-1 mb-6">
        <div class="row">
            <div class="col-12 m-auto">

                <div class="card  ">
                    <div class="card-body">
                        <h5 class="font-weight-bolder mb-3">{{ $page_title }}</h5>
                        <h2 class="font-weight-bolder my-2"> Order id : {{ $consolidateOrder->order_id }}</h2>
                        <hr class="horizontal dark">
                        <p class="font-weight-normal h6 my-3">Order Information</p>
                        <div class="row">
                            <div class="col-md-6">
                                <p class=" text-xs m-0">Order Date</p>
                                <h6 class="text-uppercase  mb-4">
                                    {{ Carbon::parse($consolidateOrder->order_date)->format('d/m/Y') }} </h6>
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
                                <p class=" text-xs m-0">Email</p>
                                <h6 class="   mb-4">
                                    {{ $consolidateOrder->email }}
                                </h6>
                            </div>
                            <div class="col-md-6">
                                <p class=" text-xs m-0">Address</p>
                                <h6 class="   mb-4">
                                    {{ $consolidateOrder->address }}
                                </h6>
                            </div>
                        </div>
                        <hr class="horizontal dark">
                        <p class="font-weight-normal h6 mb-3"> Shiping Information</p>
                        <div class="row">
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
                                    <h5 class="mb-0">Order item</h5>
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
                                                    <p class="text-xs  font-weight-bold mb-0">{{ $rows->material_name }}</p>
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
                                                    <span class="text-secondary text-xs  ">₹  {{ $rows->total_amount }}</span>
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
                                                <span class="text-secondary text-md  font-weight-bold ">{{ $totalQuantity }}</span>
                                            </td>
                                            <td class="align-middle ">
                                                <span class="text-secondary text-md  font-weight-bold "> </span>
                                            </td>
                                            <td class="align-middle ">
                                                <span class="text-secondary text-md  font-weight-bold ">₹  {{ $totalAmount }}</span>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <p class="text-md text-uppercase font-weight-bolder my-2">
                                <span class="text-sm text-capitalize font-weight-normal">Rupees : </span>
                                <cite>₹ {{ \App\Helpers\NumberToWordsHelper::convertToWords($totalAmount) }} only.</cite>
                            </p>                            

                        </div>
                        <hr class="horizontal dark">
                        <p class="font-weight-normal h6 mb-3">Order updation </p>
                        <form id="dispatchOrderForm" data-route="{{route('dispatchOrderSubmit')}}">
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <div class="input-group input-group-dynamic">
                                        <label class="form-label">Godown</label>
                                        <input class=" form-control" value="{{ $consolidateOrder->godown_name }}" disabled type="text" />
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                    <div class="input-group input-group-dynamic">
                                        <label class="form-label">Executed By</label>
                                        <input class="  form-control" value="{{ $consolidateOrder->executive_name }}" disabled type="text" />
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 mt-3">
                                    <div class="input-group input-group-dynamic">
                                        <label class="form-label">Executed Date</label>
                                        <input class="  form-control" disabled value="{{ $consolidateOrder->executed_date }}" type="text" />
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-12 col-sm-6">
                                    <div class="input-group input-group-dynamic">
                                        <label class="form-label text-primary "
                                            style="top: -.8rem; font-size: .7rem;">Courier Date</label>
                                        <input id="courierDate" class="form-control" disabled type="date" />
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                    <div class="input-group input-group-dynamic">
                                        <label class="form-label">Tracking ID</label>
                                        <input class=" form-control" name="tracking_id" type="text" />
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12 col-sm-6">
                                    <div class="input-group input-group-dynamic">
                                        <label class="form-label ">Method of Delivery</label>
                                        <input class="  form-control" name="method_of_delivery" type="text" />
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                    <div class="input-group input-group-dynamic">
                                        <label class="form-label">Remark</label>
                                        <input class=" form-control" name="remark" type="text" />
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="consolidateOrderId" value="{{$consolidateOrder->consolidate_order_id}}"/>
                            <div class="button-row d-flex mt-4">
                                <a href="dispatch_order" class="ms-auto mb-0"><button class=" px-6 btn bg-gradient-dark "
                                        type="submit" title="submit">Submit</button></a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/plugins/choices.min.js') }}"></script>

    <script>
        // Set the current date to the Courier Date input
        document.getElementById('courierDate').valueAsDate = new Date();
    </script>

    <script>
        if (document.getElementById('choices-status')) {
            var element = document.getElementById('choices-status');
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
