<?php
    session_start();
    if(isset($_SESSION['username']) && $_SESSION["username"]=='admin') {
?>
        <h1 class="mb-5 mt-5">Neuen Beitrag erstellen</h1>


        <h2>Upload Form</h2>
        <form enctype="multipart/form-data" action="?site=news" method="post" target="blank" class="d-flex flex-column">
            <input type="file" name="picture" accept="image/*" class="mt-2 mb-2" ></input>
            <input type="text" name="news_title" class="mt-2 mb-2" placeholder="Bitte geben Sie hier den Titel ein."></input>
            <textarea name="news_text" rows="4" cols="50" class="mt-2 mb-2" placeholder="Bitte geben Sie hier den Beitragstext ein."></textarea>
            <input type="submit" name="btnUpload" value="Hochladen" class="mt-2 mb-2"></input>
        </form>

<?php
    }
?>
