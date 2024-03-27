@extends('coordinator.common.coordinator_layout')
@section('page_content_body')
    <style>
        .table>:not(:last-child)>:last-child>* {
            border-bottom-color: #000000;
        }
        .card {
            box-shadow: 0 4px 6px 3px rgba(0, 0, 0, .1), 0 2px 4px 3px rgba(0, 9, 0, .06);
        }
    </style>
    <div class="container-fluid py-1">
        <div class="row">
            <div class="col-12 m-auto">
                <div class="card  ">
                    <div class="card-body">
                        <h5 class="font-weight-bolder mb-3"> Stock </h5>
                        <div class="row">
                            {!! $stockData !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
