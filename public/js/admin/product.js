$(document).ready(function () {
    // Submit the form data when the "Add" button is clicked
    $("#product_add_model").on("click", ".btn.bg-gradient-primary", function () {
        // Gather data from the form
        var productName = $('#product_add_model input[name="product_name"]').val();
        var numberOfLevels = $("#choices-level-number").val();
        var levelNames = [];
        // Collect level names
        for (var i = 1; i <= numberOfLevels; i++) {
            var levelName = $(
                "#level-name-inputs input:eq(" + (i - 1) + ")"
            ).val();
            levelNames.push(levelName);
        }
        // Collect selected class IDs
        var selectedClassIds = $("#class-add").val();

        // Prepare data for AJAX request
        var formData = {
            product_name: productName,
            number_of_levels: numberOfLevels,
            level_names: levelNames,
            selected_class_ids: selectedClassIds,
        };
        // Perform AJAX request to submit the form data
        $.ajax({
            type: "POST",
            url: productStoreUrl,
            data: formData,
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (data) {
                console.log(data)
                if (data.response == "success") {
                    toastr["success"](data.message);
                    toastr.options = {
                        closeButton: true,
                        progressBar: true,
                    };
                    $("#product_add_model").modal("hide");
                    $("#table_div").load(location.href + " #table_div>*", "");
                    $('#product_form')[0].reset();

                    $('#choices-level-number').val(''); // Clear the dropdown value
                    $('#level-name-inputs').empty(); // Clear dynamic content
                } else {
                    // Check if there are validation errors in the response
                    if (
                        data.message &&
                        data.message.constructor === Object
                    ) {
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

    // end of document ready
});
