@extends('student.common.student_layout')
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
                                        <th class=" text-center text-uppercase text-secondary text-xs font-weight-bolder ">
                                            Purchase</th>

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
                                            <td class="text-sm text-center"
                                                @if ($row->material_availability != 1) style="pointer-events: none;" @endif>
                                                @if ($row->material_availability == 1)
                                                    {{-- <a href="#" value="" id=""
                                                        class="mb-0 btn btn-sm btn-primary" data-bs-toggle="tooltip"
                                                        data-bs-original-title="">
                                                        Purchase
                                                    </a> --}}
                                                    <form id="materialPurchaseForm" action="" data-route="{{ route('materialEnquiry.materialPurchase') }}">
                                                        <input type="hidden" name="product_id"
                                                            value="{{ $studentDetails->product_id }}">
                                                        <input type="hidden" name="level_id"
                                                            value="{{ $studentDetails->material_category_id }}">
                                                        <input type="hidden" name="class_id"
                                                            value="{{ $studentDetails->class_id }}">
                                                        <input type="hidden" name="school_id"
                                                            value="{{ $studentDetails->school_id }}">
                                                        <input type="hidden" name="material_id"
                                                            value="{{ $materialData->material_id }}">
                                                        <button class="mb-0 btn btn-sm btn-primary"
                                                            type="submit">Purchase</button>
                                                    </form>
                                                @else
                                                    <i
                                                        class="material-icons text-danger btn-light btn btn-sm mb-0 position-relative text-lg ">close</i>
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
                                    <form action="" id="materialEnquiryForm"
                                        data-route="{{ route('materialEnquiry.store') }}">
                                        @csrf
                                        <div class="modal-header">
                                            <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Add Class
                                            </h5>
                                            <button type="button" class="btn-close text-dark" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mt-4 input-group input-group-dynamic ">
                                                <label class="form-label">Product Name</label>
                                                <input disabled class="form-control" value="{{ $productName }}"
                                                    name="" type="text" />
                                            </div>
                                            <div class="mt-4 input-group input-group-dynamic ">
                                                <label class="form-label">Level Name</label>
                                                <input disabled class="form-control" value="{{ $levelName }}"
                                                    name="" type="text" />
                                            </div>
                                            <div class="mt-4 input-group input-group-dynamic ">
                                                <label class="form-label">Class Name</label>
                                                <input disabled class="form-control" value="{{ $className }}"
                                                    name="" type="text" />
                                            </div>
                                            <div class="mt-4 input-group input-group-dynamic ">
                                                <label class="form-label">Material Name</label>
                                                <input disabled class="form-control"
                                                    value="{{ $materialData->material_name }}" name="class_name"
                                                    type="text" />
                                            </div>
                                        </div>
                                        <input type="hidden" name="product_id" value="{{ $studentDetails->product_id }}">
                                        <input type="hidden" name="level_id"
                                            value="{{ $studentDetails->material_category_id }}">
                                        <input type="hidden" name="class_id" value="{{ $studentDetails->class_id }}">
                                        <input type="hidden" name="school_id" value="{{ $studentDetails->school_id }}">
                                        <input type="hidden" name="material_id"
                                            value="{{ $materialData->material_id }}">

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
