<body>
    <div class="page-container">
        <div class="content-container">
            <header>
                <nav>
                    <a href="index.php?page=home" class="logoAndName">
                        <img class="main-logo" src="./assets/logo_BS.svg" alt="Logo BetSetter">
                        <p>₿et$etter</p>
                    </a>
                    <ul>
                        <li><a href="index.php?page=browse">Parcourir</a></li>
                        <li><a href="index.php?page=rankings">Classement</a></li>
                        <?php if (session_status() == PHP_SESSION_ACTIVE && $_SESSION['loggedin']) { ?>
                            <li><a href="index.php?page=mypolls">Mes sondages</a></li>
                            <li class="online-buttons">
                                <a href="index.php?page=profil">Profil</a>
                                <hr class="vertical-separator">
                                <form action="index.php" method="post">
                                    <button type="submit" name="action" value="deconnect">Déconnexion</button>
                                </form>
                            </li>
                        <?php } else { ?>
                            <li class="offline-buttons">
                                <a href="index.php?page=connection">Connexion</a>
                                <hr class="vertical-separator">
                                <a href="index.php?page=register">Inscription</a>
                            </li>
                        <?php } ?>
                    </ul>
                </nav>
            </header>