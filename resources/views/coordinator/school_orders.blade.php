@extends('coordinator.common.coordinator_layout')
@section('page_content_body')
<div class="container-fluid py-1">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-lg-flex">
                        <div>
                            <h5 class="mb-0">View School Order</h5>
                        </div> 
                    </div>
                    <form id="coordinatorViewSchoolOrderByIdForm" data-route="{{route('coordinatorSchoolOrderById')}}">
                        <div class="d-lg-flex mt-4">
                            <div class=" ms-lg-3 my-auto mt-lg-0 mt-4 col-12 col-md-6 col-lg-3">
                                <select class="form-control " name="school_id" id="choices-school">
                                    <option value="" selected disabled>School</option>
                                    @foreach ($schools as $rows )
                                        <option value="{{$rows->school_id}}">{{$rows->school->school_name}}</option>
                                    @endforeach
                                </select>
                            </div>     
                        </div>
                        <div class="button-row d-flex mt-4">
                            <button class="ms-auto mb-0 px-6 btn bg-gradient-dark " type="submit" title="submit">Submit for Filter</button>
                        </div>
                    </form>
                </div>
                <div class="card-body px-0 pb-0">
                    <div class="table-responsive">
                        <table class="table table-flush" id="inventory-management">
                            <thead class="thead-light"> 
                                <tr>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">sl/no</th>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">School  </th> 
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">File Name</th> 
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">Uploaded File</th>  
                                </tr>
                            </thead>
                            <tbody id="tbodyDiv">  
                            
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
    if (document.getElementById('inventory-management')) {
        const dataTableSearch = new simpleDatatables.DataTable("#inventory-management", {
            searchable: true,
            fixedHeight: false,
            perPage: 7
        });

        document.querySelectorAll(".export").forEach(function(el) {
            el.addEventListener("click", function(e) {
                var type = el.dataset.type;

                var data = {
                    type: type,
                    filename: "Inventory Management " + type,
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
    if (document.getElementById('choices-school')) {
        var element = document.getElementById('choices-school');
        const example = new Choices(element, {
            searchEnabled: true,
            shouldSort: false,
        });
    }; 
</script>
@endsection
