$(document).ready(function () {
    // fetch corresponding category/level
    $("#not_product_id").change(function () {
        var product_id = $("#not_product_id").val();
        console.log(levelUrl);
        $.ajax({
            type: "POST",
            url: levelUrl,
            data: { product_id: product_id },
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (data) {
                console.log(data);
                $("#not_material_category_id").html(data.result);
            },
        });
    });
    // Check if "All" checkbox is checked
    $("#all").on("change", function () {
        if ($(this).prop("checked")) {
            // If "All" checkbox is checked, hide all checkboxes
            $('[name="coordinator"], [name="school"], [name="student"]')
                .closest(".form-check")
                .hide();
        } else {
            // If "All" checkbox is not checked, show all checkboxes
            $('[name="coordinator"], [name="school"], [name="student"]')
                .closest(".form-check")
                .show();
        }
    });

    $("#notificationCreateForm").submit(function (e) {
        e.preventDefault();
        var routeUrl = $(this).data("route"); // Get the route URL from the data attribute
        var formData = new FormData($(this)[0]);
        // Check if none of the checkboxes are selected
        if (!$('input[type="checkbox"]:checked').length) {
            toastr["error"]("Please select at least one user to send notification.");
            return; // Stop the submission
        } else {
            // Iterate through checkboxes and append their values to formData
            $('input[type="checkbox"]').each(function () {
                formData.append(
                    $(this).attr("name"),
                    this.checked ? $(this).val() : ""
                );
            });
            // Log each form field value
            //  formData.forEach(function(value, key){
            //     if (value instanceof File) {
            //         console.log(key + ": File (Name: " + value.name + ", Size: " + value.size + " bytes)");
            //     } else {
            //         console.log(key + ": " + value);
            //     }
            // });

            $.ajax({
                url: routeUrl,
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                dataType: "json",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                success: function (data) {
                    if (data != "") {
                        console.log(data);
                        if (data.response == "success") {
                            toastr["success"](data.message);
                            toastr.options = {
                                closeButton: true,
                                progressBar: true,
                            };
                            // $('#material_form')[0].reset();
                            setTimeout(function () {
                               window.location.href = allNotificationUrl;
                            }, 2000);
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
                    }
                },
            });
        }
    });
    // end of document ready
});
