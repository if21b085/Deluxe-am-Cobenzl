<?php
    session_start();
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
    if(isset($_SESSION['username'])) {
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
                        <input type="date" id="Abreise" placeholder="Anreise" name="Abreise"><br>
                        <?php 
                            if(in_array("no Abreise", $errors))
                                echo '<p class="text-danger">*Kein Abreisedatum</p>';
                            if(in_array("dates equal", $errors))
                                echo '<p class="text-danger">*An- und Abreise dürfen nicht am selben Tag sein!</p>';
                        ?>
                        <div style="inline"> 
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
                        </div>
                    </fieldset>
                    <input type="submit" name="submitted" value="Reserviern">     
                   </form>
    </div>
<?php
    }else{
?>
            <div style="text-align:center">
                <p>Du bist nicht eingeloggt</p>
                <a href="?site=login">Hier einloggen!</a>
            </div>
<?php
    }
?>