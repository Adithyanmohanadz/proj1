$(document).ready(function () {
    $("#materialTable").hide();
    // $('#addedMaterialsDiv').hide();
    // fetch corresponding category/level
    $("#order_product_id").change(function () {
        var product_id = $("#order_product_id").val();
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
                $("#order_material_category_id").html(data.result);
            },
        });
    });

    // fetch corresponding material details
    $("#order_material_category_id").change(function () {
        var product_id = $("#order_product_id").val();
        var material_category_id = $("#order_material_category_id").val();
        $.ajax({
            type: "POST",
            url: fetchAllMaterialUrl,
            data: {
                product_id: product_id,
                material_category_id: material_category_id,
            },
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (data) {
                if (data.result.trim() !== "") {
                    $("#materialTable").show();
                    $("#materialData").html(data.result);
                    $("#noMaterialsMessage").hide();
                } else {
                    $("#materialTable").hide();
                    $("#noMaterialsMessage").show();
                }
            },
        });
    });

    $("#orderTakingForm").submit(function (e) {
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
                    $("#orderMaterialsData").html(data.records);
                    // $('#addedMaterialsDiv').show();

                    // setTimeout(function () {
                    //     window.location.href = All_student_list_url;// All_school_list_url declared in add_school page
                    // }, 2000); // 2000 milliseconds = 2 seconds
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

    // delete order from table
    $(document).on("click", "#deleteOrder", function () {
        var delete_id = $(this).attr("value");
        var rowToDelete = $(this).closest("tr");
        $.ajax({
            type: "POST",
            url: deleteOrderUrl,
            data: { delete_id: delete_id },
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (data) {
                console.log(data);
                rowToDelete.remove();
            },
        });
    });

    //order confirmation
    $("#orderConfirmationForm").submit(function (e) {
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
                    window.location.href = orderConfirmationViewPage;
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

    // fetch shipping address details
    $("#shipping_id").change(function () {
        var shipping_id = $("#shipping_id").val();
        $.ajax({
            type: "POST",
            url: shippingAddressUrl,
            data: { shipping_id: shipping_id },
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (data) {
                console.log(data);
                $("#shippingDataDisplay").html(data.result);
            },
        });
    });

    $("#placeOrder").click(function () {
        var shipping_id = document.getElementById("shipping_id").value;
        if (shipping_id === "") {
            var message = "please select shipping address";
            toastr.error(message); // Use toastr.error instead of toastr.danger
            toastr.options = {
                closeButton: true,
                progressBar: true,
            };
        } else {
            var shipping_id = $("#shipping_id").val();
            $.ajax({
                type: "POST",
                url: placeOrderUrl,
                data: { shipping_id: shipping_id },
                dataType: "json",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                success: function (data) {
                    console.log(data);
                    if (data.response == "success") {
                        toastr["success"](data.message);
                        toastr.options = {
                            closeButton: true,
                            progressBar: true,
                        };
                        setTimeout(function () {
                            window.location.href = allOrderUrl;
                        }, 2000); // 2000 milliseconds = 2 seconds
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
        }
    });

    // fetch shipping address details for order view page
    $("#co_shipping_id").change(function () {
        var shipping_id = $("#co_shipping_id").val();
        $.ajax({
            type: "POST",
            url: fetchShippingAddress,
            data: { shipping_id: shipping_id },
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (data) {
                console.log(data);
                $("#co_shippingDataDisplay").html(data.result);
            },
        });
    });

    // order received 
    $('#orderReceived').click(function(){
        var consolidateOrderId = $(this).val();
        $.ajax({
            type: "POST",
            url: orderReceivedUrl,
            dataType: "json",
            data: { consolidateOrderId: consolidateOrderId },
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
                        setTimeout(function () {
                            window.location.href = allOrderUrl;
                        }, 2000); // 2000 milliseconds = 2 seconds
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
    })
    /////////////////////////////////////////////admin section for order ////////////////////////////////////////////


    //pending order submit
    $("#pendingOrderForm").submit(function (e) {
        e.preventDefault();
        var routeUrl = $(this).data("route"); // Get the route URL from the data attribute
        var formData = $(this).serialize();
        console.log(formData)
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
                    // window.location.href = orderConfirmationViewPage;
                    var newTab = window.open(data.redirect, '_blank');

                    
                    newTab.focus();

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

 //dispatch order submit
 $("#dispatchOrderForm").submit(function (e) {
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
                // window.location.href = orderConfirmationViewPage;
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
