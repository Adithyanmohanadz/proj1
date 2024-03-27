@extends('common.layout')
@section('page_content_body')
<div class="container-fluid py-1 mb-6">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-lg-flex">
                        <div>
                            <h5 class="mb-0"> List Of Schools</h5>
                        </div>
                        <div class="ms-auto my-auto mt-lg-0 mt-4">
                            <div class="ms-auto my-auto">
                                <a href="{{ route('school.add_school') }}" class="btn bg-gradient-primary btn-sm mb-0">+&nbsp; Add  </a>
                                <button class="btn btn-outline-primary btn-sm export mb-0 mt-sm-0 mt-1" data-type="csv" type="button" name="button">Download</button>
                            </div>
                        </div>
                    </div>
                    <form action="">
                        <div class="d-lg-flex mt-4">
                            <div class=" my-auto mt-lg-0 mt-4 col-12 col-md-6 col-lg-3">
                                <select class="form-control " name=" " id="choices-country">
                                    <option value="" selected>Country</option>
                                    <option value="12345678900">12345678900</option>
                                    <option value="2">2</option>
                                </select>
                            </div>
                            <div class="ms-lg-3 my-auto mt-lg-0 mt-4 col-12 col-md-6 col-lg-3">
                                <select class="form-control " name=" " id="choices-state">
                                    <option value="" selected>state</option>
                                    <option value="12345678900">12345678900</option>
                                    <option value="2">2</option>
                                </select>
                            </div>
                            <div class="ms-lg-3  my-auto mt-lg-0 mt-4 col-12 col-md-6 col-lg-3">
                                <select class="form-control " name=" " id="choices-city">
                                    <option value="" selected>City</option>
                                    <option value="12345678900">12345678900</option>
                                    <option value="2">2</option>
                                </select>
                            </div>
                            
                        </div>
                        <div class="d-lg-flex mt-4"> 
                            <div class="  my-auto mt-lg-0 mt-4 col-12 col-md-6 col-lg-3">
                                <select class="form-control " name=" " id="choices-status">
                                    <option value="" selected>Reg/UN Reg</option>
                                    <option value="12345678900">reg</option>
                                    <option value="2">un reg</option>
                                </select>
                            </div> 
                        </div>
                        <div class="button-row d-flex mt-4">
                            <a href=" " class="ms-auto mb-0"><button class=" px-6 btn bg-gradient-dark " type="button" title="submit">Submit for Filter</button></a>
                        </div>
                    </form>
                </div>
                <div class="card-body px-0 pb-0">
                    <div class="table-responsive">
                        <table class="table table-flush" id="total-school">
                            <thead class="thead-light">
                                <tr>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">sl/no</th>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">school</th> 
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">Email</th>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">phone number</th>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">City</th>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">state</th>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">country</th>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder text-center">Status</th>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder "> Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($schools as $rows)
                                <tr>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{$loop->iteration}}</p>
                                    </td>
                                    <td>
                                        <h6 class="mb-0 text-md">{{$rows->school_name}}</h6>
                                    </td> 
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{$rows->email}}</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0"> {{$rows->mobile}}</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{$rows->schoolCity->city}} </p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0"> {{$rows->schoolState->state}}</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0"> {{$rows->schoolCountry->country}}</p>
                                    </td>
                         
                                    <td class="align-middle text-center text-sm">
                                        @if($rows->registered == 1)
                                        <span class="badge badge-sm badge-success">Registered</span>
                                        @else
                                        <span class="badge badge-sm badge-warning">Un registered</span>
                                        @endif
                                    </td>
                                    <td class="text-sm">
                                        <a href="add_school" class="" data-bs-toggle="tooltip" data-bs-original-title="Edit School">
                                            <i class="material-icons text-success position-relative text-lg">drive_file_rename_outline</i>
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
<script src="{{ asset('js/plugins/choices.min.js')}}"></script>


<script>
    if (document.getElementById('total-school')) {
        const dataTableSearch = new simpleDatatables.DataTable("#total-school", {
            searchable: true,
            fixedHeight: false,
            perPage: 7
        });

        document.querySelectorAll(".export").forEach(function(el) {
            el.addEventListener("click", function(e) {
                var type = el.dataset.type;

                var data = {
                    type: type,
                    filename: "Total School " + type,
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
    if (document.getElementById('choices-country')) {
        var element = document.getElementById('choices-country');
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
    if (document.getElementById('choices-city')) {
        var element = document.getElementById('choices-city');
        const example = new Choices(element, {
            searchEnabled: true,
            shouldSort: false,
        });
    };
    if (document.getElementById('choices-coodinator')) {
        var element = document.getElementById('choices-coodinator');
        const example = new Choices(element, {
            searchEnabled: true,
            shouldSort: false,
        });
    };
    if (document.getElementById('choices-status')) {
        var element = document.getElementById('choices-status');
        const example = new Choices(element, {
            searchEnabled: true,
            shouldSort: false,
        });
    };
</script>
@endsection