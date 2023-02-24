<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=yes, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title ?></title>
</head>
<body>
    <h1>If you see this page an error occured with email sending.</h1>
    <form action="/restore-password/new-password" method="post" id="main">
        <button type="submit">This is your link for password restore</a>
        <input type="text" name="hash" value="<?php echo $hash ?>" style="display:none;">
    </form>

    <p>Error details : <?php echo $error ?></p>

</body>
</html>