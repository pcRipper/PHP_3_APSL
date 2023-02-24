<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=yes, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" type="text/css" href="templates/css/login.css" />

    <title><?php echo $title ?></title>
</head>
<body>

    <form action="/db_access/login" method="post" id="main">
        <input type="text" name="login" placeholder="Email">
        <input type="password" name="pass" placeholder="Password">

        <button type="button" onclick="redirect('/db_access/login')">Log in</button>
        <button type="button" onclick="redirect('/db_access/registrate')">Register</button>

        <a href = "/restore_password">restore password</a>
    </form>

    <script>
        function redirect(path){
            var form = document.getElementById("main");
            form.action = path;
            form.submit();
        }
    </script>
</body>
</html>
