$(document).ready(function () {

      // fetch corresponding state based on country
      $("#shipping_country_id").change(function () {
        console.log("haaaaai");
        var country_id = $("#shipping_country_id").val();
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
                $("#shipping_state_id").html(data.result);
            },
        });
    });

      // fetch corresponding city based on state
      $("#shipping_state_id").change(function () {
        console.log("haaaaai");
        var state_id = $("#shipping_state_id").val();
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
                $("#shipping_city_id").html(data.result);
            },
        });
    });


    $("#shippingAddressForm").submit(function (e) {
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
                    $("#shippingAddressAddModel").modal("hide");
                    $("#table_div").load(location.href + " #table_div>*", "");
                    $('#shippingAddressForm')[0].reset();
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
