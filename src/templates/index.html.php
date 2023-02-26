<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=yes, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" type="text/css" href="templates/css/login.css" />

    <title></title>
</head>
<body>

    <form action="" method="post" id="main">
        <input type="text" name="login" placeholder="Email">
        <input type="password" name="password" placeholder="Password">

        <button type="button" onclick="redirect('/mediator/login')">Log in</button>
        <button type="button" onclick="redirect('/mediator/registrate')">Register</button>

        <a href = "/restore-password">restore password</a>
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
