@extends('common.layout')
@section('page_content_body')
    <style>
        .choices .choices__input {
            width: 100%;
        }

        .border-none {
            border-color: #fff;
        }
    </style>
    <div class="container-fluid py-1 mb-6">
        <div class="row">
            <div class="col-12 ">
                <div class="card">

                    <div class="card-header pb-0">
                        <div class="d-lg-flex">
                            <div>
                                <h5 class="mb-0">{{$page_title}}</h5>
                            </div>

                            <div class="ms-auto my-auto mt-lg-0 mt-4">
                                <div class="ms-auto my-auto">
                                    <button class="btn bg-gradient-primary btn-sm mb-0" type="button" data-bs-toggle="modal"
                                        data-bs-target="#product_add_model">+&nbsp; Add </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-0">
                        <div class="table-responsive">
                            <table class="table table-flush table-bordered rounded-3" id="Prod uct-list">
                                <thead class="thead-drak">
                                    <tr>
                                        <th class="  text-uppercase text-dark text-sm font-weight-bolder ">sl/no</th>
                                        <th class="  text-uppercase text-dark text-sm font-weight-bolder ">Product
                                        </th>
                                        <th class="  text-uppercase text-dark text-sm font-weight-bolder ">Product Name
                                        </th>
                                        <th class="  text-uppercase text-dark text-sm font-weight-bolder ">levels</th>
                                        <th class="  text-uppercase text-dark text-sm font-weight-bolder ">class</th>
                                        <th class="  text-uppercase text-dark text-sm font-weight-bolder ">Action</th>

                                    </tr>
                                </thead>
                                <tbody id="table_div">
                                   {!! $productData !!}
                                   <tr></tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Edit Product
                                        </h5>
                                        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mt-4 input-group input-group-dynamic">
                                            <label class="form-label">Product Name</label>
                                            <input class="  form-control" type="text" />
                                        </div>

                                        <div class="mt-4  ">
                                            <label class="mt-4 form-label">Select level</label>
                                            <select class="form-control" name="" id="level-edit" multiple>
                                                <option value="Choice 1">School Level</option>
                                                <option value="Choice 2">Inter School Level</option>
                                                <option value="Choice 3">State Level</option>
                                                <option value="Choice 4">National</option>
                                                <option value="Choice 1">Inter National</option>
                                            </select>
                                        </div>
                                        <div class="mt-4  ">
                                            <label class="mt-4 form-label">Class</label>
                                            <select class="form-control" name="" id="class-edit" multiple>
                                                <option value="Choice 1"> LKG</option>
                                                <option value="Choice 2"> UKG</option>
                                                <option value="Choice 3"> Class 1</option>
                                                <option value="Choice 4">Class 2</option>
                                                <option value="Choice 1">Class 3</option>
                                            </select>
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
                        <div class="modal fade" id="product_add_model" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel2" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Product Add
                                        </h5>
                                        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form id="product_form" action="">
                                        <div class="modal-body">
                                            <div class="mt-4 input-group input-group-dynamic">
                                                <label class="form-label">Product Name</label>
                                                <input class="  form-control" name="product_name" type="text" />
                                            </div>
                                            <div class="mt-4 input-group input-group-dynamic">
                                                <select class="form-control " name="level_count"
                                                    id="choices-level-number">
                                                    <option value="" selected>Select How Many Level</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                    <option value="10">10</option>
                                                </select>
                                            </div>
                                            <div class="" id="level-name-inputs">

                                            </div>
                                            <div class="mt-4  ">
                                                <label class="mt-4 form-label">Select Class</label>
                                                <select class="form-control" name="class_ids" id="class-add" multiple>
                                                    @foreach ($classes as $row)
                                                        <option value="{{ $row->class_id }}">{{ $row->class }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn bg-gradient-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn bg-gradient-primary">Add</button>
                                        </div>
                                    </form>
                                </div>
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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            // Listen for changes in the "How Many Level" select
            $('#choices-level-number').on('change', function() {
                var numberOfLevels = $(this).val();
                generateLevelNameInputs(numberOfLevels);
            });

            function generateLevelNameInputs(numberOfLevels) {
                var levelNameInputsContainer = $('#level-name-inputs');
                levelNameInputsContainer.empty(); // Clear previous inputs

                for (var i = 1; i <= numberOfLevels; i++) {
                    var inputGroup = $('<div class="mt-4 input-group input-group-dynamic"></div>');
                    var label = $(
                        '<label class="form-label text-primary" style="top: -.8rem; font-size: .7rem;">Level ' +
                        i + ' Name</label>');
                    var input = $('<input class="form-control" name="level_names[]" type="text" />');

                    inputGroup.append(label, input);
                    levelNameInputsContainer.append(inputGroup);
                }
            }
        });
    </script>
    <script>
        if (document.getElementById('Product-list')) {
            const dataTableSearch = new simpleDatatables.DataTable("#Product-list", {
                searchable: true,
                fixedHeight: false,
                perPage: 7
            });

            document.querySelectorAll(".export").forEach(function(el) {
                el.addEventListener("click", function(e) {
                    var type = el.dataset.type;

                    var data = {
                        type: type,
                        filename: "Product " + type,
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
        if (document.getElementById('choices-level-number')) {
            var element = document.getElementById('choices-level-number');
            const example = new Choices(element, {
                searchEnabled: false,
                shouldSort: false,
            });
        };
        if (document.getElementById('class-add')) {
            var element = document.getElementById('class-add');
            const example = new Choices(element, {
                removeItemButton: true,
                shouldSort: false,
            });
        }
        if (document.getElementById('level-edit')) {
            var element = document.getElementById('level-edit');
            const example = new Choices(element, {
                removeItemButton: true,
            });
        }
        if (document.getElementById('class-edit')) {
            var element = document.getElementById('class-edit');
            const example = new Choices(element, {
                removeItemButton: true,
            });
        }
        var productStoreUrl = '{{ route("product.store") }}';
    </script>
@endsection
