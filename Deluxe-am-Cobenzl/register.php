<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="stylesheet.css">
    <title>Register</title>
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
    <div  style="text-align:center">
        <h2 >REGISTRIERUNG</h2>
        <div class="row >
        <form action="/action_page.php" target=_blank>

            <div class="col-sm-6">
            <fieldset>
                <legend><strong>Benutzer Daten:</strong></legend>
                <label for="uname">*Username:</label>
                <input type="text" id="uname" placeholder="Username"><br>
                <label for="pword">*Password:</label>
                <input type="password" id="pword" placeholder="Password" method="post"><br>
                <label for="pword">*Password-Wiederholung:</label>
                <input type="password" id="pword" placeholder="Password" method="post"><br>
                <label for="email">*Enter your email:</label>
                <input type="email" id="email" name="email">
            </fieldset>
            </div>
            <div class="col-sm-6">
            <fieldset>
                <legend><strong>Persönliche Daten:</strong></legend>
                <label for="anrede">*Anrede:</label>
                <select id="anrede" name="anrede">
                    <option value="waehlen">bitte wählen</option>
                    <option value="frau">Frau</option>
                    <option value="herr">Herr</option>
                </select><br><br>

                <label for="vorname">*Vorname:</label>
                <input type="text" id="vorname" placeholder="Vorname"><br><br>

                <label for="nachname">*Nachname:</label>
                <input type="text" id="nachname" placeholder="Nachname"><br>
            </fieldset>
            </div>
            <div class="col-12">
                <input type="checkbox" id="agb" name="agb" value="agb">
                <label id="agb" for="agb"> Ich bin damit einverstanden, dass diese Daten zur Anmeldung benutzt werden.</label><br>
                <input type="button" onclick="alert('Success!')" value="anmelden"><br><br><br>
            </div>
        </form>
    </div>



    
    <div class="bottom">
        <br>
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
