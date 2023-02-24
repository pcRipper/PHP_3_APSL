<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=yes, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" type="text/css" href="templates/css/restorePassword.css" />

    <title><?php echo $title ?></title>
</head>
<body>

    <form action="restore-password/send" method="post" id="main">
        <input type="text" name="login" placeholder="Your email">
        <button type="submit">Send verification mail</button>
    </form>

</body>
</html>