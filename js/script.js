! function (t) {
    "use strict";
    t("#sidebarToggle, #sidebarToggleTop").on("click", function (o) {
        t("body").toggleClass("sidebar-toggled"), t(".sidebar").toggleClass("toggled"), t(".sidebar").hasClass("toggled") && t(".sidebar .collapse").collapse("hide")
    }), t(window).resize(function () {
        t(window).width() < 768 && t(".sidebar .collapse").collapse("hide")
    }), t("body.fixed-nav .sidebar").on("mousewheel DOMMouseScroll wheel", function (o) {
        if (768 < t(window).width()) {
            var e = o.originalEvent,
                l = e.wheelDelta || -e.detail;
            this.scrollTop += 30 * (l < 0 ? 1 : -1), o.preventDefault()
        }
    }), t(document).on("scroll", function () {
        100 < t(this).scrollTop() ? t(".scroll-to-top").fadeIn() : t(".scroll-to-top").fadeOut()
    }), t(document).on("click", "a.scroll-to-top", function (o) {
        var e = t(this);
        t("html, body").stop().animate({
            scrollTop: t(e.attr("href")).offset().top
        }, 1e3, "easeInOutExpo"), o.preventDefault()
    })
}(jQuery);

(function ($) {
    'use strict';

    // preloader js    
    $(window).on('load', function () {
        $('.preloader').fadeOut(700);
    });

    // Sticky Menu
    $(window).scroll(function () {
        if ($('header').offset().top > 10) {
            $('.top-header').addClass('hide');
            $('.navigation').addClass('nav-bg');
        } else {
            $('.top-header').removeClass('hide');
            $('.navigation').removeClass('nav-bg');
        }
    });

    // Background-images
    $('[data-background]').each(function () {
        $(this).css({
            'background-image': 'url(' + $(this).data('background') + ')'
        });
    });

    //Hero Slider
    $('.hero-slider').slick({
        autoplay: true,
        autoplaySpeed: 7500,
        pauseOnFocus: false,
        pauseOnHover: false,
        infinite: true,
        arrows: true,
        fade: true,
        prevArrow: '<button type=\'button\' class=\'prevArrow\'><i class=\'fas fa-arrow-left\'></i></button>',
        nextArrow: '<button type=\'button\' class=\'nextArrow\'><i class=\'fas fa-arrow-right\'></i></button>',
        dots: true
    });
    $('.hero-slider').slickAnimation();

    // venobox popup
    $(document).ready(function () {
        $('.venobox').venobox();
    });


    // filter
    $(document).ready(function () {
        var containerEl = document.querySelector('.filtr-container');
        var filterizd;
        if (containerEl) {
            filterizd = $('.filtr-container').filterizr({});
        }
        //Active changer
        $('.filter-controls li').on('click', function () {
            $('.filter-controls li').removeClass('active');
            $(this).addClass('active');
        });
    });

    //  Count Up
    function counter() {
        var oTop;
        if ($('.count').length !== 0) {
            oTop = $('.count').offset().top - window.innerHeight;
        }
        if ($(window).scrollTop() > oTop) {
            $('.count').each(function () {
                var $this = $(this),
                    countTo = $this.attr('data-count');
                $({
                    countNum: $this.text()
                }).animate({
                    countNum: countTo
                }, {
                    duration: 1000,
                    easing: 'swing',
                    step: function () {
                        $this.text(Math.floor(this.countNum));
                    },
                    complete: function () {
                        $this.text(this.countNum);
                    }
                });
            });
        }
    }
    $(window).on('scroll', function () {
        counter();
    });


    // Aos js
    AOS.init({
        once: true
    });

    // Animation
    $(document).ready(function () {
        $('.has-animation').each(function (index) {
            $(this).delay($(this).data('delay')).queue(function () {
                $(this).addClass('animate-in');
            });
        });
    });

})(jQuery);

$(document).ready(function () {


    var readURL = function (input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.avatar').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }


    $(".file-upload").on('change', function () {
        readURL(this);
    });
});

//utility  
//-----------------------------------
//check to see all form fields are filled (add HTML input fields as needed)*/
function is_form_empty(form, numOfFields) {
    var valid = 0;

    function markEmptyFields() {
        if ($(this).val() != "") {
            valid++;
            $(this).removeClass("border border-danger")
        } else {
            $(this).addClass("border border-danger");
        }
    }
    $(form).find('input[type=text]')
        .each(markEmptyFields);
    $(form).find('input[type=password]')
        .each(markEmptyFields);
    $(form).find('input[type=email]')
        .each(markEmptyFields);
    $(form).find('input[type=address]')
        .each(markEmptyFields);
    if (valid >= numOfFields) {
        return false;
    } else {
        return true;
    }
}
// first close other popovers before the clicked popover opens
function close_other_pop() {
    $('[data-toggle="popover"]').popover("hide");
}
// close popover by clicking X sign inside it(it closes all popovers in page)
$("#profile_body_student").on('click', '.popover h3 a', function () {
    $('[data-toggle="popover"]').popover("hide");
});



// user registration 
//------------------
function register_user() {
    if (!(is_form_empty("#signUpForm", 5))) {
        $.ajax({
            url: 'inc/register.php',
            type: 'post',
            data: {
                name: $('#name').val(),
                tell: $('#phone').val(),
                email: $('#email').val(),
                address: $('#address').val(),
                password: $('#password').val(),
                _token: $('#_SignUpToken').val()
            },
            beforeSend: function () {
                // Show preloader
                $('.preloader_ajax').removeClass('d-none');
            },
            success: function (response) {
                $('.preloader_ajax').addClass('d-none');
                var result = JSON.parse(response);
                $("#reg_result").removeClass().addClass("text-center mt-3 p-1");
                $("#name,#phone,#email,#address,#password").removeClass().addClass("form-control");
                $("#name_err,#phone_err,#email_err,#address_err,#pass_err").text(" ");
                $("#reg_result").text(" ");
                //if validation success
                if (result[0]['validate result'] == true) {
                    //if reg is success
                    if (result[1]['reg result'] == true) {
                        $("#reg_result").removeClass("d-none").addClass("alert-success").text(result[1]['msg']);
                        $("#signUpForm")[0].reset();
                    }
                    // if reg is failed 
                    if (result[1]['reg result'] == false) {
                        switch (result[1]['msg']) {
                            case 'Email or Name already exists, please choose different name and email!':
                                $("#reg_result").removeClass("d-none").addClass("alert-danger").text(result[1]['msg']);
                                $("#name,#phone,#email,#address,#password").removeClass();
                                $("#name,#email").addClass("form-control border border-danger");
                                $("#phone,#address,#password").addClass("form-control");
                                break;
                            case 'database error !':
                            case 'Registration failed: confirmation email could not be sent!':
                                $("#reg_result").removeClass("d-none").addClass("alert-danger").text(result[1]['msg']);
                                $("#name,#phone,#email,#address,#password").removeClass().addClass("form-control");
                                break;
                            default:
                                break;
                        }
                    }
                }
                // if validation fail
                if (result[0]['validate result'] == false) {
                    // set up error msgs
                    $("#name_err").text((result[0]['name'] == false) ? "Only characters and numbers with no signs" : "");
                    $("#phone_err").text((result[0]['tell'] == false) ? "Only numbers and '+' sign are allowed" : "");
                    $("#email_err").text((result[0]['email'] == false) ? "Format is incorrect." : "");
                    $("#address_err").text((result[0]['address'] == false) ? "Only characters, numbers and ',' sign are allowed" : "");
                    $("#pass_err").text((result[0]['password'] == false) ? "Must be between 5 to 25 characters and digits" : "");
                    // display red borders on required or invalid user inputs  
                    if (result[0]['name'] == false) {
                        $("#name").addClass("border border-danger");
                    }
                    if (result[0]['tell'] == false) {
                        $("#phone").addClass("border border-danger");
                    }
                    if (result[0]['email'] == false) {
                        $("#email").addClass("border border-danger");
                    }
                    if (result[0]['address'] == false) {
                        $("#address").addClass("border border-danger");
                    }
                    if (result[0]['password'] == false) {
                        $("#password").addClass("border border-danger");
                    }
                }
            },
        });
    }
}
// reset reg form before opening
$("#registerLink").on("click", function () {
    $("#name,#phone,#email,#address,#password").removeClass().addClass("form-control");
    $("#name_err,#phone_err,#email_err,#address_err,#pass_err").text(" ");
    $("#reg_result").removeClass().addClass("text-left alert d-none");
    $("#signUpForm")[0].reset();
});



//log in logout session time forget pass
//-------------------------------------
// reset log in form before opening 
$("#logInLink").on("click", function () {
    $("#logInEmail,#logInPassword").removeClass().addClass("form-control");
    $("#logIn_result").removeClass().addClass("text-left alert d-none");
    $("#logInForm")[0].reset();
})
// user sign in
function signin_user() {
    $.ajax({
        url: 'inc/authenticate.php',
        type: 'post',
        data: {
            email: $('#logInEmail').val(),
            password: $('#logInPassword').val(),
            _token: $('#_logInToken').val()
        },
        beforeSend: function () {
            // Show preloader
            $('.preloader_ajax').removeClass('d-none');
        },
        success: function (response) {

            $("#logInEmail,#logInPassword").removeClass().addClass("form-control");
            $("#logIn_result").removeClass().addClass("text-left d-none");
            $('.preloader_ajax').addClass('d-none');
            switch (response) {
                case 'Value of username or password is incorrect':
                    $("#logIn_result").removeClass("d-none").text(" ").append(response).addClass("alert alert-danger");
                    $("#logInEmail,#logInPassword").addClass("border border-danger");
                    break;
                case 'Database Error!':
                    $("#logIn_result").removeClass("d-none").text(" ").append(response).addClass("alert alert-danger");
                    location.reload();
                    break;
                case 'Incorrect username!':
                case 'Incorrect password!':
                    $("#logIn_result").removeClass("d-none").text(" ").append("Incorrect username or password").addClass("alert alert-danger");;;;
                    $("#logInEmail,#logInPassword").addClass("border border-danger");
                    break;
                case 'login Success(Not active)':
                case 'login Success(Student)':
                    $("#logIn_result").text(" ");
                    $("#logInEmail,#logInPassword").addClass("border border-success");
                    location.href = 'student-profile.php';
                    break;
                case 'login Success(Teacher)':
                    $("#logIn_result").text(" ");
                    $("#logInEmail,#logInPassword").addClass("border border-success");
                    location.href = 'teacher-profile.php';
                    break;
                default:
                    location.reload();
                    break;
            }
        },
    });
}
//keep track of user click and typing on a page to expire sessions // to uncomment
function send_active_signal() {
    $.ajax({
        url: 'inc/session_time.php',
        type: 'post',
        data: {
            is_clicked: true,
            is_typed: true,
            current_email: $('#current_user_email').text(),
        },
        success: function (response) {
            if (response === "timeOut") {
                location.href = 'inc/logout.php';
                alert("Session time out...Please Login again");
            }
            if (response === "loggedOut") {
                location.href = 'index.php';
                alert("You logged out of you account... Please Login again");
            }
        },
    });

}
// keep track of user activity for session time out
$("#profile_body_student,#profile_body_teacher").on("click", function () {
    send_active_signal();
});
// show reset pass btn when user check the forgot pass box
$("#forgotPassCheckBtn").change(function () {
    if (this.checked) {
        $('#forgetPassBtn').removeClass('d-none');
        $('#logIn_btn,#logInPassword').addClass('d-none');

    } else {
        $('#forgetPassBtn').addClass('d-none');
        $('#logIn_btn,#logInPassword').removeClass('d-none');
    }
});
//request to email password reset code  
function send_rand_code() {
    $.ajax({
        url: 'controller.php',
        type: 'post',
        data: {
            req_type: 'send reset pass code',
            email: $('#logInEmail').val()
        },
        beforeSend: function () {
            // Show preloader
            $('.preloader_ajax').removeClass('d-none');
        },
        success: function (response) {
            $('.preloader_ajax').addClass('d-none');
            $("#logIn_result").removeClass().addClass("text-left d-none");

            if (response === 'Please check your email for Reset Password Code') {
                $('#logIn_result').removeClass('d-none').text(" ").text(response).addClass("alert alert-success");
                window.setTimeout(function () {
                    location.href = 'reset_pass.php?user=' + $("#logInEmail").val();
                }, 3000);
            }
            if (response === "Unable to send activation email") {
                $('#logIn_result').removeClass('d-none').text(" ").text(response).addClass("alert alert-danger");

            }
        },
    });
}
// change password with code
function change_pass_withCode() {
    $("#passChngCode,#newPass,#newPassAgain").removeClass().addClass("form-control");
    $("#passChngResult").removeClass().addClass("text-left d-none").text(" ");
    if ($("#passChngCode").val() == "" || $("#newPass").val() == "" || $("#newPassAgain").val() == "") {
        //if any fields are empty
        $("#passChngResult").text("*Please fill enter all fields").removeClass("d-none").addClass("text-danger");
    } else {
        if ($("#newPass").val() !== $("#newPassAgain").val()) {
            // if entered pass is not same as retyped one
            $("#passChngResult").text("*Entered password is not the same as retyped one").removeClass("d-none").addClass("text-danger");
        } else {
            // ajax req to change pass
            $.ajax({
                url: 'controller.php',
                type: 'post',
                data: {
                    req_type: 'change password with code',
                    email: $('#passChangUser').val(),
                    pass: $("#newPass").val(),
                    code: $("#passChngCode").val()
                },
                beforeSend: function () {
                    // Show preloader
                    $('.preloader_ajax').removeClass('d-none');
                },
                success: function (response) {

                    $('.preloader_ajax').addClass('d-none');
                    var result = JSON.parse(response);
                    switch (result[0]) {
                        case true:
                            $("#passChngResult").removeClass('d-none').addClass('text-success').text('PASSWORD CHANGED SUCCESSFULLY');
                            window.setTimeout(function () {
                                $("#passChngCode,#newPass,#newPassAgain").removeClass().addClass("form-control");
                                $("#passChngCode,#newPass,#newPassAgain").val("");
                            }, 3000);
                            break;
                        case false:
                            $("#passChngResult").removeClass('d-none').addClass('text-danger');;
                            for (var i = 1; i < result.length; i++) {
                                $("#passChngResult").append(result[i]).append("<br>");
                            }
                    }
                },
            });
        }
    }
}



//update profile
//-----------------------------
// reset edit account form in profile before opening 
$("#user_info_profile_updt_btn").on("click", function () {
    $("#edited_phone,#edited_address,#edited_password").removeClass().addClass("form-control");
    $("#edit_result").removeClass().addClass("text-left alert d-none");
    $("#edit_phone_err,#edited_address_err,#edited_pass_err,#edit_result").text('');
    $("#edited_password").val("");
})
//edit account in user profile 
function edit_user_acc() {

    if ($("#edited_phone").val() == "" || $("#edited_address").val() == "" || $("#edited_password").val() == "") {
        /* if all fields are empty */
        $("#edit_result").removeClass('d-none').addClass('alert-danger');
        $("#edit_result").text('Enter all values!')
    } else {
        /* ajax */
        $.ajax({
            url: 'controller.php',
            type: 'post',
            data: {
                phone: $("#edited_phone").val(),
                address: $("#edited_address").val(),
                password: $("#edited_password").val(),
                req_type: 'edit user account'
            },
            beforeSend: function () {
                // Show preloader
                $('.preloader_ajax').removeClass('d-none');
                $("#edited_phone,#edited_address,#edited_password").removeClass().addClass("form-control");
                $("#edit_result").removeClass().addClass("text-left alert d-none");
                $("#edit_phone_err,#edited_address_err,#edited_pass_err,#edit_result").text('');
            },
            success: function (response) {

                $('.preloader_ajax').addClass('d-none');
                var result = JSON.parse(response);
                switch (result[0]) {
                    case true:
                        $("#edit_result").removeClass('d-none').addClass('alert-success');
                        $('#edit_result').text('Account Updated');
                        if (result[1].length > 5) {
                            $("#edited_phone").addClass('border border-success');
                        }
                        if (result[2].length > 5) {
                            $("#edited_address").addClass('border border-success');
                        }
                        $('body').on('click', function () {
                            location.reload();
                        })
                        break;

                    case false:
                        if (result[1].length > 5) {
                            $('#edit_phone_err').text(result[1]);
                            $('#edited_phone').addClass("border border-danger");
                        }
                        if (result[2].length > 5) {
                            $('#edited_address_err').text(result[2]);
                            $('#edited_address').addClass("border border-danger");
                        }
                        if (result[3].length > 5) {
                            $('#edited_pass_err').text(result[3]);
                            $('#edited_password').addClass("border border-danger");
                        }
                        break;
                }
            },
        });

    }

}
//change and save user image file

function change_user_img() {
    //reset error msgs
    $("#image_upload_res").removeClass()
        .addClass("d-none");
    // check if user selected any file
    if ($('#fileToUpload').val() == "") {
        $("#image_upload_res").removeClass()
            .addClass("alert alert-danger")
            .text("Please select a file !");
    } else {
        //validate image file
        //check image file type
        if ($("#fileToUpload").val().search(".jpg") > 0 ||
            $("#fileToUpload").val().search(".jpeg") > 0 ||
            $("#fileToUpload").val().search(".png") > 0) {
            //check file size
            if ($('#fileToUpload')[0].files[0].size > 40000) {
                $("#image_upload_res").removeClass()
                    .addClass("alert alert-danger")
                    .text("image file size should be less than 40kb !");
            } else {
                //send file to server
                var file_data = $('#fileToUpload').prop('files')[0];
                var form_data = new FormData();
                form_data.append('file', file_data);
                form_data.append('req_type', 'change user image');
                $.ajax({
                    type: 'POST',
                    url: 'controller.php',
                    contentType: false,
                    processData: false,
                    data: form_data,
                    beforeSend: function () {
                        $('.preloader_ajax').removeClass('d-none');
                    },
                    success: function (response) {

                        var result = JSON.parse(response);
                        switch (result[0]) {
                            case true:
                                window.setTimeout(function () {
                                    $('.preloader_ajax').addClass('d-none');
                                    location.reload();
                                }, 3000);
                                break;
                            case false:
                                $('.preloader_ajax').addClass('d-none');
                                $("#image_upload_res").removeClass()
                                    .addClass("alert alert-danger")
                                    .text(result[1]);
                                break;
                        }
                    }
                });
            }
        } else {
            $("#image_upload_res").removeClass()
                .addClass("alert alert-danger")
                .text("Only jpeg, jpg and png files are allowed !");
        }
    }
}



//online sign up for public and private courses 
//payment-display payment confirmation as PDF 
//show list of signed up public and private courses and finished courses with grades
//-------------------------------------------
//reset new course signup form 
$("#newCourseLink").on("click", function () {
    /* reset course selection form */
    $('#course_category_list').empty().append("<option value='100' selected>Choose...</option>" +
        "<option value='101'>General English</option>" +
        "<option value='104'>Specialised English</option>" +
        "<option value='102'>IELTS</option>" +
        "<option value='103'>TOEFL</option>");
    $('#course_name_list').empty().append("<option selected>Choose...</option>");
    $('#course_level_list').empty().append("<option selected>Choose...</option>");
    $('#signUpFormPrice').text("");
    /* reset credit card form */
    $("#crd-card-form")[0].reset();
    $("#crdt_card_name,#crdt_card_num,#exp_month,#exp_year,#cvv,#pin").removeClass().addClass("form-control form-control_xs").removeAttr("style");


    /* Reset paymnt conf form */
    $('#pymnt_ref,#pymnt_course_name,#pymnt_course_level,#pymnt_amount,#pymnt_date,#pymnt_user_id')
        .text("");
    /* set carousel to first slide- course selection */
    if ($("#paymentCarousel").hasClass("active")) {
        $("#paymentCarousel").removeClass("active");
        $("#signupCarousel").removeClass().addClass("carousel-item active");
        $('#joinAndPayBtn').prop('disabled', true);
    }
    if ($("#pymt_Cnfrm_Carousel").hasClass("active")) {
        $("#pymt_Cnfrm_Carousel").removeClass("active");
        $("#signupCarousel").removeClass().addClass("carousel-item active");
        $('#joinAndPayBtn').prop('disabled', true);
    }
})
//get course names from selected course category
function get_course_names() {
    // set course name list, level list and price empty- set btn to disable
    var selectedOption = $('#course_category_list').val();
    $('#course_name_list').empty();
    $('#course_name_list').append("<option selected>Choose...</option>");
    $('#course_level_list').empty();
    $('#course_level_list').append("<option selected>Choose...</option>");

    $('#signUpFormPrice').empty();
    $('#joinAndPayBtn').prop('disabled', true);
    //check to see that value selected is not null. 100 is null
    if ($('#course_category_list').val() !== "100") {
        $.ajax({
            url: 'controller.php',
            type: 'post',
            data: {
                req_type: "select course title",
                id: selectedOption
            },
            success: function (response) {
                var course_names = JSON.parse(response);
                var row;
                $('#course_name_list').empty();
                $('#course_level_list').empty();
                $('#course_level_list').append("<option selected>Choose...</option>");
                $('#course_name_list').append("<option selected>Choose...</option>");
                for (var i = 0; i < course_names.length; i++) {
                    row = course_names[i];
                    $('#course_name_list').append(
                        "<option>" + row + "</option>"
                    );
                }
            },
        });
    }
}
//get levels list from selected course name
function get_course_levels() {
    //set level list and price empty, -set btn to disable
    $('#course_level_list').empty();
    $('#course_level_list').append("<option selected>Choose...</option>");
    $('#joinAndPayBtn').prop('disabled', true);
    $('#signUpFormPrice').empty();
    var selectedOption = $('#course_name_list').val();
    //check the value is not null. 'Choose...' would be null
    if ($('#course_name_list').val() !== "Choose...") {
        $.ajax({
            url: 'controller.php',
            type: 'post',
            data: {
                req_type: "select course level",
                id: selectedOption
            },
            success: function (response) {
                $('#course_level_list').empty();
                $('#course_level_list').append("<option selected>Choose...</option>");

                var course_level = JSON.parse(response);
                var row;
                for (var i = 0; i < course_level.length; i++) {
                    row = course_level[i];
                    $('#course_level_list').append(
                        "<option>" + row + "</option>"
                    );
                }
            },
        });
    }
}
//get course fees
function get_course_fees() {
    // check to see if level is not null
    if ($('#course_level_list').val() !== "Choose...") {
        // remove signUpFormPrice value
        $('#signUpFormPrice').empty();
        //get the price of the course based on course title and level
        var selectedlevel = $('#course_level_list').val();
        var selectedTitle = $('#course_name_list').val();
        $.ajax({
            url: 'controller.php',
            type: 'post',
            data: {
                req_type: "select course fees",
                level: selectedlevel,
                title: selectedTitle
            },
            success: function (response) {
                $('#signUpFormPrice').empty();
                $('#signUpFormPrice').append(JSON.parse(response));
                $('#joinAndPayBtn').prop('disabled', false);
            },
        });
    } else {
        $('#joinAndPayBtn').prop('disabled', true);
        $('#signUpFormPrice').empty();
    }
}
/* course signup and payment */
function course_payment() {

    $("#payment_result_info").removeClass().addClass("d-none").text(" ");
    var course_name = $("#course_name_list").val();
    var course_level = $("#course_level_list").val();
    var price = $("#signUpFormPrice").text();
    var user_id = $("#h_user_id").val();
    var nameOncard = $("#crdt_card_name").val();
    var cardNum = $("#crdt_card_num").val();
    var exp_month = $("#exp_month").val();
    var exp_year = $("#exp_year").val();
    var cvv = $("#cvv").val();
    var pin = $("#pin").val();
    var _token = $("#profile_token").val();
    //reset card details input fields
    $("#crdt_card_name,#crdt_card_num,#exp_month,#exp_year,#cvv,#pin").removeClass()
        .addClass("form-control form-control_xs");
    // check if all card fields are populated  
    if ((is_form_empty("#crd-card-form", 6) == false)) {
        $.ajax({
            url: 'controller.php',
            type: 'post',
            data: {
                req_type: "make payment for course",
                course_name: course_name,
                course_level: course_level,
                price: price,
                user_id: user_id,
                nameOncard: nameOncard,
                cardNum: cardNum,
                exp_month: exp_month,
                exp_year: exp_year,
                cvv: cvv,
                pin: pin,
                _token: _token
            },
            beforeSend: function () {
                // Show preloader
                $('.preloader_ajax').removeClass('d-none');
            },
            success: function (response) {
                // hide preloader
                $('.preloader_ajax').addClass('d-none');
                var result = JSON.parse(response);
                //display result
                switch (result[0]) {
                    case true:
                        /* display result is success */
                        $('#payment_result_info').append(result[1]).removeClass("d-none").addClass("alert alert-success");
                        /* clear credit card form */
                        $('#crd-card-form')[0].reset();
                        /* set payment confirmation page with info */
                        $('#pymnt_ref').append(result[2]);
                        $('#pymnt_course_name').append($('#course_name_list').val());
                        $('#pymnt_course_level').append($('#course_level_list').val());
                        $('#pymnt_amount').text($('#signUpFormPrice').text());
                        $('#pymnt_date').append(result[3]);
                        $('#pymnt_user_id').append(user_id);
                        /* wait 1 second then show conf page */
                        window.setTimeout(function () {
                            $('#signUpForms_carousel').carousel('next');
                            /* clear course selection carousel */
                            $('#course_category_list,#course_level_list,#course_name_list').append("<option selected>Choose...</option>");
                            $('#signUpFormPrice').empty();
                            /* clear payment result info on creadit card carousel */
                            $("#payment_result_info").removeClass().addClass("d-none").text("");
                        }, 1000);
                        break;
                        // display validation and other backend errors
                    case false:
                        switch (result[1]) {
                            case 'Value of course name is not valid!<br>!':
                                $('#payment_result_info').append(result[1]).removeClass("d-none").addClass("alert alert-danger");
                                window.setTimeout(function () {
                                    $('#course_category_list,#course_level_list,#course_name_list').append("<option selected>Choose...</option>");
                                    $('#signUpFormPrice').empty();
                                    /* clear payment result info on creadit card carousel */
                                    $("#payment_result_info").removeClass().addClass("d-none").text("");
                                    $('#signUpForms_carousel').carousel('prev');
                                    $('#joinAndPayBtn').prop('disabled', true);
                                }, 2000);
                                break;
                            case 'You aleardy signed up for this course and it is not finished!':
                            case 'Error : unable to save payment info.':
                            case 'Error : unable to save user signup info.':
                            case 'Error : unable to update user status.':
                                $('#payment_result_info').append(result[1]).removeClass("d-none").addClass("alert alert-danger");
                                break;
                            case 'Payment transaction failed. Check card details.':
                                $('#payment_result_info').append(result[1]).removeClass("d-none").addClass("alert alert-danger");
                                $("#crdt_card_name,#crdt_card_num,#exp_month,#exp_year,#cvv,#pin")
                                    .addClass("border border-danger");
                                break;
                            case 'refresh':
                                location.reload();
                                break;
                        }
                        break;
                }
                //other validation errors
                if (result[2] == 'Value of course level is not valid!<br>') {
                    $('#payment_result_info').append(result[2]).removeClass("d-none").addClass("alert alert-danger");
                }
                if (result[3] == 'Value of price is not valid!<br>') {
                    $('#payment_result_info').append(result[3]).removeClass("d-none").addClass("alert alert-danger");
                }
                if (result[4] == 'Value of user id is not valid!<br>') {
                    $('#payment_result_info').append(result[4]).removeClass("d-none").addClass("alert alert-danger");
                }
                if (result[5] == "Value of 'Full name' is not valid!<br>") {
                    $('#payment_result_info').append(result[5]).removeClass("d-none").addClass("alert alert-danger");
                    $("#crdt_card_name").addClass("border border-danger");
                }
                if (result[6] == 'Value of card number is not valid!<br>') {
                    $('#payment_result_info').append(result[6]).removeClass("d-none").addClass("alert alert-danger");
                    $("#crdt_card_num")
                        .addClass("border border-danger");
                }
                if (result[7] == 'Value of expire month is not valid!<br>') {
                    $('#payment_result_info').append(result[7]).removeClass("d-none").addClass("alert alert-danger");
                    $("#exp_month")
                        .addClass("border border-danger");
                }
                if (result[8] == 'Value of expire year is not valid!<br>') {
                    $('#payment_result_info').append(result[8]).removeClass("d-none").addClass("alert alert-danger");
                    $("#exp_year")
                        .addClass("border border-danger");
                }
                if (result[9] == 'Value of cvv is not valid!<br>') {
                    $('#payment_result_info').append(result[9]).removeClass("d-none").addClass("alert alert-danger");
                    $("#cvv")
                        .addClass("border border-danger");
                }
                if (result[10] == 'Value of pin is not valid!<br>') {
                    $('#payment_result_info').append(result[10]).removeClass("d-none").addClass("alert alert-danger");
                    $("#pin")
                        .addClass("border border-danger");
                }
                if (result[11] == 'Value of token is not valid!<br>') {
                    $('#payment_result_info').append(result[11]).removeClass("d-none").addClass("alert alert-danger");
                    $("#crdt_card_name,#crdt_card_num,#exp_month,#exp_year,#cvv,#pin")
                        .addClass("border border-danger");
                }
            },
        });
    } else {
        $("#payment_result_info").removeClass("d-none").addClass("alert alert-danger").append("Please enter all card details");
    }
}
// download PDF reciept of the payment for courses
function download_course_payment_pdf() {
    var ref_num = $('#pymnt_ref').text();
    var crs_name = $('#pymnt_course_name').text();
    var crs_level = $('#pymnt_course_level').text();
    var amount = $('#pymnt_amount').text();
    var date = $('#pymnt_date').text();
    var userid = $('#pymnt_user_id').text();
    var pdf_type = "course";
    window.open("inc/pdf-generator.php?ref=" + ref_num +
        "&crsname=" + crs_name +
        "&level=" + crs_level +
        "&amount=" + amount +
        "&date=" + date +
        "&userid=" + userid +
        "&type=" + pdf_type, '_blank');
}
// update list of classes in both desktop and mobile view
function update_class_list() {
    $.ajax({
        url: 'controller.php',
        type: 'post',
        data: {
            req_type: 'get class list',
            user_id: $('#h_user_id').val()
        },
        beforeSend: function () {
            // Show preloader
            $('.preloader_ajax').removeClass('d-none');
        },
        success: function (response) {
            $('.preloader_ajax').addClass('d-none');
            result = JSON.parse(response);
            $('#classListcontent').empty();
            $('#classListcontentMobile').empty();
            var finished = 0;
            var inProgress = 0;
            if (result[0] !== "") {
                for (var i = 0; i < result.length; i++) {
                    inProgress = result[i][8] == 0 ? inProgress + 1 : inProgress;
                    finished = result[i][8] == 1 ? finished + 1 : finished;
                    $('#classListcontent').append(
                        "<tr><td>" + result[i][0] + "</td>" +
                        "<td>" + result[i][1] + "</td>" +
                        "<td>" + result[i][2] + "</td>" +
                        "<td>" + result[i][3] + "</td>" +
                        "<td>" + result[i][4] + "</td>" +
                        "<td>" + result[i][5] + "</td>" +
                        "<td>" + result[i][6] + "</td>" +
                        "<td>" + result[i][7] + "</td>" +
                        (result[i][8] == 0 ? "<td class='text-warning font-weight-bold'>In Progress</td>" : "<td class='text-success font-weight-bold'>Finished</td>") +
                        "<td>" + result[i][9] + "</td>" + "</tr>"
                    );
                    $('#classListcontentMobile').append(
                        "<tr>" +
                        "<td>" + result[i][0] + "</td>" +
                        "<td>" + result[i][2] + "</td>" +
                        "<td>" + (result[i][8] == 0 ?
                            "<td class='text-warning font-weight-bold'>In Progress</td>" :
                            "<td class='text-success font-weight-bold'>Finished</td>") +
                        "</td>" +
                        "<td>" + "<a class='btn btn-primary'id=" +
                        "'hid-pop-" + i + "'" + "onclick ='close_other_pop()'" +
                        "data-toggle='popover'" + "title='Class Details" +
                        "<a>X</a>" + "'" +
                        "data-content ='" + "<b>level</b> : " + result[i][1] + "<br>" +
                        "<b>Duration</b> = " + result[i][3] + "<br>" +
                        "<b>Days</b> = " + result[i][4] + "<br>" +
                        "<b>Time</b> = " + result[i][5] + "<br>" +
                        "<b>Room</b> = " + result[i][6] + "<br>" +
                        "<b>Teacher</b> = " + result[i][7] + "<br>" +
                        "<b>grade</b> = " + result[i][9] + "<br>" +
                        "'" +
                        "data-html='true'" + "data-animation='true'" + ">" + "+" +
                        "</td>" +
                        "</tr>"
                    );
                }
                $('[data-toggle="popover"]').popover();
                $('#curentClassNumber,#curentClassNumber_profile').text(inProgress);
                $('#finishedClassNumber,#finishedClassNumber_profile').text(finished);
            } else {
                $('#curentClassNumber,#curentClassNumber_profile').text(inProgress);
                $('#finishedClassNumber,#finishedClassNumber_profile').text(finished);
            }

        },
    });

}
// update class list teacher
function update_class_list_teacher() {
    $.ajax({
        url: 'controller.php',
        type: 'post',
        data: {
            req_type: 'get class list teacher',
            user_id: $('#h_user_id').val()
        },
        beforeSend: function () {
            // Show preloader
            $('.preloader_ajax').removeClass('d-none');
        },
        success: function (response) {
            $('.preloader_ajax').addClass('d-none');
            result = JSON.parse(response);
            $('#classListcontent').empty();
            $('#classListcontentMobile').empty();
            var finished = 0;
            var inProgress = 0;
            if (result[0] !== "") {
                for (var i = 0; i < result.length; i++) {
                    inProgress = result[i][7] == 0 ? inProgress + 1 : inProgress;
                    finished = result[i][7] == 1 ? finished + 1 : finished;
                    $('#classListcontent').append(
                        "<tr><td>" + result[i][0] + "</td>" +
                        "<td>" + result[i][1] + "</td>" +
                        "<td>" + result[i][2] + "</td>" +
                        "<td>" + result[i][3] + "</td>" +
                        "<td>" + result[i][4] + "</td>" +
                        "<td>" + result[i][5] + "</td>" +
                        "<td>" + result[i][6] + "</td>" +
                        (result[i][7] == 0 ? "<td class='text-warning font-weight-bold'>In Progress</td>" : "<td class='text-success font-weight-bold'>Finished</td>")
                    );
                    $('#classListcontentMobile').append(
                        "<tr>" +
                        "<td>" + result[i][0] + "</td>" +
                        "<td>" + result[i][2] + "</td>" +
                        "<td>" + (result[i][7] == 0 ?
                            "<td class='text-warning font-weight-bold'>In Progress</td>" :
                            "<td class='text-success font-weight-bold'>Finished</td>") +
                        "</td>" +
                        "<td>" + "<a class='btn btn-primary'id=" +
                        "'hid-pop-" + i + "'" + "onclick ='close_other_pop()'" +
                        "data-toggle='popover'" + "title='Class Details" +
                        "<a>X</a>" + "'" +
                        "data-content ='" + "<b>level</b> : " + result[i][1] + "<br>" +
                        "<b>Duration</b> = " + result[i][3] + "<br>" +
                        "<b>Days</b> = " + result[i][4] + "<br>" +
                        "<b>Time</b> = " + result[i][5] + "<br>" +
                        "<b>Room</b> = " + result[i][6] + "<br>" +
                        "'" +
                        "data-html='true'" + "data-animation='true'" + ">" + "+" +
                        "</td>" +
                        "</tr>"
                    );
                }
                $('[data-toggle="popover"]').popover();
                $('#curentClassNumber,#curentClassNumber_profile').text(inProgress);
                $('#finishedClassNumber,#finishedClassNumber_profile').text(finished);
            } else {
                $('#curentClassNumber,#curentClassNumber_profile').text(inProgress);
                $('#finishedClassNumber,#finishedClassNumber_profile').text(finished);
            }

        },
    });
}

//online test reserve and payment
//display payment confirmation as PDF after payment process
//show list of signed up and finished any test with grades 
//------------------------------------------
// download PDF reciept of the payment for test
function download_test_payment_pdf() {
    var ref_num = $('#test_pymnt_ref').text();
    var amount = $('#test_pymnt_amount').text();
    var date = $('#test_pymnt_date').text();
    var user_id = $('#test_pymnt_user_id').text();
    var test_id = $('#test_test_id').text();
    var pdf_type = "test";
    // HERE customize pdf generator class
    window.open("inc/pdf-generator.php?ref=" + ref_num +
        "&testId=" + test_id +
        "&amount=" + amount +
        "&date=" + date +
        "&userid=" + user_id +
        "&type=" + pdf_type, '_blank');
}
//get list of available tests to signup
function get_avail_test() {
    // reset payment form
    $("#NameOnCard,#card_num,#exp-month,#exp-year,#cvv-num,#pin-code").removeClass().addClass("form-control form-control_xs").removeAttr("style");
    $("#testSignUpForm")[0].reset();
    $("#test_payment_result_info").removeClass().addClass("d-none");
    //reset payment confirm page
    $("#test_pymnt_ref,#test_pymnt_amount,#test_pymnt_date,#test_pymnt_user_id,#test_test_id").text("");
    $('#test_signup_payment').carousel(0);
    $.ajax({
        url: 'controller.php',
        type: 'post',
        data: {
            req_type: "get test list"
        },
        success: function (response) {
            var test_names = JSON.parse(response);
            var row;
            $('#test_name_list').empty().append("<option selected>Choose...</option>");
            for (var i = 0; i < test_names.length; i++) {
                row = test_names[i];
                $('#test_name_list').append(
                    "<option value=" + row[0] + "-" + row[2] + ">" + row[1] + "--" + row[3] + "--Price: " + row[2] + "</option>"
                );
            }
        },
    });



}
//signup and pay for new test
function test_payment() {

    //extrect test id and price from value selected
    $comb_string = ($("#test_name_list").children("option:selected").val()).split("-");
    //reset payment and signup result
    $("#test_payment_result_info").removeClass().addClass("d-none").text("");
    //reset test selection border color
    $('#test_name_list').removeClass().addClass("form-control");
    // test to see if paymt form is empty or test has benn selected
    if (is_form_empty('#testSignUpForm', 6) == false && $comb_string.length > 1) {
        $.ajax({
            url: 'controller.php',
            type: 'post',
            data: {
                req_type: "make payment for test",
                user_id: $("#h_user_id").val(),
                test_id: $comb_string[0],
                price: $comb_string[1],
                nameOncard: $("#NameOnCard").val(),
                card_num: $("#card_num").val(),
                exp_month: $("#exp-month").val(),
                exp_year: $("#exp-year").val(),
                cvv: $("#cvv-num").val(),
                pin: $("#pin-code").val(),
                _token: $("#profile_token").val()
            },
            beforeSend: function () {
                // Show preloader
                $('.preloader_ajax').removeClass('d-none');
            },
            success: function (response) {
                $('.preloader_ajax').addClass('d-none');
                var result = JSON.parse(response);
                switch (result[0]) {
                    case true:
                        //show payment result confirmation
                        $('#test_payment_result_info').removeClass().addClass("alert alert-success").text(result[1]);
                        $('#testSignUpForm')[0].reset();
                        $('#NameOnCard,#card_num,#exp-month,#exp-year,#cvv-num,#pin-code').removeClass().addClass("form-control form-control_xs");
                        //set payment confirmation carousel
                        $("#test_pymnt_ref").text(result[2]);
                        $("#test_pymnt_amount").text(result[3]);
                        $("#test_pymnt_date").text([result[4]]);
                        $("#test_pymnt_user_id").text(result[5]);
                        $("#test_test_id").text(result[6]);
                        window.setTimeout(
                            function () {
                                $('#test_signup_payment').carousel("next");
                            }, 1500
                        )
                        // design payment confirmation page and download pdf
                        break;
                    case false:
                        $('#test_payment_result_info').removeClass().addClass("alert alert-danger");
                        var index = result.length;
                        for (var i = 1; i < result.length; i++) {
                            //different erro msg
                            switch (result[i]) {
                                case 'Error:':
                                case 'Value of user id is not valid!<br>':
                                case 'Value of price is not valid!<br>':
                                    location.reload();
                                    break;

                                case 'Database error':
                                case 'You aleardy signed up for this test or test capacity is full!':
                                case 'Error : unable to save payment info.':
                                case 'Error : unable to save user into test list':
                                    $('#test_payment_result_info').append(result[i])
                                    break;

                                case 'Payment transaction failed. Check card details.':
                                case 'Please check bank card information and try again!<br>':
                                    $('#test_payment_result_info').append(result[i])
                                    $("#NameOnCard,#card_num,#exp-month,#exp-year,#cvv-num,#pin-code").removeClass().addClass("form-control form-control_xs border-danger").removeAttr("style");
                                    break;
                                default:
                                    break;
                            }
                        }
                }
            }
        });
    } else {
        //form fields are empty
        $("#test_payment_result_info").removeClass().addClass("alert alert-danger").text("Please select and enter all values");
        // if test is selected
        if ($('#test_name_list').val() == "Choose...") {
            $('#test_name_list').addClass("border border-danger");
        }

    }

}
//show list of signedup tests and its results for user
function get_test_result() {
    $.ajax({
        url: 'controller.php',
        type: 'post',
        data: {
            req_type: 'get test results',
            user_id: $('#h_user_id').val()
        },
        beforeSend: function () {
            // Show preloader
            $('.preloader_ajax').removeClass('d-none');
        },
        success: function (response) {
            $('.preloader_ajax').addClass('d-none');
            result = JSON.parse(response);
            $('#testListcontent').empty();
            $('#testListcontentMobile').empty();
            var finished = 0; //result is published
            var inProgress = 0; //result in progress
            if (result[0] !== "") {
                for (var i = 0; i < result.length; i++) {
                    //set number of pending and results ready number
                    inProgress = result[i][4] == 'pending' ? inProgress + 1 : inProgress;
                    finished = result[i][4] != 'pending' ? finished + 1 : finished;
                    $('#testListcontent').append(
                        "<tr><td>" + result[i][0] + "</td>" +
                        "<td>" + result[i][1] + "</td>" +
                        "<td>" + result[i][2] + "</td>" +
                        "<td>" + result[i][3] + "</td>" +
                        (result[i][4] == 'pending' ? "<td class='text-warning font-weight-bold'>Pending result</td>" : "<td class='text-success font-weight-bold'>Published</td>") +
                        "<td>" + result[i][4] + "</td>" + "</tr>"
                    );
                    $('#testListcontentMobile').append(
                        "<tr>" +
                        "<td>" + result[i][0] + "</td>" +
                        "<td>" + result[i][3] + "</td>" +
                        "<td>" + result[i][4] + "</td>" +
                        "</tr>"
                    );
                }
                $('[data-toggle="popover"]').popover();
                $('#pendingTestResNumber,#pendingTestResult_profile').text(inProgress);
                $('#publishedTestResultNumber,#publishedTestResult_profile').text(finished);
            } else {
                $('#pendingTestResNumber,#pendingTestResult_profile').text(inProgress);
                $('#publishedTestResultNumber,#publishedTestResult_profile').text(finished);
            }
        },
    });
}


//online course certification request and payment-
//display recipt as PDF
//--------------------------------
//get list of availabe certificates 
function get_cert_list() {
    // reset payment form
    $("#cert_NameOnCard,#cert_card_num,#cert_exp-month,#cert_exp-year,#cert_cvv-num,#cert_pin-code").removeClass().addClass("form-control form-control_xs").removeAttr("style");
    $("#cert_req_SignUpForm")[0].reset();
    $("#cert_payment_result_info").removeClass().addClass("d-none");
    //reset payment confirm page
    $("#cert_pymnt_ref,#cert_pymnt_amount,#cert_pymnt_date,#cert_pymnt_user_id,#cert_id").text("");
    $('#certficate_req_payment').carousel(0);
    $.ajax({
        url: 'controller.php',
        type: 'post',
        data: {
            req_type: "get certificate list",
            user_id: $("#h_user_id").val()
        },
        success: function (response) {
            var cert_names = JSON.parse(response);
            var row;
            $('#cert_name_list').empty().append("<option selected>Choose...</option>");
            for (var i = 0; i < cert_names.length; i++) {
                row = cert_names[i];
                $('#cert_name_list').append(
                    "<option value=" + row[0] + ">" + row[1] + "--" + row[3] + "--level: " + row[5] + "--price: " + row[8] + "</option>"
                );
            }
            $("#cert_achieved_profile").append(cert_names.length);
        },
    });

}
//payment for aditional certificate request //HERE fix PAYMENT FORM 
function cert_payment() {
    //extrect test id and price from value selected
    /*     $comb_string = ($("#test_name_list").children("option:selected").val()).split("-");
     */ //reset payment and confirm result
    $("#cert_payment_result_info").removeClass().addClass("d-none").text("");
    //reset cert selection border color
    $('#cert_name_list').removeClass().addClass("form-control");
    // test to see if paymt form is empty or test has benn selected
    //extract price value
    var index = $('#cert_name_list').children("option:selected").text().search("--price: ");
    var price = $('#cert_name_list').children("option:selected").text().substr(index + 9);
    if (is_form_empty('#cert_req_SignUpForm', 6) == false) {
        $.ajax({
            url: 'controller.php',
            type: 'post',
            data: {
                req_type: "make payment for certifcate",
                cert_id: $('#cert_name_list').val(),
                price: price,

                user_id: $('#h_user_id').val(),
                nameOnCard: $('#cert_NameOnCard').val(),
                card_num: $('#cert_card_num').val(),
                exp_month: $('#cert_exp-month').val(),
                exp_year: $('#cert_exp-year').val(),
                cvv: $('#cert_cvv-num').val(),
                pin: $('#cert_pin-code').val(),
                _token: $("#profile_token").val()
            },
            beforeSend: function () {
                // Show preloader
                $('.preloader_ajax').removeClass('d-none');
            },
            success: function (response) {

                $('.preloader_ajax').addClass('d-none');
                var result = JSON.parse(response);
                switch (result[0]) {
                    case true:
                        //show payment result confirmation
                        $('#cert_payment_result_info').removeClass().addClass("alert alert-success").text(result[1]);
                        $('#cert_req_SignUpForm')[0].reset();
                        $('#cert_NameOnCard,#cert_card_num,#cert_exp-month,#cert_exp-year,#cert_cvv-num,#cert_pin-code').removeClass().addClass("form-control form-control_xs");
                        //set payment confirmation carousel
                        $("#cert_pymnt_ref").text(result[2]);
                        $("#cert_pymnt_amount").text(result[3]);
                        $("#cert_pymnt_date").text([result[4]]);
                        $("#cert_pymnt_user_id").text(result[5]);
                        $("#cert_id").text(result[6]);
                        window.setTimeout(
                            function () {
                                $('#certficate_req_payment').carousel("next");
                            }, 1500
                        )
                        // design payment confirmation page and download pdf
                        break;
                    case false:
                        $('#cert_payment_result_info').removeClass().addClass("alert alert-danger");
                        var index = result.length;
                        for (var i = 1; i < result.length; i++) {
                            //different erro msg
                            switch (result[i]) {
                                case 'Error:':
                                case 'Value of user id is not valid!<br>':
                                case 'Value of price is not valid!<br>':
                                    location.reload();
                                    break;

                                case 'Error : unable to save payment info.':
                                case 'Error : unable to save request':
                                    $('#cert_payment_result_info').append(result[i])
                                    break;

                                case 'Payment transaction failed. Check card details.':
                                case 'Please check bank card information and try again!<br>':
                                    $('#cert_payment_result_info').append(result[i])
                                    $("#cert_NameOnCard,#cert_card_num,#cert_exp-month,#cert_exp-year,#cert_cvv-num,#cert_pin-code").removeClass().addClass("form-control form-control_xs border-danger").removeAttr("style");
                                    break;
                                default:
                                    break;
                            }
                        }
                }
            }
        });
    } else {
        //form fields are empty
        $("#cert_payment_result_info").removeClass().addClass("alert alert-danger").text("Please select and enter all values");
        // if certificate is selected
        if ($('#cert_name_list').val() == "Choose...") {
            $('#cert_name_list').addClass("border border-danger");
        }

    }

}
//download certificate request payment pdf
function download_cert_payment_pdf() {
    var ref_num = $('#cert_pymnt_ref').text();
    var amount = $('#cert_pymnt_amount').text();
    var date = $('#cert_pymnt_date').text();
    var user_id = $('#cert_pymnt_user_id').text();
    var cert_id = $('#cert_id').text();
    var pdf_type = "certificate";
    // HERE customize pdf generator class
    window.open("inc/pdf-generator.php?ref=" + ref_num +
        "&cert_id=" + cert_id +
        "&amount=" + amount +
        "&date=" + date +
        "&userid=" + user_id +
        "&type=" + pdf_type, '_blank');
}