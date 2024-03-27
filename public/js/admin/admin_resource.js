$(document).ready(function () {

    $("#adminResourceForm").submit(function (e) {
        e.preventDefault();
        var routeUrl = $(this).data("route"); // Get the route URL from the data attribute
        var formData = new FormData($(this)[0]);
        // Log each form field value
        // formData.forEach(function (value, key) {
        //     if (value instanceof File && value.size > 0) {
        //         console.log(key + ": File (Name: " + value.name + ", Size: " + value.size + " bytes)");
        //     } else if (value instanceof File) {
        //         console.log(key + ": Empty File Field");
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
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (data) {
                console.log(data)
                if (data != "") {
                    if (data.response == "success") {
                        toastr["success"](data.message);
                        toastr.options = {
                            closeButton: true,
                            progressBar: true,
                        };
                        // $('#material_form')[0].reset();
                        setTimeout(function () {
                            location.reload();
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
    });
   
     // end of document ready
});
