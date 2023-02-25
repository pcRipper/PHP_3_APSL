<?php
$head = "
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, user-scalable=yes, initial-scale=1.0'>
    <meta http-equiv='X-UA-Compatible' content='ie=edge'>

    <link rel='stylesheet' type='text/css' href='templates/css/restorePassword.css' />

    <title>$title</title>
</head>
";
$body = "
<body>
    <form action='/restore-password/send-new-password' method='post' id='main'>
        
        <input type='text' name='email' value='$email' style = 'display:none;'>
        <input  type='text' name='new_password' placeholder='New password'>
        <input  type='text' name='new_password_repeat' placeholder='Repeat new password'>
        <button type='submit'>Update</button>

    </form>
</body>
";

echo "<!doctype html>$head$body<html lang='en'></html>";
