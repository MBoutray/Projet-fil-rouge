        </div> <?php //content-container ?>    
        <footer>
            <nav>
                <ul>
                    <li><a href="index.php?page=accueil"><img src="assets/logo_BS.svg" alt="Logo of Betsetter"></a></li>
                    <li><a href="index.php?page=browse">Parcourir</a></li>
                    <li><a href="index.php?page=rankings">Classement</a></li>
                    <?php if (session_status() == PHP_SESSION_ACTIVE && $_SESSION['loggedin']) { ?>
                        <li><a href="index.php?page=mypolls">Mes sondages</a></li>
                    <?php } ?>
                </ul>
            </nav>
        </footer>
    </div> <?php //page-container ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <?php
        foreach ($js as $script) {
            echo "<script src='./js/$script'></script>";
        }
    ?>
</body>
</html>