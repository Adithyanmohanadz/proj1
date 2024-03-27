@extends('common.layout')
@section('page_content_body')
    <div class="container-fluid py-1 mb-6">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-lg-flex">
                            <div>
                                <h5 class="mb-0">Notification </h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-0">
                        <div class="table-responsive">
                            <table class="table table-flush" id="student-list">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">sl/no</th>
                                        <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">News &
                                            Notification</th>
                                        <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($notifications as $rows)
                                        <tr>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $loop->iteration }}</p>
                                            </td>
                                            <td>
                                                <h6 class="mb-0 text-md">{{ $rows->title }}</h6>
                                            </td>
                                            <td class="text-sm">
                                                {{-- <a href=" " class="ms-3" data-bs-toggle="tooltip" data-bs-original-title="preview">
                                            <i class="material-icons text-success position-relative text-lg">visibility</i>
                                        </a> --}}
                                                <a class="ms-3" href="{{ asset($rows->file_path) }}" download> <i
                                                        class="material-icons text-info position-relative text-lg">download</i>
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
    <script>
        if (document.getElementById('student-list')) {
            const dataTableSearch = new simpleDatatables.DataTable("#student-list", {
                searchable: true,
                fixedHeight: false,
                perPage: 7
            });
            document.querySelectorAll(".export").forEach(function(el) {
                el.addEventListener("click", function(e) {
                    var type = el.dataset.type;

                    var data = {
                        type: type,
                        filename: "student list " + type,
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
