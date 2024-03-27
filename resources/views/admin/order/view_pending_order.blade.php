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
                        <h5 class="font-weight-bolder mb-3"> {{ $page_title }}</h5>
                        <h2 class="font-weight-bolder my-2"> Order id : #{{ $consolidateOrder->order_id }}</h2>
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
                                <form id="pendingOrderForm" data-route="{{route('pendingOrderSubmit')}}">
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
                                                    class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2 text-center">
                                                    Amount</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-4 text-center">
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
                                                        <p class="text-xs  font-weight-bold mb-0">{{ $loop->iteration }}
                                                        </p>
                                                    </td>
                                                    <td class="align-middle ">
                                                        <p class="text-xs  font-weight-bold mb-0">
                                                            {{ $rows->material_name }}</p>
                                                    </td>
                                                    <td class="align-middle ">
                                                        <p class="text-xs  font-weight-bold mb-0">{{ $rows->product_name }}
                                                        </p>
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
                                                    <td class="align-middle w-15 ">
                                                        <div class="input-group input-group-outline ">
                                                            <input class=" form-control" type="text"
                                                                value="{{ $rows->amount }}" name="material_amount[]" placeholder="Enter Amount" />
                                                        </div>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span class="text-secondary text-xs p-0 ">
                                                            {{ $rows->total_amount }}</span>
                                                    </td>
                                                    <input type="hidden" name="material_quantity[]" value="{{$rows->quantity}}"/>
                                                    <input type="hidden" name="coordinator_order_id[]" value="{{$rows->coordinator_order_id}}"/>
                                                    

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
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-md  font-weight-bold ">
                                                        {{ $totalAmount }}</span>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                            </div>

                        </div>
                        <hr class="horizontal dark">
                        <p class="font-weight-normal h6 mb-3">Order updation </p>
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <select class="form-control" name="godown_id" id="godown_id">
                                    <option value="" disabled selected>Godown</option>
                                    @foreach ($godowns as $rows)
                                        <option value="{{ $rows->godown_id }}">{{ $rows->godown_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                <div class="input-group input-group-dynamic">
                                    <label class="form-label">Executed By</label>
                                    <input class="  form-control" name="executive_name" type="text" />
                                </div>
                            </div>
                            <input type="hidden" name="consolidateOrderId" value="{{$consolidateOrder->consolidate_order_id}}"/>

                        </div>
                        <div class="button-row d-flex mt-4">
                            <button class=" px-6 btn bg-gradient-dark ms-auto mb-0" type="submit"
                                title="submit">Submit</button>
                        </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/plugins/choices.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
        if (document.getElementById('choices-status')) {
            var element = document.getElementById('choices-status');
            const example = new Choices(element, {
                searchEnabled: true,
                shouldSort: false,
            });
        };
        // if (document.getElementById('godown_id')) {
        //     var element = document.getElementById('godown_id');
        //     const example = new Choices(element, {
        //         searchEnabled: true,
        //         shouldSort: false,
        //     });
        // };
    </script>
    <script>
        $(document).ready(function() {
            // Function to calculate total amount and quantity
            function calculateTotal() {
                var totalAmount = 0;
                var totalQty = 0;

                // Loop through each table row (excluding the header and footer)
                $("tbody tr").each(function() {
                    // Get the quantity and amount values
                    var qty = parseInt($(this).find("td:eq(5) span").text());
                    var amount = parseFloat($(this).find("td:eq(6) input").val()) || 0;

                    // Calculate the row amount (qty * amount) and update the total
                    var rowAmount = qty * amount;
                    totalAmount += rowAmount;

                    // Update the total quantity
                    totalQty += qty;

                    // Update the total amount column in the current row
                    $(this).find("td:eq(7) span").text(rowAmount.toFixed(2));
                });

                // Update the total amount and total quantity in the footer
                $("tfoot tr td:eq(5) span").text(totalQty);
                $("tfoot tr td:eq(7) span").text(totalAmount.toFixed(2));
            }

            // Attach an event listener to the input fields to recalculate on change
            $("tbody input").on("input", calculateTotal);

            // Initial calculation when the page loads
            calculateTotal();
        });
    </script>
@endsection
