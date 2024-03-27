
@extends('coordinator.common.coordinator_layout')
@section('page_content_body')
<div class="container-fluid py-1 mb-6">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-lg-flex">
                        <div>
                            <h5 class="mb-0">Mock Exam List</h5>
                        </div>
                        <div class="ms-auto my-auto mt-lg-0 mt-4">
                            <div class="ms-auto my-auto"> 
                                <button class="btn btn-outline-primary btn-sm export mb-0 mt-sm-0 mt-1" data-type="csv" type="button" name="button">Download</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pb-0">
                    <div class="table-responsive">
                        <table class="table table-flush" id="exam-list">
                            <thead class="thead-light">
                                <tr>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">sl/no</th>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">product</th>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">level</th>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">class</th>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">year</th> 
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">Exam name</th> 
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">google form link</th>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">exam start date Time</th>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">exam end date Time</th>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder text-center">status</th> 
                                </tr> 
                            </thead>
                            <tbody>
                                @foreach ($mockExamList as $rows )
                                    
                                <tr>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{$loop->iteration}}</p>
                                    </td> 
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{$rows->product_name}}</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{$rows->level}}</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{$rows->class}}</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{$rows->year}}</p>
                                    </td> 
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{$rows->mock_exam_name}}</p>
                                    </td> 
                                    <td>
                                    <h6 class="mb-0 text-md">{{$rows->google_link}}</h6>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{$rows->exam_start_date_time}}</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{$rows->exam_end_date_time}}</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="badge badge-sm {{ $rows->status ? 'badge-success' : 'badge-danger' }} "> {{ $rows->status == 1 ? 'Active' : 'Inactive' }}</span>
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
<script>
    if (document.getElementById('exam-list')) {
        const dataTableSearch = new simpleDatatables.DataTable("#exam-list", {
            searchable: true,
            fixedHeight: false,
            perPage: 7
        });
        document.querySelectorAll(".export").forEach(function(el) {
            el.addEventListener("click", function(e) {
                var type = el.dataset.type;

                var data = {
                    type: type,
                    filename: "Exam List" + type,
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
