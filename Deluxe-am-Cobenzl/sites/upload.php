<?php
    session_start();
    if(isset($_SESSION['username']) && $_SESSION["username"]=='admin') {
?>
        <h1>Upload Sample</h1>


        <h2>Upload Form</h2>
        <form enctype="multipart/form-data" action="?site=news" method="post" target="blank">
            <input type="file" name="picture" accept="image/*">
            <input type="submit" name="btnUpload" value="Hochladen">
        </form>

<?php

        echo "<h2>Upload Result</h2>";
        echo "<pre>";
        echo "POST: " . print_r($_POST, true);
        echo "FILES: " . print_r($_FILES, true);
        echo "</pre>";
    }
?>
