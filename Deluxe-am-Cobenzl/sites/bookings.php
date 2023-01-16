<h2>Reservierungen</h2>
<?php
    if($_SESSION['username']=='admin') {
        require_once ('dbaccess.php'); //to retrieve connection details
        $conn = new mysqli($host, $user, $password, $database); //Datenbankverbindung aufbauen
        $sql = "SELECT * FROM reservations";
        $result = $conn->query($sql);
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Name</th><th>datum</th><th>von</th><th>bis</th><th>Parking</th><th>Breakfast</th><th>Haustier</th><th>Preis in €</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['ReservID'] . "</td>";
            echo "<td>" . $row['username'] . "</td>";
            echo "<td>" . $row['datum'] . "</td>";
            echo "<td>" . $row['von'] . "</td>";
            echo "<td>" . $row['bis'] . "</td>";
            echo "<td>" . $row['parkplatz'] . "</td>";
            echo "<td>" . $row['frühstück'] . "</td>";
            echo "<td>" . $row['haustier'] . "</td>";
            echo "<td>" . $row['Preis'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        $conn->close();
    }else if($_SESSION['username']=='gast') {
        require_once ('dbaccess.php'); //to retrieve connection details
        $conn = new mysqli($host, $user, $password, $database); //Datenbankverbindung aufbauen
        $uname = $_SESSION['uname'];
        $sql = "SELECT * FROM reservations where username='$uname'";
        $result = $conn->query($sql);
        echo "<table border='1'>";
        echo "<tr><th>Datum</th><th>Name</th><th>von</th><th>bis</th><th>Parking</th><th>Breakfast</th><th>Haustier</th><th>Preis in €</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['datum'] . "</td>";
            echo "<td>" . $row['username'] . "</td>";
            echo "<td>" . $row['von'] . "</td>";
            echo "<td>" . $row['bis'] . "</td>";
            echo "<td>" . $row['parkplatz'] . "</td>";
            echo "<td>" . $row['frühstück'] . "</td>";
            echo "<td>" . $row['haustier'] . "</td>";
            echo "<td>" . $row['Preis'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        $conn->close();

    }else{
?>
        <div style="text-align:center">
            <p>Du bist nicht als Bnutzer eingeloggt</p>
            <a href="?site=login">Hier einloggen!</a>
        </div>
<?php
    }
?>