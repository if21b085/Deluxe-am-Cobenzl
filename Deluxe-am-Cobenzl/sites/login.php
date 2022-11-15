<?php
    $errors = [];
    $login = [];
    if(isset($_POST['submitted'])) {
        $pword;
        $uname;
        if (!isset($_POST["uname"]) || empty($_POST["uname"])) {
            $errors[] = "no uname";
        }else{
            $uname = $_POST["uname"];
        }
        if (!isset($_POST["pword"]) || empty($_POST["pword"])) {
            $errors[] = "no password";
        } else {
            $pword = $_POST["pword"];
        }
        if (!empty($_POST["pword"])&&!empty($_POST["uname"])&&$_POST["uname"] == "gast"&&$_POST["pword"]=="gast"){
            $login[] = "login"; 
        }
    }
?>
    <div style="text-align:center">
        <h1 >LOGIN</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?site=login"  method="post">
            <label for="uname">Username:</label>
            <input type="text" id="uname" name="uname" placeholder="Username">
            <?php 
                    if(in_array("no uname", $errors))
                        echo '<p class="text-danger">*Kein Benutzername</p>';
            ?>
            <label for="pword">Password:</label>
            <input type="password" id="pword" placeholder="Password" name="pword"><br>
            <?php 
                    if(in_array("no password", $errors))
                        echo '<p class="text-danger">*Kein Kennwort</p>';
                    if(in_array("login", $login))
                        echo '<p class="text-success">Willkommen Gast!</p>';
            ?>
            <input type="submit" name="submitted" value="Login"><br>
            Noch kein Benutzerkonto?<br>
            <a href="sites/register.php">Hier registrieren!</a>
        </form>
    </div>