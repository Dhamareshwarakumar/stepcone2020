 $(document).ready(function() {

    
    
    $('#contact_form').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            first_name: {
                validators: {
                        stringLength: {
                        min: 2,
                    },
                        notEmpty: {
                        message: 'Please enter your First Name'
                    }
                }
            },
             last_name: {
                validators: {
                     stringLength: {
                        min: 2,
                    },
                    notEmpty: {
                        message: 'Please enter your Last Name'
                    }
                }
            },
            year:
            {
                validators: {
                    notEmpty: {
                        message: 'Please select your Year of study'
                    }
                }
            },
            dept: {
                validators: {
                    notEmpty:
                    {
                        message: 'please select branch'
                    }
                }
            },
regno: {
                validators: {
                     stringLength: {
                        min: 1,
                    },
                    notEmpty: {
                        message: 'Please enter your Registration Number'
                    }
                }
            },
            clg: {
                validators: {
                    notEmpty: {
                        message: 'Please select your college Name'
                    }
                }
            },
user_password: {
                validators: {
                     stringLength: {
                        min: 8,
                    },
                    identical: {
                        field: 'confirm_password',
                        message: 'The password and its confirm are not the same'
                    },
                    notEmpty: {
                        message: 'Please enter your Password'
                    }
                }
            },
confirm_password: {
                validators: {
                     identical: {
                        field: 'user_password',
                        message: 'The password and its confirm are not the same'
                    },
                    notEmpty: {
                        message: 'Please confirm your Password'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'Please enter your Email Address'
                    },
                    emailAddress: {
                        message: 'Please enter a valid Email Address'
                    }
                    ,
                    remote: {
                        url: 'user_mail_check.php',
                        type: 'POST',
                        data:{
                        type:'email'
                        },
                        message: 'you are already a registered user!'    
                    }
                }
            },
            contact_no: {
                validators: {
                  stringLength:
                  {
                    min:10,
                    max:10,
                  },
                    notEmpty: {
                        message: 'Please enter your Contact No.'
                     }
                
                }
            },
            otp: {
                validators: {
                    identical:{
                        field: 'otpcheck',
                        message: 'Incorrect OTP'
                    },
                    notEmpty: {
                        message: 'Please Enter Your OTP'
                    }
                }
            },
            otpcheck: {
                validators: {
                    identical:{
                        field: 'otp',
                        message: 'Incorrect OTP'
                    }
                    
                }
            }
            
            }
        })
        .on('success.form.bv', function(e) {
            $('#success_message').slideDown({ opacity: "show" }, "slow") // Do something ...
                $('#contact_form').data('bootstrapValidator').resetForm();

            // Prevent form submission
            e.preventDefault();

            // Get the form instance
            var $form = $(e.target);

            // Get the BootstrapValidator instance
            var bv = $form.data('bootstrapValidator');

            // Use Ajax to submit form data
            $.post($form.attr('action'), $form.serialize(), function(result) {
                console.log(result);
            }, 'json');
        });
});
 /*
 $(document).on("click", ".btn-warning", function () {
         var bootstrapValidator = $('#multiform').data('bootstrapValidator');
         bootstrapValidator.enableFieldValidators('price', false);
    });*/