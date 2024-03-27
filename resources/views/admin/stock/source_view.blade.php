@extends('common.layout')
@section('page_content_body')
    <div class="container-fluid  mb-6 ">
        <div class="row">
            <div class="col-12">
                <div class="row pt-1">
                    <div class="col-12 m-auto ">
                        <div class="card">
                            <div class="card-header pb-0">
                                <div class="d-lg-flex">
                                    <div>
                                        <h5 class="mb-0">{{ $godownName }} Stock Source View</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive mt-4" id="">
                                    <table class="table table-flush" id="added-stock">
                                        <thead class="thead-light">
                                            <tr>
                                                <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">
                                                    sl/no</th>
                                                <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">
                                                    product </th>
                                                <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">
                                                    level </th>
                                                <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">
                                                    class </th>
                                                <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">
                                                    Material name</th>
                                                <th class="  text-uppercase text-secondary text-xs font-weight-bolder w-15">
                                                    Added quantity</th>
                                                <th class="  text-uppercase text-secondary text-xs font-weight-bolder w-15">
                                                    Source</th>
                                                <th class="  text-uppercase text-secondary text-xs font-weight-bolder w-15">
                                                    Remark </th>
                                                <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">
                                                    Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($sourceView as $rows)
                                            <tr>
                                                <td>
                                                    <p class="text-xs font-weight-bold ps-2">{{$loop->iteration}}</p>
                                                </td>
                                                <td>
                                                    <h6 class="ps-2 text-md">{{ optional($rows->product)->product_name }} </h6>
                                                </td>
                                                
                                                <td>
                                                    <h6 class="ps-2 text-md">{{$rows->materialCategory->level}} </h6>
                                                </td>
                                                <td>
                                                    <h6 class="ps-2 text-md">{{$rows->class->class}}  </h6>
                                                </td>
                                                <td>
                                                    <h6 class="ps-2 text-md">{{$rows->material->material_name}}  </h6>
                                                </td>
                              
                                                <td>
                                                    <p class="text-xs font-weight-bold ps-2">{{$rows->stock_quantity}}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold ps-2">{{$rows->source}}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold ps-2">{{$rows->remark}}</p>
                                                </td>
                                                <td class="text-sm">
                                                    <a href="stock_edit" class="" data-bs-toggle="tooltip"
                                                        data-bs-original-title="Stock edit">
                                                        <i
                                                            class="material-icons text-success position-relative text-lg">drive_file_rename_outline</i>
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
        </div>
    </div>
@endsection
