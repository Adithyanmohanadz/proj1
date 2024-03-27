$(document).ready(function () {

    // fetch corresponding state based on country
    $("#co_country_id").change(function () {
        var country_id = $("#co_country_id").val();
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
                $("#co_state_id").html(data.result);
                
            },
        });
    });
     // fetch corresponding city based on state
     $("#co_state_id").change(function () {
        var state_id = $("#co_state_id").val();
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
                $("#co_city_id").html(data.result);
                
            },
        });
    });

    $("#coordinatorForm").submit(function (e) {
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
                        window.location.href = allCoordinatorsListUrl;// All_coordinators page
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

    //coordinator profile edit by coordinator 
    $("#coordinatorProfileForm").submit(function (e) {
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
                console.log(data)
                if (data.response == "success") {
                    toastr["success"](data.message);
                    toastr.options = {
                        closeButton: true,
                        progressBar: true,
                    };
    
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

///////////////////////////////////////////////// national coordinator //////////////////
$("#nationalCoordinatorForm").submit(function (e) {
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
            console.log(data)
            if (data.response == "success") {
                toastr["success"](data.message);
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                };
                // $("#table_div").load(location.href + " #table_div>*", "");
                 setTimeout(function () {
                        window.location.reload();
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
     // end of document ready
});
