$(document).ready(function () {
    
    $('.resultStatus').click(function(e){
        e.preventDefault();
        var routeUrl = path; // Get the route URL from the data attribute
        var examResult = $(this).val();
         // Find the closest row and then find the hidden input within that row
         var student_id = $(this).closest('form').find('input[name="student_id"]').val();
         var school_id = $(this).closest('form').find('input[name="school_id"]').val();
         var product_id = $(this).closest('form').find('input[name="product_id"]').val();
         var material_category_id = $(this).closest('form').find('input[name="material_category_id"]').val();
         var class_id = $(this).closest('form').find('input[name="class_id"]').val();
         var year_id = $(this).closest('form').find('input[name="year_id"]').val();
         var exam_id = $(this).closest('form').find('input[name="exam_id"]').val();
         var score = $(this).closest('tr').find('input[name="score"]').val();
         var type_of_exam = $(this).closest('tr').find('input[name="type_of_exam"]').val();
         var clickedButton = $(this);
         var resultTdId = clickedButton.closest('tr').find('.resulttd').attr('id');
        $.ajax({
            url: routeUrl,
            type: "POST",
            data: {type_of_exam:type_of_exam ,score:score,examResult:examResult,student_id: student_id,school_id:school_id,product_id:product_id,material_category_id:material_category_id,class_id:class_id,year_id:year_id,exam_id:exam_id },
            dataType: "json",
            headers: {
              "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
          },
            success: function (data) {
                if (data.response == "success") {
                    // toastr["success"](data.message);
                    // toastr.options = {
                    //     closeButton: true,
                    //     progressBar: true,
                    // };
                    var resulttd = $('#' + resultTdId);
                    // Change only the text content based on the value of data.response
                    resulttd.text(data.message);

                    if (data.message == 'Fail') {
                        resulttd.removeClass('badge-success').addClass('badge-danger');
                    } else if (data.message == 'Absent') {
                        resulttd.removeClass('badge-success').addClass('badge-primary');
                    } else {
                        resulttd.removeClass('badge-danger').addClass('badge-success');
                    }
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




