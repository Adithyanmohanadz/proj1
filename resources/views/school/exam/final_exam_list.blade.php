@extends('school.common.school_layout')
@section('page_content_body')
    <div class="container-fluid py-1">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header pb-0">
                        <div class="d-lg-flex">
                            <div>
                                <h5 class="mb-0">Final Exam List</h5>
                            </div>
                            <div class="ms-auto my-auto mt-lg-0 mt-4">
                                <div class="ms-auto my-auto">

                                    <button class="btn btn-outline-primary btn-sm export mb-0 mt-sm-0 mt-1" data-type="csv"
                                        type="button" name="button">Download</button>
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
                                        <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">google form
                                            link</th>
                                        <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">exam start
                                            date Time</th>
                                        <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">exam end
                                            date Time</th>
                                        <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">product</th>
                                        <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">level</th>
                                        <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">class</th>
                                        <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">batch</th>
                                        <th class="  text-uppercase text-secondary text-xs font-weight-bolder text-center">
                                            status</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($finalExam as $rows)
                                        <tr>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $loop->iteration }}</p>
                                            </td>
                                            <td>
                                                <a class="mb-0 text-md btn-link" href="{{ $rows->google_link }}"
                                                    target="_blank">{{ $rows->google_link }}</a>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">{{ $rows->exam_start_date_time }}
                                                </p>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">{{ $rows->exam_end_date_time }}</p>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">{{ $rows->product->product_name }}
                                                </p>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">{{ $rows->level->level }}</p>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">{{ $rows->classModel->class }}</p>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">{{ $rows->year->year }}</p>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                @if ($rows->status == 1)
                                                    <span class="badge badge-sm badge-success">active</span>
                                                @else
                                                    <span class="badge badge-sm badge-danger">inactive</span>
                                                @endif
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
    <script src="{{ asset('js/plugins/datatables.js') }}"></script>
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
