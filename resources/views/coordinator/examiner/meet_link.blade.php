
@extends('coordinator.common.coordinator_layout')
@section('page_content_body')
<div class="container-fluid py-1 mb-6">
    <div class="row">
        <div class="col-12 ">
            <div class="card mb-3">
                <div class="card-body">
                    <form id="meetLinkForm" data-route="{{route('examinerMeetLinkStore')}}">
                        <div class="border-radius-xl bg-white">
                            <h5 class="font-weight-bolder mb-2">Add Examiner Meet link</h5>
                            <div class=" ">
                                <div class="row mt-4">
                                    <div class="col-12 col-sm-6">
                                        <div class="input-group input-group-dynamic">
                                            <label class="form-label text-primary " style="top: -.8rem; font-size: .7rem;"> Examiner</label>
                                            <select class="form-control " name="examiner_id" id="choices-examiner">
                                                <option value="" selected disabled>Select Examiner </option>
                                                @foreach ($examinerList as $name => $id )
                                                  <option value="{{$id}}">{{$name}}</option>
                                                 @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="input-group input-group-dynamic">
                                            <label class="form-label"> Link</label>
                                            <input class="  form-control" name="meet_link" type="text" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="  mt-3">
                            <div class="button-row d-flex">
                            <button class="ms-auto mb-0 px-6 btn bg-gradient-dark" type="sumit" title="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-lg-flex">
                        <div>
                            <h5 class="mb-0">Examiner Meet link</h5>
                        </div>
                        <div class="ms-auto my-auto mt-lg-0 mt-4">
                            <div class="ms-auto my-auto">
                                <button class="btn btn-outline-primary btn-sm export mb-0 mt-sm-0 mt-1" data-type="csv" type="button" name="button">download</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pb-0">
                    <div class="table-responsive">
                        <table class="table table-flush" id="meet-link">
                            <thead class="thead-light">
                                <tr>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">sl/no</th>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">Examiner</th>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">Link</th>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">Action</th>
                                </tr>
                            </thead>
                            <tbody id="table_div">
                                @foreach ($meetLinks as $rows)
                                <tr>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{$loop->iteration}}</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{$rows->examiner->examiner_name}}</p>
                                    </td>
                                    <td>
                                        <a class="mb-0 text-md btn-link" href="{{$rows->meet_link}}" target="_blank">{{$rows->meet_link}}</a>
                                    </td>
                                    <td class="text-sm">
                                        <a href="javascript:;" class="ms-3" data-bs-toggle="tooltip" data-bs-original-title="Delete ">
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
<script src="{{ asset('js/plugins/datatables.js') }}"></script>
<script src="{{ asset('js/plugins/choices.min.js') }}"></script>
<script>
    if (document.getElementById('meet-link')) {
        const dataTableSearch = new simpleDatatables.DataTable("#meet-link", {
            searchable: true,
            fixedHeight: false,
            perPage: 7
        });
        document.querySelectorAll(".export").forEach(function(el) {
            el.addEventListener("click", function(e) {
                var type = el.dataset.type;

                var data = {
                    type: type,
                    filename: "Examiner Meet link " + type,
                };

                if (type === "csv") {
                    // data.columnDelimiter = "|";
                }

                dataTableSearch.export(data);
            });
        });
    };
</script>
<script> 
    if (document.getElementById('choices-examiner')) {
        var element = document.getElementById('choices-examiner');
        const example = new Choices(element, {
            searchEnabled: true,
            shouldSort: false,
        });
    };
</script>
@endsection
