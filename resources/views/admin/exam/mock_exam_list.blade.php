@extends('common.layout')
@section('page_content_body')  
<div class="container-fluid py-1 mb-6">
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-header pb-0">
                    <div class="d-lg-flex">
                        <div>
                            <h5 class="mb-0">{{$page_title}}</h5>
                        </div>
                        <div class="ms-auto my-auto mt-lg-0 mt-4">
                            <div class="ms-auto my-auto">

                                <a href="{{route('mockExam.index')}}" class="btn bg-gradient-primary btn-sm mb-0">+&nbsp; Add    </a>

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
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">exam name</th>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">google form link</th>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">exam start date Time</th>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">exam end date Time</th>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">product</th>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">level</th>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">class</th>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">batch</th> 
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder text-center">status</th>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">action</th> 

                                </tr> 
                            </thead>
                            <tbody>
                                @foreach ($mockExamList as $rows)
                                    
                                <tr>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{ $loop->iteration}}</p>
                                    </td> 
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{$rows->mock_exam_name}}</p>
                                    </td>
                                    <td>
                                    <a class="mb-0 text-md btn-link" href="{{$rows->google_link}}" target="_blank">{{$rows->google_link}}</a>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{$rows->exam_start_date_time}}</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{$rows->exam_end_date_time}}</p>
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
                                     <td class="align-middle text-center text-sm">
                                        <span class="badge badge-sm {{ $rows->status ? 'badge-success' : 'badge-danger' }} "> {{ $rows->status == 1 ? 'Active' : 'Inactive' }}</span>
                                     </td>
                                    <td class="text-sm">
                                        <a href="mock_test_exam_creation" class="ms-3" data-bs-toggle="tooltip" data-bs-original-title="Edit Exam">
                                            <i class="material-icons text-success position-relative text-lg">drive_file_rename_outline</i>
                                        </a> 
                                        <a href=" " class="ms-3" data-bs-toggle="tooltip" data-bs-original-title="Delete Exam">
                                            <i class="material-icons text-danger position-relative text-lg">delete</i>
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
