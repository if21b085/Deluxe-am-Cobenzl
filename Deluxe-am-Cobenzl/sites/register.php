
    <div  style="text-align:center">
        <h2 >REGISTRIERUNG</h2>
        <div class="row >
        <form action="sites/action_page.php" method="post">

            <div class="col-sm-6">
            <fieldset>
                <legend><strong>Benutzer Daten:</strong></legend>
                <label for="uname">*Username:</label>
                <input type="text" id="uname" placeholder="Username"><br>
                <label for="pword">*Password:</label>
                <input type="password" id="pword" placeholder="Password" method="post"><br>
                <label for="pword">*Password-Wiederholung:</label>
                <input type="password" id="pword" placeholder="Password" method="post"><br>
                <label for="email">*Enter your email:</label>
                <input type="email" id="email" name="email">
            </fieldset>
            </div>
            <div class="col-sm-6">
            <fieldset>
                <legend><strong>Persönliche Daten:</strong></legend>
                <label for="anrede">*Anrede:</label>
                <select id="anrede" name="anrede">
                    <option value="waehlen">bitte wählen</option>
                    <option value="frau">Frau</option>
                    <option value="herr">Herr</option>
                </select><br><br>

                <label for="vorname">*Vorname:</label>
                <input type="text" id="vorname" placeholder="Vorname"><br><br>

                <label for="nachname">*Nachname:</label>
                <input type="text" id="nachname" placeholder="Nachname"><br>
            </fieldset>
            </div>
            <div class="col-12">
                <input type="checkbox" id="agb" name="agb" value="agb">
                <label id="agb" for="agb"> Ich bin damit einverstanden, dass diese Daten zur Anmeldung benutzt werden.</label><br>
                <input type="button" onclick="alert('Success!')" value="anmelden"><br><br><br>
            </div>
        </form>
    </div>
    </div>