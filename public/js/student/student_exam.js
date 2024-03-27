$(document).ready(function () {

    $("#mockExamConfirmForm").submit(function (e) {
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
                    $("#mockConfirmModel").modal("hide");
                    // Open the link in a new tab
                    var newTab = window.open(MockgoogleLink, '_blank');
                    newTab.focus();
            
                    // Refresh the current page after a delay (adjust the delay as needed)
                    setTimeout(function () {
                        location.reload();
                    }, 1000); // 1000 milliseconds = 1 second
                
                } else {
        
                }
            },
        });
    });


    //final exam
    $("#finalExamConfirmForm").submit(function (e) {
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
                    toastr["success"](data.message);
                    toastr.options = {
                        closeButton: true,
                        progressBar: true,
                    };
                    $("#finalConfirmModel").modal("hide");
                    // Open the link in a new tab
                    var newTab = window.open(FinalgoogleLink, '_blank');
                    newTab.focus();
            
                    // Refresh the current page after a delay (adjust the delay as needed)
                    setTimeout(function () {
                        location.reload();
                    }, 1000); // 1000 milliseconds = 1 second
                
                } else {
        
                }
            },
        });
    });

    // end of document ready
});
