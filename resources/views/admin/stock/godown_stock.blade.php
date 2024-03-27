@extends('common.layout')
@section('page_content_body')
<div class="container-fluid py-1 mb-6">
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-header pb-0">
                    <div class="d-lg-flex">
                        <div>
                            <h5 class="mb-0">{{$godownName}} Stock </h5>
                        </div>
                        <div class="ms-auto my-auto mt-lg-0 mt-4">
                            <div class="ms-auto my-auto">

                                <a href="{{route('stock.addStock')}}" class="btn bg-gradient-primary btn-sm mb-0">+ Add  </a>
                                <a href="{{route('stock.selectedGodownSourceView',['godown_id'=>$godown_id])}}" class="btn bg-gradient-secondary btn-sm mb-0">Source View  </a>

                                <button class="btn btn-outline-primary btn-sm export mb-0 mt-sm-0 mt-1" data-type="csv" type="button" name="button">Download</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pb-0">
                    <div class="table-responsive">
                        <table class="table table-flush" id="stock-list">
                            <thead class="thead-light">
                                <tr>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">sl/no</th>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">product  </th> 
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">level  </th> 
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">class  </th> 
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">Material name</th> 
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">Stock quantity</th> 
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($distinctStocks as $rows)
                                <tr>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{ $loop->iteration }}</p>
                                    </td>
                                    <td>
                                        <h6 class="mb-0 text-md">{{$rows->product->product_name}}</h6>
                                    </td> 
                                    <td>
                                        <h6 class="mb-0 text-md">{{$rows->materialCategory->level}}</h6>
                                    </td> 
                                    <td>
                                        <h6 class="mb-0 text-md">{{$rows->class->class}}</h6>
                                    </td> 
                                    <td>
                                        <h6 class="mb-0 text-md">{{$rows->material->material_name}}</h6>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{$rows->total_stock_quantity}}</p>
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
<script src="{{ asset('js/plugins/datatables.js')}}"></script>
<script src="{{ asset('js/plugins/choices.min.js')}}"></script>
<script>
    if (document.getElementById('stock-list')) {
        const dataTableSearch = new simpleDatatables.DataTable("#stock-list", {
            searchable: true,
            fixedHeight: false,
            perPage: 7
        });

        document.querySelectorAll(".export").forEach(function(el) {
            el.addEventListener("click", function(e) {
                var type = el.dataset.type;

                var data = {
                    type: type,
                    filename: "stock list " + type,
                };

                if (type === "csv") {
                    // data.columnDelimiter = "|";
                }

                dataTableSearch.export(data);
            });
        });
    };
</script>
@endsection
