@extends('coordinator.common.coordinator_layout')
@section('page_content_body')
    <div class="container-fluid py-1">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header pb-0">
                        <div class="d-lg-flex ">
                            <div>
                                <h5 class="mb-0">{{ $page_title }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-lg-flex mt-2">
                            <div class=" my-auto mt-lg-0 mt-4 col-12 col-md-6 col-lg-3">
                                <select class="form-control" name="order_product_id" id="order_product_id">
                                    <option value="">Select Product</option>
                                    @foreach ($products as $row)
                                        <option value="{{ $row->product_id }}">{{ $row->product_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="ms-lg-3  my-auto mt-lg-0 mt-4 col-12 col-md-6 col-lg-3">
                                <select class="form-control " id="order_material_category_id">
                                    <option value="" selected disabled>Select Level</option>
                                </select>
                            </div>
                        </div>
                        <form id="orderTakingForm" data-route="{{ route('order-taking.store') }}" action="">
                            <div class="table-responsive mt-5" id="materialTable">
                                <table class="table table-flush" id="add-stock">
                                    <thead class="thead-light">
                                        <tr>
                                            <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">sl/no
                                            </th>
                                            <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">Material
                                            </th>
                                            <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">product
                                            </th>
                                            <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">level
                                            </th>
                                            <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">class
                                            </th>
                                            <th class="  text-uppercase text-secondary text-xs font-weight-bolder w-15">Add
                                                QTY
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody id="materialData">

                                    </tbody>
                                </table>
                                <div class="button-row d-flex">
                                    <button class="ms-auto mb-4 me-4 px-6 btn bg-gradient-dark btn-sm px-5" type="submit"
                                        title="submit">Add</button>
                                </div>
                            </div>
                        </form>
                        <div id="noMaterialsMessage" class="text-center bold" style="display: none;">No materials available
                        </div>
                    </div>
                    <hr class="horizontal dark">
                    <div id="addedMaterialsDiv">
                        <div class="card-header pb-0">
                            <div class="d-lg-flex ">
                                <div>
                                    <h5 class="mb-0">Added Materials</h5>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive" id="">
                                <form action="" id="orderConfirmationForm" data-route="{{route('orderConfirmation')}}" >
                                    <table class="table table-flush" id="added-stock">
                                        <thead class="thead-light">
                                            <tr>
                                                <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">
                                                    sl/no
                                                </th>
                                                <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">
                                                    Material
                                                </th>
                                                <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">
                                                    product
                                                </th>
                                                <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">
                                                    level
                                                </th>
                                                <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">
                                                    class
                                                </th>
                                                <th class="  text-uppercase text-secondary text-xs font-weight-bolder w-15">
                                                    Add
                                                    QTY
                                                </th>
                                                <th
                                                    class="  text-uppercase text-secondary text-xs font-weight-bolder w-10 text-center">
                                                    Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="orderMaterialsData">
                                        </tbody>
                                    </table>
                                    <div class="button-row d-flex">
                                        <a href="coordinator_dashboard" class="ms-auto"><button
                                                class="ms-auto mb-4 px-6 mx-2 btn bg-gradient-secondary" type="button"
                                                title="submit">Cancel</button></a>
                                        <button class=" mb-4 me-4 px-6 mx-2 btn bg-gradient-primary" type="submit"
                                            title="submit">Next</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        {{-- end div --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/plugins/choices.min.js') }}"></script>
    <script>
            var orderConfirmationViewPage = "{{ route('orderConfirmation.view') }}";
            var fetchLevelUrl = "{{ route('order-taking.fetch_level') }}";
            var fetchAllMaterialUrl = "{{ route('order-taking.fetch_all_materials') }}";
            var deleteOrderUrl = "{{ route('order-taking.orderDeleteFromTable') }}";


        if (document.getElementById('order_product_id')) {
            var element = document.getElementById('order_product_id');
            const example = new Choices(element, {
                searchEnabled: false
            });
        };
        if (document.getElementById('choices-level')) {
            var element = document.getElementById('choices-level');
            const example = new Choices(element, {
                searchEnabled: false
            });
        };
        if (document.getElementById('choices-class')) {
            var element = document.getElementById('choices-class');
            const example = new Choices(element, {
                searchEnabled: false
            });
        };
    </script>
@endsection
