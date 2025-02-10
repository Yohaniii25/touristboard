$(document).ready(function () {
    $('#btn_login').on('click', function (e) {
        e.preventDefault();

        var username = $('#username').val().trim();
        var password = $('#password').val();

        // Validate username and password
        if (username === '' || password === '') {
            $('.err-msg').html('Both fields are required.');
            return;
        }

        // $.ajax({
        //     type: 'POST',
        //     url: '/touristboard/admin/classes/LoginController.php', 
        //     data: {
        //         USER_LOGIN: 1,
        //         username: username,
        //         password: password
        //     },
        //     success: function (response) {
        //         console.log('response', response);
        //         var res = $.parseJSON(response);

        //         if (res.status == '1') {
        //             location.replace('/touristboard/admin/index.php'); 
        //         } else if (res.status == '0') {
        //             $('.err-msg').html(res.message);
        //         }
        //     }
        // });

        $.ajax({
            type: 'POST',
            url: '/touristboard/admin/classes/LoginController.php',
            data: {
                USER_LOGIN: 1,
                username: username,
                password: password
            },
            success: function (response) {
                console.log('AJAX Success - Raw Response:', response);
            
                // Check if response is already an object
                var res = (typeof response === 'object') ? response : $.parseJSON(response);
            
                console.log('Parsed JSON:', res);
            
                if (res.status == '1') {
                    console.log('Login success, redirecting...');
                    location.replace('/touristboard/admin/index.php');
                } else if (res.status == '0') {
                    $('.err-msg').html(res.message);
                }
            },
            
        });
        
    });
});
