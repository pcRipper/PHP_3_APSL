<!doctype html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, user-scalable=yes, initial-scale=1.0'>
    <meta http-equiv='X-UA-Compatible' content='ie=edge'>

    <link rel='stylesheet' type='text/css' href='templates/css/restorePassword.css' />

    <title>$title</title>
</head>
<body>
    <form action='/mediator/restore-password/update-password' method='post' id='main'>
        
        <input type='text' name='email' value='<?php echo $email ?>' style = 'display:none;'>
        <input  type='text' name='new_password' placeholder='New password'>
        <input  type='text' name='new_password_repeat' placeholder='Repeat new password'>
        <button type='button' onclick='redirect()'>Update</button>

    </form>
    <script>

        function redirect(){
            var input = document.querySelectorAll('body > form > input');
            
            if(input[1].value == input[2].value)
            {
                form.submit();
            }
            else
            {
                alert("Passwords do not match");
            }
        }

    </script>
</body>
</html>
