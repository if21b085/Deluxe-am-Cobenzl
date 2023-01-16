<?php
    $errors = [];

if (isset($_POST['submitted'])) {
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
    if (!empty($Anreise) && !empty($Abreise) && $Anreise == $Abreise) {
        $errors[] = "dates equal";
    }
    if (!empty($Anreise) && !empty($Abreise) && empty($errors)) {
      /* require_once('dbaccess.php');
        $conn = new mysqli($host, $user, $password, $database);
        $sql = "SELECT COUNT(*) FROM reservations
                WHERE (von >= $Anreise AND von < $Abreise)
                OR (bis > $Anreise AND bis <= $Abreise)            //is sich nimmer ganz ausggangen, counter(*) in variable zu übertragen
                OR (von <= $Anreise AND bis >= $Abreise)";
        $result = $conn->query($sql);
        $count = 0; 
        while ($row = $result->fetch_array()) {
        $count = $row['COUNT(*)'];}
        var_dump('$count');*/
        if ($count < 10) { 
            $secs = strtotime($Abreise) - strtotime($Anreise);
            $days = $secs / 86400;
            $bar = $days * 120 + ($days * $_POST['Parkplatz'] * 5) + ($days * $_POST['Haustier'] * 10) + ($days * $_POST['Haustier'] * 10) + ($days * $_POST['breakfast'] * 30);
            require_once('dbaccess.php'); //to retrieve connection details
            $db_obj = new mysqli($host, $user, $password, $database); //Datenbankverbindung aufbauen
            $sql = "INSERT INTO `reservations` (`username`, `datum`, `von`, `bis`, `parkplatz`, `frühstück`, `haustier`, `Preis`)VALUES (?, ?, ?, ?, ?, ?, ?, ?)"; //SQL-Statement erstellen
            $stmt = $db_obj->prepare($sql); //SQL-Statement „vorbereiten”
            $stmt->bind_param("ssssiiii", $uname, $datum, $von, $bis, $park, $break, $pet, $price); //Parameter binden
            $uname = $_SESSION['uname'];
            $datum = date('Y-m-d');
            $von = $_POST['Anreise'];
            $bis = $_POST['Abreise'];
            $park = $_POST['Parkplatz'];
            $break = $_POST['breakfast'];
            $pet = $_POST['Haustier'];
            $price = $bar; //Variablen mit Werte versehen
            $stmt->execute(); //Statement ausführen
            $stmt->close();
            $db_obj->close();
            echo 'Erfolgreich reserviert!';
        } else {
            echo 'Zimmer vergeben! Bitte anderen Zeitraum angeben!';
        }


    }
}
    if(isset($_SESSION['username']) && $_SESSION["username"]=='gast') {
    ?>
    <div  style="text-align:center">
        <form id="reservation" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?site=rooms" method="post">
                    <fieldset>
                        <legend><strong>Zimmerreservierung(120€/Tag)</strong></legend>
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
                        <select id="breakfast" name="breakfast" form="reservation">
                            <option value="1">mit</option>
                            <option value="0">ohne</option>
                        </select>
                        <label for="breakfast">Frühstück(30€/Tag)</label>
                        <select id="Parkplatz" name="Parkplatz" form="reservation">
                            <option value="1">mit</option>
                            <option value="0">ohne</option>
                        </select>
                        <label for="parkplatz">Parkplatz(5€/Tag)</label>
                        <select id="Haustier"  name="Haustier" form="reservation">
                            <option value="1">mit</option>
                            <option value="0">ohne</option>
                        </select>
                        <label for="Haustier">Haustier(10€/Tag)</label>
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