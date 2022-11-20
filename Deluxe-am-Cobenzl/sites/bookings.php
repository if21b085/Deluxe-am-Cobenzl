<?php
    if(isset($_SESSION['username'])) {
?>
        <article class='mt-5 mb-5'>
            <h1>Das ist eine Reservierung</h1>
            <p>Buchungsdatum vom 20.11.2022 bis 21.11.2022</p>
            <p>OHNE Frühstück</p>
            <p>MIT Parkplatz</p>
        </article>

        <div class="border-bottom border-dark w-100"></div>

        <article class='mt-5 mb-5'>
            <h1>Das ist eine Reservierung</h1>
            <p>Buchungsdatum vom 25.11.2022 bis 8.11.2022</p>
            <p>MIT Frühstück</p>
            <p>MIT Parkplatz</p>
        </article>

        <div class="border-bottom border-dark w-100"></div>

        <article class='mt-5 mb-5'>
            <h1>Das ist eine Reservierung</h1>
            <p>Buchungsdatum vom 01.12.2022 bis 02.12.2022</p>
            <p>OHNE Frühstück</p>
            <p>OHNE Parkplatz</p>
        </article>
<?php
    }else{
?>
        <div style="text-align:center">
            <p>Du bist nicht als Bnutzer eingeloggt</p>
            <a href="?site=login">Hier einloggen!</a>
        </div>
<?php
    }
?>