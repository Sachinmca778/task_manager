$(document).ready(function() {
    $('#login-form').submit(function(e) {
        e.preventDefault();

        var username = $('#login-username').val();
        var password = $('#login-password').val();

        $.ajax({
            url: 'http://localhost/cake/users/login',
            type: 'POST',
            data: {
                username: username,
                password: password
            },
            success: function(data) {
                // Handle the response from the server
                console.log(data);
                window.location.href = 'http://localhost/cake/tasks';

            },
            error: function(jqXHR, textStatus, errorThrown) {
                // Handle the error
            }
        });
    });
});