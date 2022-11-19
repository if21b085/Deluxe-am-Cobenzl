<?php
    session_start();
    $errors = [];
    if(!isset($_SESSION['username'])) {
        if(isset($_POST['submitted'])) {
            $pword;
            $pword2;
            if (!isset($_POST["uname"]) || empty($_POST["uname"])) {
                $errors[] = "no uname";
            }
            if (!isset($_POST["email"]) || empty($_POST["email"])) {
                $errors[] = "no email";
            }
            if (!isset($_POST["pword"]) || empty($_POST["pword"])) {
                $errors[] = "no password";
            } else {
                $pword = $_POST["pword"];
            }
            if (!isset($_POST["pword2"]) || empty($_POST["pword2"])) {
                    $errors[] = "no password2";
            } else {
                $pword2 = $_POST["pword2"];
            }
            if(!empty($pword)&&!empty($pword2)&& $pword!=$pword2) {
                $errors[] = "passwords not equal";
            }
            if (!isset($_POST["vname"]) || empty($_POST["vname"])) {
                $errors[] = "no vname";
            }
            if (!isset($_POST["nname"]) || empty($_POST["nname"])) {
                $errors[] = "no nname";
            }
            if (!isset($_POST["agb"]) || empty($_POST["agb"])) {
                $errors[] = "no agb";
            }
        }
    ?>
    <div  style="text-align:center">
        <h2 >REGISTRIERUNG</h2>
        <div >
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?site=register" method="post">
            <div class="row">
                <div class="col-sm-6">
                    <fieldset>
                        <legend><strong>Benutzer Daten:</strong></legend>
                        <label for="uname">*Username:</label>
                        <input type="text" id="uname" placeholder="Username" name="uname"><br>
                        <?php 
                            if(in_array("no uname", $errors))
                                echo '<p class="text-danger">*Kein Benutzername</p>';
                        ?>
                        <label for="pword">*Password:</label>
                        <input type="password" id="pword" placeholder="Password" name="pword"><br>
                        <?php 
                            if(in_array("no password", $errors))
                                echo '<p class="text-danger">*Kein Kennwort</p>';
                        ?>

                        <label for="pword2">*Password-Wiederholung:</label>
                        <input type="password" id="pword2" placeholder="Password" name="pword2"><br>
                        <?php 
                            if(in_array("no password2", $errors))
                                echo '<p class="text-danger">*Keine Kennwortwiederholung</p>';
                            if(in_array("passwords not equal", $errors))
                                echo '<p class="text-danger">*Kennwörter nicht gleich!</p>';
                        ?>

                        <label for="email">*Enter your email:</label>
                        <input type="email" id="email" name="email">
                        <?php 
                            if(in_array("no email", $errors))
                                echo '<p class="text-danger">*Keine E-mailadresse</p>';
                        ?>
                    </fieldset>
                </div>
                <div class="col-sm-6">
                    <fieldset>
                        <legend><strong>Persönliche Daten:</strong></legend>
                        <label for="anrede">Anrede:</label>
                        <select id="anrede">
                            <option value="waehlen">bitte wählen</option>
                            <option value="frau" name="anrede">Frau</option>
                            <option value="herr" name="anrede">Herr</option>
                        </select><br><br>
                        <label for="vorname">*Vorname:</label>
                        <input type="text" id="vorname" name="vname" placeholder="Vorname"><br>
                        <?php 
                            if(in_array("no vname", $errors))
                                echo '<p class="text-danger">*Kein Vorname</p>';
                        ?>
                        <label for="nachname">*Nachname:</label>
                        <input type="text" id="nachname" name="nname" placeholder="Nachname"><br>
                        <?php 
                            if(in_array("no nname", $errors))
                                echo '<p class="text-danger">*Kein Nachname</p>';
                        ?>
                    </fieldset>
                </div>
                <div class="col-12">
                    <input type="checkbox" id="agb" name="agb" value="agb">
                    <label id="agb" for="agb"> Ich bin damit einverstanden, dass diese Daten zur Anmeldung benutzt werden.</label><br>
                    <?php 
                            if(in_array("no agb", $errors))
                                echo '<p class="text-danger">*AGB muss akzeptiert werden!</p>';
                        ?>
                    <input type="submit" name="submitted" value="Anmelden"><br><br><br>
                </div>
            </div>
        </form>
    </div>
    </div>
<?php
}else  if($_SESSION["username"]=='gast'){
    if(isset($_POST['submitted'])) {
        $pword;
        $pword2;
        if (!isset($_POST["uname"])) {
            $errors[] = "no uname";
        }
        if (!isset($_POST["email"])) {
            $errors[] = "no email";
        }
        if (!isset($_POST["pword"]) || $_POST["pword"] != "gast") {
            $errors[] = "old password";
        } else {
           $pword = $_POST["pword"];
        }
        if (!isset($_POST["pword2"]) ) {
                $errors[] = "no password2";
        } else {
            $pword2 = $_POST["pword2"];
        }
        if (!isset($_POST["vname"])) {
            $errors[] = "no vname";
        }
        if (!isset($_POST["nname"])) {
            $errors[] = "no nname";
        }
        if (!isset($_POST["agb"]) || empty($_POST["agb"])) {
            $errors[] = "no agb";
        }
    }
?>
    <div  style="text-align:center">
        <h2 >Daten bearbeiten</h2>
        <div >
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?site=register" method="post">
            <div class="row">
                <div class="col-sm-6">
                    <fieldset>
                        <legend><strong>Benutzer Daten:</strong></legend>
                        <label for="uname">*Username:</label>
                        <input type="text" id="uname" placeholder="Gast" name="uname"><br>
                        <?php 
                            if(in_array("no uname", $errors))
                                echo '<p class="text-danger">*Kein Benutzername</p>';
                        ?>
                        <label for="pword">*Altes Password:</label>
                        <input type="password" id="pword" placeholder="Password" name="pword"><br>
                        <?php 
                            if(in_array("old password", $errors))
                                echo '<p class="text-danger">*Altes Kennwort eingeben</p>';
                        ?>

                        <label for="pword2">*Neues Password:</label>
                        <input type="password" id="pword2" placeholder="Password" name="pword2"><br>
                        <?php 
                            if(in_array("no password2", $errors))
                                echo '<p class="text-danger">*Kein neues Kennwort</p>';
                        ?>

                        <label for="email">*Enter your email:</label>
                        <input type="email" id="email" name="email" placeholder="gast@gmail.com">
                        <?php 
                            if(in_array("no email", $errors))
                                echo '<p class="text-danger">*Keine E-mailadresse</p>';
                        ?>
                    </fieldset>
                </div>
                <div class="col-sm-6">
                    <fieldset>
                        <legend><strong>Persönliche Daten:</strong></legend>
                        <label for="anrede">Anrede:</label>
                        <select id="anrede">
                            <option value="waehlen">bitte wählen</option>
                            <option value="frau" name="anrede">Frau</option>
                            <option value="herr" name="anrede">Herr</option>
                        </select><br><br>
                        <label for="vorname">*Vorname:</label>
                        <input type="text" id="vorname" name="vname" placeholder="Max"><br>
                        <?php 
                            if(in_array("no vname", $errors))
                                echo '<p class="text-danger">*Kein Vorname</p>';
                        ?>
                        <label for="nachname">*Nachname:</label>
                        <input type="text" id="nachname" name="nname" placeholder="Mustermann"><br>
                        <?php 
                            if(in_array("no nname", $errors))
                                echo '<p class="text-danger">*Kein Nachname</p>';
                        ?>
                    </fieldset>
                </div>
                <div class="col-12">
                    <input type="checkbox" id="agb" name="agb" value="agb">
                    <label id="agb" for="agb">Änderung bestätigen</label><br>
                    <?php 
                            if(in_array("no agb", $errors))
                                echo '<p class="text-danger">*Änderung muss bestätigt werden!</p>';
                        ?>
                    <input type="submit" name="submitted" value="Absenden"><br><br><br>
                </div>
            </div>
        </form>
    </div>
    </div>
<?php
}
?>