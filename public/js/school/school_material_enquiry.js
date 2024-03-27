$(document).ready(function () {
     // fetch corresponding level based on product
     $("#sc_product_id").change(function () {
        var product_id = $("#sc_product_id").val();
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
                $("#sc_material_category_id").html(data.result);
                
            },
        });
    });
    // fetch material based on product level class
    $("#sc_class_id").change(function () {
        var class_id = $("#sc_class_id").val();
        var product_id = $("#sc_product_id").val();
        var level_id = $("#sc_material_category_id").val();

        $.ajax({
            type: "POST",
            url: fetchMaterialUrl,
            data: { product_id: product_id,class_id:class_id,level_id:level_id },
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (data) {
                console.log(data);
                $("#sc_material_id").html(data.result);
                
            },
        });
    });
    $("#schoolMaterialEnquiryForm").submit(function (e) {
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
                    $("#materialEnquiryModel").modal("hide");
                    $("#table_div").load(location.href + " #table_div>*", "");
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

     //////////////////////////////////////////////////////////coordinator operating material enquiry ////////////////////////
    

     $(document).on("click", "#schoolMaterialAvailableStatus", function (e) {
        e.preventDefault();
        var id = $(this).attr("value");
        $.ajax({
            type: "POST",
            url: materialAvailableUrl,
            data: { id: id },
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
                    $("#table_div").load(location.href + " #table_div>*", "");
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
