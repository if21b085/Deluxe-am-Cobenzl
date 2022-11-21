<?php
    function isSession() {
        return isset($_SESSION["username"]);
    }
    $errors = [];
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
            $_SESSION["username"] = $_POST["uname"];
        }
        if (!empty($_POST["pword"])&&!empty($_POST["uname"])&&$_POST["uname"] == "admin"&&$_POST["pword"]=="admin"){
            $_SESSION["username"] = $_POST["uname"];
        }
    }
?>
<?php
    if (isSession()) {
?>
        <div style="text-align:center">
        <p>Hallo, Du bist angemeldet als <?= $_SESSION["username"]; ?>.</p>

        
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