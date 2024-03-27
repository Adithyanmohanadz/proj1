@extends('common.layout')
@section('page_content_body')
<div class="container-fluid  mb-6 ">
    <div class="row">
        <div class="col-12">
            <div class="row pt-4">
                <div class="col-12 col-lg-11 m-auto ">
                    <div class="card">
                        <div class="card-body">
                            <form id="stockAddForm"  data-route="{{route('stock.store')}}" >
                                <div class="  border-radius-xl bg-white ">
                                    <h5 class="font-weight-bolder mb-2">Add Stock</h5>
                                    <h3 class="font-weight-bolder my-3">{{session('godownName')}}</h3>
                                    <div class=" ">
                                        <input type="hidden" id="godown_id" name="godown_id" value="{{$godown_id}}">
                                        <div class="row mt-3">
                                            <div class="col-12 col-sm-6">
                                                <select class="form-control " name="stock_product_id" id="stock_product_id">
                                                    <option value=""disabled selected>Product</option>
                                                    @foreach ($products as $row)
                                                    <option value="{{ $row->product_id }}">{{ $row->product_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                                <select class="form-control " name="stock_category_level_id" id="s_category_level_id">
                                                    <option value=""disabled selected>Level</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-12 col-sm-6">
                                                <select class="form-control " name="stock_class_id" id="stock_class_id">
                                                    <option value="" disabled selected>Class</option>
                                                    @foreach ($classes as $row)
                                                    <option value="{{ $row->class_id }}">{{ $row->class }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                                <select class="form-control " name="stock_material_id" id="stock_material_id">
                                                    <option value="" disabled selected>Material</option>
                                                   
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-sm-6 mt-3">
                                                <div class="input-group input-group-dynamic">
                                                    <label class="form-label">Stock quantity</label>
                                                    <input class="form-control" name="stock_quantity" type="number" />
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 mt-3">
                                                <div class="input-group input-group-dynamic">
                                                    <label class="form-label">Source   </label>
                                                    <input class="  form-control" name="source" type="text" />
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 mt-3">
                                                <div class="input-group input-group-dynamic">
                                                    <label class="form-label">Remark  </label>
                                                    <input class="  form-control" name="remark" type="text" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="button-row d-flex mt-4">
                                        <button class="ms-auto mb-0 px-6 btn bg-gradient-dark " type="submit" title="submit">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/plugins/choices.min.js')}}"></script>

<script>
        var godown_stock_url = "{{ route('stock.selectedGodown') }}";
        var fetchLevelurl = "{{ route('stock.fetch_level') }}";
        var fetchMaterialurl = "{{ route('stock.fetch_material') }}";


    if (document.getElementById('stock_product_id')) {
        var element = document.getElementById('stock_product_id');
        const example = new Choices(element, {
            searchEnabled: true,
            shouldSort: false,
        });
    };
    if (document.getElementById('stock_category_level_id')) {
        var element = document.getElementById('stock_category_level_id');
        const example = new Choices(element, {
            searchEnabled: true,
            shouldSort: false,
        });
    };
    if (document.getElementById('stock_class_id')) {
        var element = document.getElementById('stock_class_id');
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
</script>
@endsection
