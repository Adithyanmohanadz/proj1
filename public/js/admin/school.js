$(document).ready(function () {

    // fetch corresponding state based on country
    $("#country_id").change(function () {
        var country_id = $("#country_id").val();
        $.ajax({
            type: "POST",
            url: stateFetchUrl,
            data: { country_id: country_id },
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (data) {
                console.log(data);
                $("#state_id").html(data.result);
                
            },
        });
    });
     // fetch corresponding city based on state
     $("#state_id").change(function () {
        var state_id = $("#state_id").val();
        console.log(state_id)
        $.ajax({
            type: "POST",
            url: cityFetchUrl,
            data: { state_id: state_id },
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (data) {
                console.log(data);
                $("#city_id").html(data.result);
                
            },
        });
    });

    $("#add_school_form").submit(function (e) {
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
                console.log(data)
                if (data.response == "success") {
                    toastr["success"](data.message);
                    toastr.options = {
                        closeButton: true,
                        progressBar: true,
                    };
                    setTimeout(function () {
                        window.location.href = All_school_list_url;// All_school_list_url declared in add_school page
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
    });

    // school registration section


     // fetch corresponding state based on country
     $("#choices-country").change(function () {
        var country_id = $("#choices-country").val();
        $.ajax({
            type: "POST",
            url: stateFetchUrl,
            data: { country_id: country_id },
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (data) {
                console.log(data);
                $("#reg_state_id").html(data.result);
                
            },
        });
    });
     // fetch corresponding city based on state
     $("#reg_state_id").change(function () {
        var state_id = $("#reg_state_id").val();
        console.log(state_id)
        $.ajax({
            type: "POST",
            url: cityFetchUrl,
            data: { state_id: state_id },
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (data) {
                console.log(data);
                $("#reg_city_id").html(data.result);
                
            },
        });
    });
     // fetch corresponding school based on city
     $("#reg_city_id").change(function () {
        var city_id = $("#reg_city_id").val();
        console.log(city_id)
        $.ajax({
            type: "POST",
            url: schoolFetchUrl,
            data: { city_id: city_id },
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (data) {
                console.log(data);
                $("#reg_school_id").html(data.result);
                
            },
        });
    });

    // school registration 
    $("#school_registration_form").submit(function (e) {
        e.preventDefault();
        var routeUrl = $(this).data("route"); // Get the route URL from the data attribute
        var formData = new FormData($(this)[0]);
        var selectedProductIds = $("#select-product").val();
        var selectedClassIds = $("#select-class").val();

        // Append the product IDs array class_id array to formData
        formData.append('reg_product_id', selectedProductIds);
        formData.append('reg_class_id', selectedClassIds);


        // // Log each form field value
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
                        setTimeout(function () {
                            window.location.href = allRegSchoolsUrl;
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

    document.addEventListener('DOMContentLoaded', function() {
        const downloadCells = document.querySelectorAll('.download-cell');

        downloadCells.forEach(function(cell) {
            cell.addEventListener('click', function(event) {
                event.preventDefault();

                const file = this.getAttribute('data-file');
                if (file) {
                    // Create a temporary link element
                    const link = document.createElement('a');
                    link.href = file;
                    link.download = file;

                    // Append the link to the body and trigger the download
                    document.body.appendChild(link);
                    link.click();

                    // Remove the link from the body
                    document.body.removeChild(link);
                }
            });
        });
    });

    /////////// admin approve school /////////////
    $(document).on("click", "#adminApproveSchool", function (e) {
        e.preventDefault();
        var id = $(this).attr("value");
        $.ajax({
            type: "POST",
            url: adminSchoolApprovelUrl,
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

     /////////// admin disapprove school /////////////
     $(document).on("click", "#adminDisapproveSchool", function (e) {
        e.preventDefault();
        var id = $(this).attr("value");
        var disapprove = $(this).data('disapprove');
        $.ajax({
            type: "POST",
            url: adminSchoolApprovelUrl,
            data: { id: id ,disapprove:disapprove},
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


    ////////////////////coordinator    registering school section ////////////////////////////////////


    // fetch corresponding state based on country
    $("#cr_country_id").change(function () {
        var country_id = $("#cr_country_id").val();
        console.log(country_id)
        $.ajax({
            type: "POST",
            url: fetchStateUrl,
            data: { country_id: country_id },
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (data) {
                console.log(data);
                $("#cr_state_id").html(data.result);
                
            },
        });
    });
     // fetch corresponding city based on state
     $("#cr_state_id").change(function () {
        var state_id = $("#cr_state_id").val();
        console.log(state_id)
        $.ajax({
            type: "POST",
            url: fetchCityUrl,
            data: { state_id: state_id },
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (data) {
                console.log(data);
                $("#cr_city_id").html(data.result);
                
            },
        });
    });
     // fetch corresponding school based on city
     $("#cr_city_id").change(function () {
        var city_id = $("#cr_city_id").val();
        console.log(city_id)
        $.ajax({
            type: "POST",
            url: fetchSchoolUrl,
            data: { city_id: city_id },
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (data) {
                console.log(data);
                $("#cr_school_id").html(data.result);
                
            },
        });
    });

    // school registration 
    $("#coordinatorRegisterSchoolForm").submit(function (e) {
        e.preventDefault();
        var routeUrl = $(this).data("route"); // Get the route URL from the data attribute
        var formData = new FormData($(this)[0]);
        var selectedProductIds = $("#product_ids").val();
        var selectedClassIds = $("#class_ids").val();
        // Append the product IDs array class_id array to formData
        formData.append('reg_product_id', selectedProductIds);
        formData.append('reg_class_id', selectedClassIds);
        // // Log each form field value
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
