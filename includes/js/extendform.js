$(document).ready(function(){
        $('input[type="checkbox"]').click(function(){
            if($(this).is(':checked')){
                $("#database").attr('disabled', false);
                $("#database").attr('required', true);
                $("#hostname").attr('disabled', false);
                $("#hostname").attr('required', true);
                $("#username").attr('disabled', false);
                $("#username").attr('required', true);
                $("#password").attr('disabled', false);
                $("#password").attr('required', true);
            } else {
                $("#database").attr('disabled', true);
                $("#database").attr('required', false);
                $("#hostname").attr('disabled', true);
                $("#hostname").attr('required', false);
                $("#username").attr('disabled', true);
                $("#username").attr('required', false);
                $("#password").attr('disabled', true);
                $("#password").attr('required', false);
            }
        });
    });
