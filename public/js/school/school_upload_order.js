$(document).ready(function () {
    $("#schoolOrderForm").submit(function (e) {
        e.preventDefault();
        var routeUrl = $(this).data("route"); // Get the route URL from the data attribute
        var formData = new FormData($(this)[0]);
        console.log(routeUrl);
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
                console.log(data);
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

    // coordinator view school order by school id
    $("#coordinatorViewSchoolOrderByIdForm").submit(function (e) {
        e.preventDefault();
        var routeUrl = $(this).data("route"); // Get the route URL from the data attribute
        var formData = $(this).serialize();
        console.log(formData);
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
                    $("#tbodyDiv").html(data.result);
                } else {
                    toastr["error"](data.message); // Display other error messages
                    toastr.options = {
                        closeButton: true,
                        progressBar: true,
                    };
                }
            },
        });
    });


    // admin viewing school uploads
     // fetch corresponding schools based on coordinator
     $("#al_coordinator_id").change(function () {
        var coordinator_id = $("#al_coordinator_id").val();
        $.ajax({
            type: "POST",
            url: fetchSchoolUrl,
            data: { coordinator_id: coordinator_id },
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (data) {
                console.log(data);
                $("#al_school_id").html(data.result);
            },
        });
    });

    $("#adminViewSchoolOrderForm").submit(function (e) {
        e.preventDefault();
        var routeUrl = $(this).data("route"); // Get the route URL from the data attribute
        var formData = $(this).serialize();
        console.log(routeUrl)
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
                    $("#tbodyDiv").html(data.result);
                } else {
                    toastr["error"](data.message); // Display other error messages
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
