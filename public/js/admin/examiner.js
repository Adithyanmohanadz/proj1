$(document).ready(function () {

    //fetch city by state
    $("#ex_state_id").change(function () {
        var state_id = $("#ex_state_id").val();
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
                $("#ex_city_id").html(data.result);
            },
        });
    });

    $("#addExaminerForm").submit(function (e) {
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
                    $("#addExaminerModel").modal("hide");
                    $("#table_div").load(location.href + " #table_div>*", "");
                    $("#addExaminerForm")[0].reset();
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
    // assign examiner to coordinator
    $("#assignExaminerToCoordinatorForm").submit(function (e) {
        e.preventDefault();
        var routeUrl = $(this).data("route"); // Get the route URL from the data attribute
        var formData = $(this).serializeArray();
                var selectedExaminers = $("#examiner_ids").val();
                formData.push({ name: 'examiner_ids', value: selectedExaminers });
                formData = $.param(formData); // Serialize the modified array
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
                    $("#assignExaminerToCoordinatorModel").modal("hide");
                    $("#table_div").load(location.href + " #table_div>*", "");
                    $("#assignExaminerToCoordinatorForm")[0].reset();
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

    // assign examiner to school
    //when coordinator is select fetch both schools and examiners based on coordinator
    $("#se_coordinator_id").change(function () {
        var coordinator_id = $("#se_coordinator_id").val();
        console.log(coordinator_id)
        //to fetch examiners
        $.ajax({
            type: "POST",
            url: fetchExaminerUrl,
            data: { coordinator_id: coordinator_id },
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (data) {
                console.log(data);
                $("#se_examiner_id").html(data.result);
            },
        });
         //to fetch schools
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
                $("#se_school_id").html(data.result);
            },
        });
    });
    $("#ExaminerAssignToSchoolForm").submit(function (e) {
        e.preventDefault();
        var routeUrl = $(this).data("route"); // Get the route URL from the data attribute
        var formData = $(this).serializeArray();
                var selectedSchools = $("#se_school_id").val();
                formData.push({ name: 'school_ids', value: selectedSchools });
                formData = $.param(formData); // Serialize the modified array
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
                    $("#ExaminerAssignToSchoolModel").modal("hide");
                    $("#table_div").load(location.href + " #table_div>*", "");
                    $("#ExaminerAssignToSchoolForm")[0].reset();
                    $("#se_school_id").empty();
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

    //////////////// coordinator assign schools to examiner ///////
    $("#coordinatorAssignSchoolForm").submit(function (e) {
        e.preventDefault();
        var routeUrl = $(this).data("route"); // Get the route URL from the data attribute
        var formData = $(this).serializeArray();
                var selectedSchools = $("#cae_school_ids").val();
                formData.push({ name: 'cae_school_ids', value: selectedSchools });
                formData = $.param(formData); // Serialize the modified array
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
                    $("#coordinatorAssignSchoolModel").modal("hide");
                    $("#table_div").load(location.href + " #table_div>*", "");
                    $("#coordinatorAssignSchoolForm")[0].reset();
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
     //////////////// examiner meet link ///////
     $("#meetLinkForm").submit(function (e) {
        e.preventDefault();
        var routeUrl = $(this).data("route"); // Get the route URL from the data attribute
        var formData = $(this).serializeArray();
              
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
                    $("#coordinatorAssignSchoolModel").modal("hide");
                    $("#table_div").load(location.href + " #table_div>*", "");
                    $("#meetLinkForm")[0].reset();
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
