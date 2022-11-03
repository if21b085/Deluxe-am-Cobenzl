<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="stylesheet.css">
    <style>
    </style>
    <title>Login</title>
</head>
<body>
    <div class="top">
        <h1><a href=index.html><img src=images/logo.jpeg alt=Logo></a>
        HOTEL Deluxe am Cobenzl</h1>
        <div class="login">
            <button onclick="document.location='login.html'">LOGIN</button>
        </div>
    </div>
    <div><?php include 'navbar.php';?></div>
    <div style="text-align:center">
        <h1 >LOGIN</h1>
        <form action="/action_page.php" target=_blank>
            <label for="uname">Username:</label>
            <input type="text" id="uname" placeholder="Username">
            <label for="pword">Password:</label>
            <input type="password" id="pword" placeholder="Password" method="post"><br><br>
            <input type="button" onclick="alert('Success!')" value="Login"><br>
            Noch kein Benutzerkonto?<br>
            <a href="register.html">Hier registrieren!</a>
        </form>
    </div>
    <div class="bottom" style="position:fixed">
        Hotel Deluxe am Cobenzl<br>
        Am Cobenzl 45<br>
        1190 Wien<br>
        <br>
        Tel.: +43 0 323 43<br>
        Email: <a href="mailto:office@hoteldeluxe-cobenzl.at">office@hoteldeluxe-cobenzl.at</a><br>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>