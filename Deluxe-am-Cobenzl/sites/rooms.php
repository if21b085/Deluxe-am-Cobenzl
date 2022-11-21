<?php
    $errors = [];

    if(isset($_POST['submitted'])) {
        $Anreise;
        $Abreise;
        if (!isset($_POST["Anreise"]) || empty($_POST["Anreise"])) {
            $errors[] = "no Anreise";
        } else {
            $Anreise = $_POST["Anreise"];
        }
        if (!isset($_POST["Abreise"]) || empty($_POST["Abreise"])) {
                $errors[] = "no Abreise";
        } else {
            $Abreise = $_POST["Abreise"];
        }
        if(!empty($Anreise)&&!empty($Abreise)&& $Anreise==$Abreise) {
            $errors[] = "dates equal";
        }
    }
    if(isset($_SESSION['username']) && $_SESSION["username"]=='gast') {
    ?>
    <div  style="text-align:center">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?site=rooms" method="post">
                    <fieldset>
                        <legend><strong>Zimmerreservierung</strong></legend>
                        <label for="Anreise">*Anreisedatum:</label>
                        <input type="date" id="Anreise" placeholder="Anreise" name="Anreise"><br>
                        <?php 
                            if(in_array("no Anreise", $errors))
                                echo '<p class="text-danger">*Kein Anreisedatum</p>';
                        ?>

                        <label for="Abreise">*Abreisedatum:</label>
                        <input type="date" id="abreise" placeholder="Anreise" name="Abreise"><br><br>
                        <?php 
                            if(in_array("no Abreise", $errors))
                                echo '<p class="text-danger">*Kein Abreisedatum</p>';
                            if(in_array("dates equal", $errors))
                                echo '<p class="text-danger">*An- und Abreise dürfen nicht am selben Tag sein!</p>';
                        ?>
                        <div style="display:inline-block"> 
                        <select id="breakfast">
                            <option value="with" name="breakfast">mit</option>
                            <option value="without" name="breakfast">ohne</option>
                        </select>
                        <label for="breakfast">Frühstück</label>
                        <select id="Parkplatz">
                            <option value="with" name="Parkplatz">mit</option>
                            <option value="without" name="Parkplatz">ohne</option>
                        </select>
                        <label for="parkplatz">Parkplatz</label>
                        <select id="Haustier">
                            <option value="with" name="Haustier">mit</option>
                            <option value="without" name="Haustier">ohne</option>
                        </select>
                        <label for="Haustier">Haustier</label>
                        </div>
                    </fieldset>
                    <input type="submit" name="submitted" value="Reserviern">     
                   </form>
    </div>
<?php
    }else{
?>
            <div style="text-align:center">
                <p>Du bist nicht als gast eingeloggt</p>
                <a href="?site=login">Hier einloggen!</a>
            </div>
<?php
    }
?>