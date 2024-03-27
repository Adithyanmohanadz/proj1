@extends('common.layout')
@section('page_content_body')
<div class="container-fluid py-1 mb-6">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-lg-flex">
                        <div>
                            <h5 class="mb-0"> Coordinators </h5>
                        </div>
                        <div class="ms-auto my-auto mt-lg-0 mt-4">
                            <div class="ms-auto my-auto"> 

                                <a href="{{route('coordinator.nationalCoordinator')}}" class="btn bg-gradient-primary btn-sm mb-0">National Coordinater</a>
                                <a href="{{route('coordinator.index')}}" class="btn bg-gradient-primary btn-sm mb-0">+ Add</a>

                                <button class="btn btn-outline-primary btn-sm export mb-0 mt-sm-0 mt-1" data-type="csv" type="button" name="button">Download</button>
                            </div>
                        </div>
                    </div>
                    <form action="">
                        <div class="d-lg-flex mt-4">
                            <div class=" my-auto mt-lg-0 mt-4 col-12 col-md-6 col-lg-3">
                                <div class="mt-1 input-group input-group-dynamic">
                                    <label class="form-label text-primary " style="top: -.8rem; font-size: .7rem;">Country</label>
                                    <select class="form-control " name=" " id="choices-country">
                                        <option value="" selected>Select Country</option>
                                        <option value="12345678900">12345678900</option>
                                        <option value="2">2</option>
                                    </select>
                                </div>
                            </div>
                            <div class="ms-lg-3 my-auto mt-lg-0 mt-4 col-12 col-md-6 col-lg-3">
                                <div class="mt-1 input-group input-group-dynamic">
                                    <label class="form-label text-primary " style="top: -.8rem; font-size: .7rem;">State</label>
                                    <select class="form-control " name=" " id="choices-state">
                                        <option value="" selected>Select State</option>
                                        <option value="12345678900">12345678900</option>
                                        <option value="2">2</option>
                                    </select>
                                </div>
                            </div>
                            <div class="ms-lg-3  my-auto mt-lg-0 mt-4 col-12 col-md-6 col-lg-3">
                                <div class="mt-1 input-group input-group-dynamic">
                                    <label class="form-label text-primary " style="top: -.8rem; font-size: .7rem;">City</label>
                                    <select class="form-control " name=" " id="choices-city">
                                        <option value="" selected>Select City</option>
                                        <option value="12345678900">12345678900</option>
                                        <option value="2">2</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="button-row d-flex mt-4">
                            <a href=" " class="ms-auto mb-0"><button class=" px-6 btn bg-gradient-dark " type="button" title="submit">Submit for Filter</button></a>
                        </div>
                    </form>
                </div>
                <div class="card-body px-0 pb-0">
                    <div class="table-responsive">
                        <table class="table table-flush" id="coordinator-list">
                            <thead class="thead-light">
                                <tr>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">sl/no</th>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">Coordinator </th>
                                    <th class="  text-center text-uppercase text-secondary text-xs font-weight-bolder ">mobile </th>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">email </th>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">city</th>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">state</th>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">country</th>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">Outstanding </th>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">Total payment </th>
                                    <th class=" text-center text-uppercase text-secondary text-xs font-weight-bolder ">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($coordinators as $rows )                                  
                                <tr>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{$loop->iteration}}</p>
                                    </td>
                                    <td>
                                        <h6 class="mb-0 text-ms">{{$rows->coordinator_name}} </h6>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-sm font-weight-normal">{{$rows->mobile}} </span>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{$rows->email}} </p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{$rows->city->city}} </p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{$rows->state->state}} </p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{$rows->country->country}} </p>
                                    </td>
                                    <td>
                                        {{ $rows->coordinatorOutstanding->total_outstanding ?? 'No Outstanding Record' }}                            
                                      </td>
                           
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0"> {{ $rows->coordinatorOutstanding->total_out ?? 'No payment Record' }}   </p>
                                    </td>
                                 
                                    <td class="text-sm">
                                        <a href="coordinator_creation" data-bs-toggle="tooltip" data-bs-original-title="Edit Profile">
                                            <i class="material-icons text-success position-relative text-lg">drive_file_rename_outline</i>
                                        </a>
                                        <a href="view_cod_school" class="ms-3" data-bs-toggle="tooltip" data-bs-original-title="View School ">
                                            <i class="material-icons text-primary position-relative text-lg">school</i>
                                        </a>
                                        <a href="view_cod_stock" class="ms-3" data-bs-toggle="tooltip" data-bs-original-title="View Stock">
                                            <i class="material-icons text-warning position-relative text-lg">inventory_2</i>
                                        </a>
                                        <a href="view_cod_challan" class="ms-3" data-bs-toggle="tooltip" data-bs-original-title="View Challan">
                                            <i class="material-symbols-outlined text-info position-relative text-lg">note_stack</i>
                                        </a>
                                        <a href="payment" class="ms-3" data-bs-toggle="tooltip" data-bs-original-title="View Payment">
                                            <i class="material-symbols-outlined text-dark position-relative text-lg">payments</i>
                                        </a>
                                       
                                    </td>
                                    @endforeach
                                </tr>
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
    if (document.getElementById('coordinator-list')) {
        const dataTableSearch = new simpleDatatables.DataTable("#coordinator-list", {
            searchable: true,
            fixedHeight: false,
            perPage: 7
        });

        document.querySelectorAll(".export").forEach(function(el) {
            el.addEventListener("click", function(e) {
                var type = el.dataset.type;

                var data = {
                    type: type,
                    filename: "Coordinator list " + type,
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
    if (document.getElementById('choices-city')) {
        var element = document.getElementById('choices-city');
        const example = new Choices(element, {
            searchEnabled: true,
            shouldSort: false,
        });
    };
    if (document.getElementById('choices-state')) {
        var element = document.getElementById('choices-state');
        const example = new Choices(element, {
            searchEnabled: true,
            shouldSort: false,
        });
    };
    if (document.getElementById('choices-country')) {
        var element = document.getElementById('choices-country');
        const example = new Choices(element, {
            searchEnabled: true,
            shouldSort: false,
        });
    };
 
</script>
@endsection
