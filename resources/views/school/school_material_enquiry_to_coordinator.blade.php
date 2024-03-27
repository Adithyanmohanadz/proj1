@extends('school.common.school_layout')
@section('page_content_body')
    <div class="container-fluid py-1 mb-6">
        <div class="row">
            <div class="col-12 ">
                <div class="card">

                    <div class="card-header pb-0">
                        <div class="d-lg-flex">
                            <div>
                                <h5 id="ccccc" class="mb-0">{{ $page_title }} </h5>
                            </div>

                            <div class="ms-auto my-auto mt-lg-0 mt-4">
                                <div class="ms-auto my-auto">
                                    <a href=" " class="btn bg-gradient-primary btn-sm mb-0" type="button"
                                        data-bs-toggle="modal" data-bs-target="#materialEnquiryModel">+&nbsp; Add </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-0">
                        <div class="table-responsive">
                            <table class="table table-flush" id="Level-list">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">sl/no</th>
                                        <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">Material
                                            Name </th>
                                        <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">Enquiry Date
                                        </th>

                                        <th class=" text-center text-uppercase text-secondary text-xs font-weight-bolder ">
                                            Material Availability</th>

                                    </tr>
                                </thead>
                                <tbody id="table_div">
                                    @foreach ($materialEnquiry as $row)
                                        <tr>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">{{ $loop->iteration }}</p>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">{{ $row->material_name }}</p>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">{{ $row->created_at }}</p>
                                            </td>

                                            <td class="align-middle text-center text-sm">
                                                @if ($row->material_availability == 0)
                                                    <span class="badge badge-sm badge-danger">Not available</span>
                                                @else
                                                    <span class="badge badge-sm badge-success">Available</span>
                                                @endif
                                            </td>


                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="materialEnquiryModel" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel2" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <form action="" id="schoolMaterialEnquiryForm"
                                        data-route="{{ route('schoolEnquiry.store') }}">
                                        @csrf
                                        <div class="modal-header">
                                            <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Send Enquiry
                                            </h5>

                                            <button type="button" class="btn-close text-dark" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="col-12 mt-4 ">
                                                <div class="input-group input-group-dynamic">
                                                    <label class="form-label text-primary "
                                                        style="top: -.8rem; font-size: .7rem;">Product</label>
                                                    <select class="form-control " name="sc_product_id" id="sc_product_id">
                                                        <option value="" selected disabled>Select Product</option>
                                                        @foreach ($products as $row)
                                                            <option value="{{ $row->product_id }}">{{ $row->product_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 mt-4 ">
                                                <div class="input-group input-group-dynamic">
                                                    <label class="form-label text-primary "
                                                        style="top: -.8rem; font-size: .7rem;">Level</label>
                                                    <select class="form-control " name="sc_material_category_id"
                                                        id="sc_material_category_id">
                                                        <option value="" selected disabled>Select Level</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 mt-4 ">
                                                <div class="input-group input-group-dynamic">
                                                    <label class="form-label text-primary "
                                                        style="top: -.8rem; font-size: .7rem;">Class</label>
                                                    <select class="form-control " name="sc_class_id" id="sc_class_id">
                                                        <option value="" selected disabled>Select class</option>
                                                        @foreach ($classes as $row)
                                                            <option value="{{ $row->class_id }}">{{ $row->class }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 mt-4 ">
                                                <div class="input-group input-group-dynamic">
                                                    <label class="form-label text-primary "
                                                        style="top: -.8rem; font-size: .7rem;">Material</label>
                                                    <select class="form-control " name="sc_material_id" id="sc_material_id">
                                                        <option value="" selected disabled>Select material</option>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn bg-gradient-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn bg-gradient-primary">Enquire</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Modal -->

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/plugins/datatables.js') }}"></script>
    <script src="{{ asset('js/plugins/choices.min.js') }}"></script>
    <script>
        var fetchLevelUrl = "{{ route('schoolEnquiry.fetch_level') }}";
        var fetchMaterialUrl = "{{ route('schoolEnquiry.fetch_material') }}";

        if (document.getElementById('Level-list')) {
            const dataTableSearch = new simpleDatatables.DataTable("#Level-list", {
                searchable: true,
                fixedHeight: false,
                perPage: 7
            });

            document.querySelectorAll(".export").forEach(function(el) {
                el.addEventListener("click", function(e) {
                    var type = el.dataset.type;

                    var data = {
                        type: type,
                        filename: "Level " + type,
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
        if (document.getElementById('choices-state')) {
            var element = document.getElementById('choices-state');
            const example = new Choices(element, {
                searchEnabled: true,
                shouldSort: false,
            });
        };
        if (document.getElementById('choices-state-2')) {
            var element = document.getElementById('choices-state-2');
            const example = new Choices(element, {
                searchEnabled: true,
                shouldSort: false,
            });
        };
    </script>
@endsection
