// app/webroot/js/register.js

$(document).ready(function() {
    $('#register-form').submit(function(e) {
        e.preventDefault();

        var username = $('#register-username').val();
        var password = $('#register-password').val();

        $.ajax({
            url: 'http://localhost/cake/users/register',
            type: 'POST',
            data: {
                username: username,
                password: password
            },
            success: function(data) {
                // Handle the response from the server
                console.log(data);
                window.location.href = 'http://localhost/cake/users/login';
            },
            error: function(jqXHR, textStatus, errorThrown) {
                // Handle the error
            }
        });
    });
});