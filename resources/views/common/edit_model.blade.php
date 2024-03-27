<section>
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-normal" id="modelHeading">Model Heading </h5>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="">
                    <div class="modal-body">
                        <div class="mt-4 input-group input-group-dynamic ">
                            <label id="modelLabelName" class="form-label">Label Name</label>
                            <input class="form-control" id="modelInputName" name="modelInputName" type="text" />
                        </div>
                        @php
                            if ($active == 'class1') {
                                echo '
                                <div class="mt-4 input-group input-group-dynamic ">
                                    <label class="form-label">Class NameTTTTTTT</label>
                                    <input class="form-control" id="editClassName" type="text" />
                                </div>
                                ';
                            }
                        @endphp
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn bg-gradient-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
