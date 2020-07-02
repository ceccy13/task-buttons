
<!--Document On Ready-->
$(document).ready(function() {

    /*Page Index*/
    $('input[name="btn_delete"]').on('click', function(){
            return confirm('Do You Want To Remove This Button?');
        }
    );
    /*Page Index*/

    /*Create, Edit*/
    $('#select-color').change(function(){
        var color = $("#select-color option:selected").attr("color");
        $('#select-color').css("color", color);
    });

    var color = $("#select-color option:selected").attr("color");
    $('#select-color').css("color", color);
    /*Create, Edit*/

    /*Header Include*/
    var title = $("#title").val().trim();
    switch(title) {
        case 'dashboard':
            $('li:contains("Dashboard")').addClass('active');
            $('#page_title').text('Dashboard');
            break;
        case 'buttons':
            $('li:contains("Buttons Customize")').addClass('active');
            $('#page_title').text('Buttons Customize');
            break;
        case 'create_button':
            $('li:contains("Create Button")').addClass('active');
            $('#page_title').text('Create Button');
            break;
        case 'edit_button':
            $('li:contains("Edit Button")').addClass('active');
            $('#page_title').text('Edit Button');
            break;
        default:
        // code block
    }
    /*Header Include*/

    /*Selected Page*/
    $('div span a').removeClass('mc-selected-page');
    $('div').find('span:nth-child(1)').find('a').addClass('mc-selected-page');

    $('div span a').on('click', function(){
            $('div span a').removeClass('mc-selected-page');
            $(this).addClass('mc-selected-page');
        }
    );
    /*Selected Page*/


    /*Validate Form Buttons*/

    $("#form-btn").validate({
        rules: {
            title: {
                required: true,
                minlength: 2,
                maxlength: 50
            },
            link: {
                required: true,
                maxlength: 100
            },
            color_id: {
                required: true,
            }
        },
        messages: {
            title: {
                required: "The field is required",
                minlength: "The field must be at least 3 characters",
                maxlength: "The field may not be greater than 50 characters"
            },
            link: {
                required: "The field is required",
                maxlength: "The field may not be greater than 50 characters"
            },
            color_id: {
                required: "The field is required",
            },
        },
        errorPlacement: function (error, element) {
            $(element).removeClass("is-valid");
            $(element).addClass("is-invalid");
            $(element).next('div').html($(error).html());
        },
        success: function(error, element) {
            $(element).removeClass("is-invalid");
            $(element).addClass("is-valid");
        },
        submitHandler: function (form) {
            form.submit();

        }
    });
    /*Validate Form Buttons*/

});
<!--Document On Ready-->

<!--Document On Load-->
$(window).on('load', function () {
    /*Index*/
    $("#success").fadeOut(5000).hide(0);
    /*Index*/

});
<!--Document On Load-->




