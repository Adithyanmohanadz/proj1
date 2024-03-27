$(document).ready(function () {
    $("#class_form").submit(function (e) {
        e.preventDefault();
        var routeUrl = $(this).data("route"); // Get the route URL from the data attribute
        var formData = $(this).serialize();
        $.ajax({
            url: routeUrl,
            type: "POST",
            data: formData,
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (data) {
                console.log(data);
                if (data.response == "success") {
                    toastr["success"](data.message);
                    toastr.options = {
                        closeButton: true,
                        progressBar: true,
                    };
                    $("#class_add_model").modal("hide");
                    $("#table_div").load(location.href + " #table_div>*", "");
                    $("#class_form")[0].reset();
                } else {
                    // Check if there are validation errors in the response
                    if (data.message && data.message.constructor === Object) {
                        // Iterate through the validation error messages
                        for (var key in data.message) {
                            if (data.message.hasOwnProperty(key)) {
                                toastr["error"](data.message[key][0]); // Display the first error for each field
                            }
                        }
                    } else {
                        toastr["error"](data.message); // Display other error messages
                    }
                    toastr.options = {
                        closeButton: true,
                        progressBar: true,
                    };
                }
            },
        });
    });

    /// class edit button click, show model and data
    $(document).on("click", "#edit_class", function (e) {
        e.preventDefault();
        var edit_id = $(this).attr("value");
        if (edit_id == "") {
        } else {
            $.ajax({
                url: base_url + "admin/department/edit_department",
                type: "post",
                dataType: "json",
                data: {
                    edit_id: edit_id,
                },
                success: function (data) {
                    if (data.response == "success") {
                        $("#editModal").modal("show");
                        $("#edit_model_heading").text("Edit Department");
                        $("#edit_model_label_name").text("Department Name");
                        $("#which_model").val("department");
                        $("#primary_key_id").val(data.post.department_id);
                        $("#edit_model_input_name").val(data.post.department);
                    } else {
                        toastr["error"](data.message);
                        toastr.options = {
                            closeButton: true,
                            progressBar: true,
                        };
                    }
                },
            });
        }
    });
    // end of document ready
});
