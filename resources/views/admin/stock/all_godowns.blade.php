@extends('common.layout')
@section('page_content_body')
    <div class="container-fluid py-1 mb-6 text-uppercase">
        <div class="card">
            <div class="d-lg-flex m-4">
                <div>
                    <h5 class="mb-0"> {{ $page_title }} </h5>
                </div>
            </div>
            <div class="row">
                @foreach ($godowns as $rows)
                    <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                        <div class="card card-plain text-center">
                            <div class="card-body">
                                <div class="icon icon-shape bg-gradient-dark shadow text-center border-radius-md mb-2">
                                    <i class="material-symbols-outlined opacity-10" aria-hidden="true">account_tree</i>
                                </div>
                                <p class="text-sm font-weight-normal  my-2">{{$rows->godown_name}}</p>
                                <a href="{{route('stock.selectedGodown',['godown_id'=>$rows->godown_id])}}" id="stock_godown_id"  ><button type="button" class="btn btn-primary btn-sm">Stock List
                                    </button></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
