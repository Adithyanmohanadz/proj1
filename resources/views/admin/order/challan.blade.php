@php
    use Carbon\Carbon;
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/spellbee/logo.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('img/spellbee/logo.png') }}">
    <title>
        Admin {{ $page_title }}
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('css/style_pro.css') }}" rel="stylesheet" />
    <link id="pagestyle" href="{{ asset('css/glstyle.css') }}" rel="stylesheet" />
</head>

<style>
    @media print {
        .print-div {
            page-break-after: always;
        }

        .card {
            box-shadow: none;
        }

        .pw-50 {
            width: 50% !important
        }
    }
</style>
@if (session('consolidate_order_id'))
    @php
        $consolidateModel = new \App\Models\coordinator\ConsolidateOrder();
        $consolidateOrder = $consolidateModel->fetchConsolidateOrderById(session('consolidate_order_id'));

        $orderModel = new \App\Models\coordinator\CoordinatorOrder();
        $orders = $orderModel->orderByOrderId($consolidateOrder->order_id);
    @endphp

    <body class="  bg-gray-200   ">
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            <div class="container-fluid py-4">
                <div class="row" id="print">
                    <div class="col-lg-8 mx-auto print-div">
                        <div class="card mb-4">
                            <div class="card-header p-3 pb-0">
                                <div class="">
                                    <h4>ENGLISH WIZARD FOUNDATION</h4>
                                    <p class="text-sm mb-0">
                                        8, Ashwini Dutta Road, 1st Floor Kolkata - 700 029
                                        Phone: 033 24660434 / 9830345745
                                        E-Mail: wizspellbee@gmail.com
                                        www.wizspellbee.com
                                    </p>
                                    <h6 class="mt-4 text-center">DELIVERY CHALLAN</h6>
                                </div>
                            </div>
                            <div class="card-body p-3 pt-0">
                                <hr class="horizontal dark mt-0 mb-4">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 pw-50 col-12">
                                        <div class="d-flex">
                                            <div>
                                                <h6 class="text-sm mb-0 mt-2">TO</h6>
                                                <h6 class="text-lg mb-0 mt-2" id="coordinatorName">
                                                    {{ $consolidateOrder->coordinator_name }} </h6>
                                                <p class="text-sm mb-2" id="address"><span
                                                        class="text-md font-weight-bolder">Address:</span>
                                                    {{ $consolidateOrder->address }}</p>
                                                <p class="text-sm mb-2" id="email"><span
                                                        class="text-md font-weight-bolder">Email:</span>
                                                    {{ $consolidateOrder->email }}</p>
                                                <p class="text-sm mb-2" id="mobile"><span
                                                        class="text-md font-weight-bolder">Mobile: </span>
                                                    {{ $consolidateOrder->mobile }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 pw-50 col-12 my-auto text-end">
                                        <h6 class="text-lg mb-0 mt-2"><span class="text-sm">DC No:</span> 2029</h6>
                                        <h6 class="text-lg mb-0 mt-2"><span class="text-sm">Date
                                                :</span>{{ Carbon::parse($consolidateOrder->order_date)->format('d/m/Y') }}
                                        </h6>
                                        <p class="text-lg mt-2 mb-0 text-uppercase  font-weight-bolder">
                                            {{ $consolidateOrder->godown_name }} </p>
                                    </div>
                                </div>
                                <hr class="horizontal dark my-4">
                                <div class="row" id="tableRowId">
                                    <div class="col-12 m-auto">
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
                                                                <p class="text-xs  font-weight-bold mb-0">
                                                                    {{ $loop->iteration }}</p>
                                                            </td>
                                                            <td class="align-middle ">
                                                                <p class="text-xs  font-weight-bold mb-0">
                                                                    {{ $rows->material_name }}</p>
                                                            </td>
                                                            <td class="align-middle ">
                                                                <p class="text-xs  font-weight-bold mb-0">
                                                                    {{ $rows->product_name }}</p>
                                                            </td>
                                                            <td class="align-middle ">
                                                                <p class="text-xs  font-weight-bold mb-0">
                                                                    {{ $rows->level }}</p>
                                                            </td>
                                                            <td class="align-middle ">
                                                                <p class="text-xs  font-weight-bold mb-0">
                                                                    {{ $rows->class }}</p>
                                                            </td>
                                                            <td class="align-middle ">
                                                                <span
                                                                    class="text-secondary text-xs  ">{{ $rows->quantity }}</span>
                                                            </td>
                                                            <td class="align-middle ">
                                                                <span class="text-secondary text-xs  ">₹
                                                                    {{ $rows->amount }}</span>
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
                                                            <span class="text-secondary text-md  font-weight-bold ">
                                                            </span>
                                                        </td>
                                                        <td class="align-middle ">
                                                            <span class="text-secondary text-md  font-weight-bold ">₹
                                                                {{ $totalAmount }}</span>
                                                        </td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                        <p class="text-md text-uppercase font-weight-bolder my-2"><span
                                                class="text-sm text-capitalize font-weight-normal">Rupees :
                                            </span><cite>{{ \App\Helpers\NumberToWordsHelper::convertToWords($totalAmount) }}.</cite> </p>
                                    </div>
                                </div>
                                <hr class="horizontal dark my-4">
                                <h6 class="text-end mb-5">Authorized Signatory</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="button-row d-flex">
                    <button class=" px-6 btn bg-gradient-dark ms-auto mb-0" onclick="javascript:printDiv('print')"
                        type="button" title="print">Print</button></a>
                </div>
            </div>

        </main>

        <!--   Core JS Files   -->
        <script src="{{ asset('js/core/popper.min.js') }}"></script>
        <script src="{{ asset('js/core/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/plugins/perfect-scrollbar.min.js') }}"></script>
        <script src="{{ asset('js/plugins/smooth-scrollbar.min.js') }}"></script>
        <script src="{{ asset('js/coordinator/coordinator_order.js') }}"></script>


        <script>
            function printDiv(divName) {
                var printContents = document.getElementById(divName).innerHTML;
                var originalContents = document.body.innerHTML;

                document.body.innerHTML = printContents;

                window.print();

                document.body.innerHTML = originalContents;
            }
        </script>

        <!-- Github buttons -->
        <script async defer src="https://buttons.github.io/buttons.js"></script>
        <script src="{{ asset('js/prog.js') }}"></script>
    </body>
@else
    <h1>something went wrong</h1>
@endif

</html>
