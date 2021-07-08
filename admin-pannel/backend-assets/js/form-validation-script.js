var Script = function() {

    // $.validator.setDefaults({
    //     submitHandler: function() { alert("submitted!"); }
    // });

    $().ready(function() {


        // validate signup form on keyup and submit
        $("#register_form").validate({
            rules: {
                car_model: {
                    required: true,
                    minlength: 2
                },
                car_seat_limit: {
                    required: true,
                    minlength: 1
                },
                car_no: {
                    required: true,
                    minlength: 2
                },
                car_owner: {
                    required: true,
                    minlength: 3

                },
                car_image: {
                    required: true
                }
            },
            messages: {
                car_model: {
                    required: "Please enter Car's model.",
                    minlength: "Your car's model must consist of at least 2 characters long."
                },
                car_seat_limit: {
                    required: "Please enter seat limit of car.",
                    minlength: "Your seat limit must be minimum 1 character long."
                },
                car_no: {
                    required: "Please enter Car's no.",
                    minlength: "Your car's no must consist of at least 2 characters long."
                },
                car_owner: {
                    required: "Please provide a owner name.",
                    minlength: "Your owner's name must be at least 3 characters long."
                },

                car_image: {
                    required: "Please provide a car image."
                }

            }
        });




    });


}();