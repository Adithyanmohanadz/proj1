@extends('coordinator.common.coordinator_layout')
@section('page_content_body')
<div class="container-fluid py-1 mb-6">
    <div class="row">
        <div class="col-12 ">
            <div class="card">

                <div class="card-header pb-0">
                    <div class="d-lg-flex">
                        <div>
                            <h5 class="mb-0">{{ $page_title }}</h5>
                        </div>

                        <div class="ms-auto my-auto mt-lg-0 mt-4">
                            <div class="ms-auto my-auto">
                                <a href=" " class="btn bg-gradient-primary btn-sm mb-0" type="button"
                                    data-bs-toggle="modal" data-bs-target="#shippingAddressAddModel">+&nbsp; Add </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pb-0">
                    <div class="table-responsive"  >
                        <table class="table table-flush" id="Level-list">
                            <thead class="thead-light">
                                <tr>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">sl/no</th>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">name</th>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">address </th>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">landmark </th>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">country </th>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">state </th>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">city </th>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">pincode </th>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">status </th>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">Action</th>

                                </tr>
                            </thead>
                            <tbody id="table_div">
                                @foreach ($shippingAddress as $row)
                                    <tr>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0">{{ $loop->iteration }}</p>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0">{{ $row->name }}</p>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0">{{ $row->address }}</p>
                                        </td>           
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0">{{ $row->landmark }}</p>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0">{{ $row->country }}</p>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0">{{ $row->state }}</p>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0">{{ $row->city }}</p>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0">{{ $row->pincode }}</p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            @if ($row->status == 1)
                                                <span class="badge badge-sm badge-success">Active</span>
                                            @else
                                                <span class="badge badge-sm badge-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td class="text-sm">
                                            <a class="ms-3" data-bs-toggle="tooltip" data-bs-original-title="Edit Class Name">
                                                <i class="material-icons text-success position-relative text-lg" type="button"
                                                    data-bs-toggle="modal" data-bs-target="#exampleModal">drive_file_rename_outline</i>
                                            </a>
                                            <a href="javascript:;" class="ms-3" data-bs-toggle="tooltip"
                                                data-bs-original-title="Activate Class  ">
                                                <i class="material-icons text-info position-relative text-lg">power_settings_new</i>
                                            </a>
                                            <a href="javascript:;" class="ms-3" data-bs-toggle="tooltip"
                                                data-bs-original-title="Deactivate Class">
                                                <i class="material-icons text-danger position-relative text-lg">delete</i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            
                        </table>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Edit Class </h5>
                                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="mt-4 input-group input-group-dynamic ">
                                        <label class="form-label">Class Name</label>
                                        <input class="form-control" type="text" />
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn bg-gradient-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn bg-gradient-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->

                    <!-- Modal -->
                    <div class="modal fade" id="shippingAddressAddModel" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel2" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <form action="" id="shippingAddressForm" data-route="{{ route('shippingAddress.store') }}">
                                    @csrf
                                    <div class="modal-header">
                                        <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Add Shipping Address
                                        </h5>
                                        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mt-4 input-group input-group-dynamic ">
                                            <label class="form-label">Name</label>
                                            <input class="form-control" name="name" type="text" />
                                        </div>
                                        <div class="mt-4 input-group input-group-dynamic ">
                                            <label class="form-label">Address</label>
                                            <input class="form-control" name="address" type="text" />
                                        </div>
                                        <div class="mt-4 input-group input-group-dynamic ">
                                            <label class="form-label">Landmark</label>
                                            <input class="form-control" name="landmark" type="text" />
                                        </div>
                                        <div class="mt-4 input-group input-group-dynamic ">
                                            <select class="form-control " name="country_id" id="shipping_country_id">
                                                <option value="" selected disabled >Select Country</option>
                                                @foreach ($countries as $row)
                                                <option value="{{ $row->country_id }}">{{ $row->country }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mt-4 input-group input-group-dynamic ">
                                            <select class="form-control " name="state_id" id="shipping_state_id">
                                                <option value="" selected disabled >Select State</option>
                                               
                                            </select>
                                        </div>
                                        <div class="mt-4 input-group input-group-dynamic ">
                                            <select class="form-control " name="city_id" id="shipping_city_id">
                                                <option value="" selected disabled >Select City</option>
                                               
                                            </select>
                                        </div>
                                        <div class="mt-4 input-group input-group-dynamic ">
                                            <select class="form-control " name="pincode_id" id="shipping_pincode_id">
                                                <option value="" selected disabled >Select Pincode</option>
                                                @foreach ($pincodes as $row)
                                                <option value="{{ $row->pincode_id }}">{{ $row->pincode }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn bg-gradient-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn bg-gradient-primary">Add</button>
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
            var fetchStateUrl = "{{route('shippingAddress.fetch_state')}}"
            var fetchCityUrl = "{{route('shippingAddress.fetch_city')}}"


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
