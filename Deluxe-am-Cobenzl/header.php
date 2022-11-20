<header>
        <h1><a href="?site=home"><img src=images/logo.jpeg alt=Logo></a>
            HOTEL Deluxe am Cobenzl</h1>
            <?php
                session_start();
                if(!isset($_SESSION['username'])) {
            ?>
                    <div class="login">
                        <button onclick="document.location.href='?site=login'">LOGIN</button>
                     </div>
            
            <?php   
                }else if (isset($_POST["logout"])) { 

                    session_unset();
                    session_destroy();
            ?>
                    <div class="login">
                        <button onclick="document.location.href='?site=login'">LOGIN</button>
                     </div>
            <?php
                }else{
                    
            ?>
                    <div class="login">
                        <form method="post" action="?site=login" target="blank">
                            <input type="submit" name="logout"  value="Abmelden">
                        </form>
                    </div>
            <?php   
                }
            ?>
</header>