$(document).ready(function () {
    // admin creating student 
    // fetch corresponding level based on product
    $("#choices-product").change(function () {
        var product_id = $("#choices-product").val();
        $.ajax({
            type: "POST",
            url: fetchLevelUrl,
            data: { product_id: product_id },
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (data) {
                console.log(data);
                $("#material_category_id").html(data.result);
            },
        });
    });

    $("#student_form").submit(function (e) {
        e.preventDefault();
        // Enable the material_category_id field before serializing the form data
        $("#material_category_id").prop("disabled", false);
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
                // Disable the material_category_id field again after the form submission
                $("#material_category_id").prop("disabled", true);
                if (data.response == "success") {
                    toastr["success"](data.message);
                    toastr.options = {
                        closeButton: true,
                        progressBar: true,
                    };
                    setTimeout(function () {
                        window.location.href = All_student_list_url; // All_school_list_url declared in add_school page
                    }, 2000); // 2000 milliseconds = 2 seconds
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

    /// coordinator register student
    // fetch corresponding level based on product
    $("#cs_product_id").change(function () {
        var product_id = $("#cs_product_id").val();
        $.ajax({
            type: "POST",
            url: levelfetchUrl,
            data: { product_id: product_id },
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (data) {
                console.log(data);
                $("#cs_material_category_id").html(data.result);
            },
        });
    });

    $("#coordinatorStudentCreationForm").submit(function (e) {
        e.preventDefault();
        // Enable the material_category_id field before serializing the form data
        $("#cs_material_category_id").prop("disabled", false);
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
                // Disable the material_category_id field again after the form submission
                $("#cs_material_category_id").prop("disabled", true);
                if (data.response == "success") {
                    toastr["success"](data.message);
                    toastr.options = {
                        closeButton: true,
                        progressBar: true,
                    };
                    setTimeout(function () {
                        window.location.href = allStudentUrl; // All_school_list_url declared in add_school page
                    }, 2000); // 2000 milliseconds = 2 seconds
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

    // school register student
     // fetch corresponding level based on product
     $("#ss_product_id").change(function () {
        var product_id = $("#ss_product_id").val();
        $.ajax({
            type: "POST",
            url: levelfetchUrl,
            data: { product_id: product_id },
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (data) {
                console.log(data);
                $("#ss_material_category_id").html(data.result);
            },
        });
    });

    $("#StudentCreationForm").submit(function (e) {
        e.preventDefault();
        // Enable the material_category_id field before serializing the form data
        $("#ss_material_category_id").prop("disabled", false);
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
                // Disable the material_category_id field again after the form submission
                $("#ss_material_category_id").prop("disabled", true);
                if (data.response == "success") {
                    toastr["success"](data.message);
                    toastr.options = {
                        closeButton: true,
                        progressBar: true,
                    };
                    setTimeout(function () {
                        window.location.href = All_student_list_url; // All_school_list_url declared in add_school page
                    }, 2000); // 2000 milliseconds = 2 seconds
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

    // student profile updation in student login section

    $("#studentProfileForm").submit(function (e) {
        e.preventDefault();
        // Enable the material_category_id field before serializing the form data
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
                // Disable the material_category_id field again after the form submission
                if (data.response == "success") {
                    toastr["success"](data.message);
                    toastr.options = {
                        closeButton: true,
                        progressBar: true,
                    };
                    setTimeout(function () {
                        location.reload();
                    }, 2000); // 2000 milliseconds = 2 seconds
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
    
    // end of document ready
});
