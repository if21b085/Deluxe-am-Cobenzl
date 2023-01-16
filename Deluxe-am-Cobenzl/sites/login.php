<?php
    function isSession() {
        return isset($_SESSION["username"]);
    }
    $errors = [];
if (isset($_POST['submitted'])) {
  $tippedpword;
  $tippeduname;
  if (!isset($_POST["uname"]) || empty($_POST["uname"])) {
    $errors[] = "no uname";
  } else {
    $tippeduname = $_POST["uname"];
  }
  if (!isset($_POST["pword"]) || empty($_POST["pword"])) {
    $errors[] = "no password";
  } else {
    $tippedpword = $_POST["pword"];
  }
  if (isset($_POST["uname"]) && !empty($_POST["uname"]) && isset($_POST["pword"]) && !empty($_POST["pword"])) {
    if ($_POST["uname"] == "gast" && $_POST["pword"] == "gast") {
      $_SESSION["username"] = $_POST["uname"];
      $_SESSION["uname"] = 'gast';
    } else if ($_POST["uname"] == "admin" && $_POST["pword"] == "admin") {
      $_SESSION["username"] = $_POST["uname"];
      $_SESSION["uname"] = 'admin';
    } else {

      require_once('dbaccess.php'); //to retrieve connection details
      $conn = new mysqli($host, $user, $password, $database); //Datenbankverbindung aufbauen
      if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }
      $tippeduname = $_POST["uname"];
      $sql = "SELECT password FROM guests WHERE username = '$tippeduname'";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();
      $hashed_password = $row['password'];
      /*$stmt = $conn->prepare("SELECT password FROM guests WHERE username = ?");
      $stmt->bind_param("s", $tippeduname);
      $stmt->execute();                                                               //prepared statement hat leider nicht funktioniert
      var_dump($_POST["uname"]);
      $result = $stmt->bind_result($hashed_password);
      var_dump($hashed_password);
      */
      //var_dump($hashed_password, $tippedpword, $tippeduname);
      if (password_verify($tippedpword, $hashed_password)) {
        $_SESSION["username"] = "gast"; //role ist gast
        $_SESSION["uname"] = $tippeduname;
      } else {
        echo "username not found";
      }
    }
  }
}
?>
<?php
    if (isSession()) {
?>
        <div style="text-align:center">
        <p>Hallo, Du bist angemeldet als <?= $_SESSION["uname"]; ?>.</p>

        
        </div>
<?php
    if($_SESSION["username"]=='gast'){
?>
        


  <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 280px;">
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="?site=rooms" class="nav-link" aria-current="page">
          <svg class="bi pe-none me-2" width="16" height="16"></svg>
          Zimmer reserviern
        </a>
      </li>
      <li>
        <a href="?site=register" class="nav-link text-white">
          <svg class="bi pe-none me-2" width="16" height="16"></svg>
          Daten bearbeiten
        </a>
      </li>
      <li>
        <a href="?site=bookings" class="nav-link text-white">
          <svg class="bi pe-none me-2" width="16" height="16"></svg>
          Meine Reservierungen
        </a>
      </li>
      <li style="text-align:center">     
      <form method="post" class="">
        <input type="submit" name="logout" value="Abmelden">
    </form>
      </li>
    </ul>
    <br>
  </div>
<?php
    }else if($_SESSION["username"]=='admin'){
?>
        <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 280px;">
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="?site=upload" class="nav-link" aria-current="page">
          <svg class="bi pe-none me-2" width="16" height="16"></svg>
          Newsbeitrag hochladen
        </a>
      </li>
      <li>
        <a href="?site=bookings" class="nav-link text-white">
          <svg class="bi pe-none me-2" width="16" height="16"></svg>
          Reservierungen einsehen
        </a>
      </li>
      <li style="text-align:center">     
      <form method="post" class="">
        <input type="submit" name="logout" value="Abmelden">
    </form>
      </li>
    </ul>
  </div>
<?php
   }  
?>
<?php
    } else {
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
            ?>
            <br>
            <input type="submit" name="submitted" value="Login"><br>
            Noch kein Benutzerkonto?<br>
            <a href="?site=register">Hier registrieren!</a>
        </form>
    </div>
<?php
    }
?>