<?php
use App\Controller\UserController;
//UserController::Disconnect(); //TODO remove after
UserController::Redirect(false);

$title = "Connexion";
$js = array("main.js");

include("./include/head.php");
include("./include/header.php");
?>

<main>
    <h1><?= $title ?></h1>
    <form action="index.php" method="POST">
        <div class="input-group">
            <label for="email-input" class="input-label">Email <span class="required"><sup>*</sup></span></label>
            <input type="email" name="email" id="email-input" placeholder="Email">
            <label for="email-input" id="email-error" class="error-label"></label>
        </div>
        <div class="input-group">
            <label for="password-input" class="input-label">Mot de passe <span class="required"><sup>*</sup></span></label>
            <input type="password" name="password" id="password-input" placeholder="Mot de passe">
            <label for="password-input" id="password-error" class="error-label"></label>
        </div>
        <button type="submit" name="action" value="connect">Connexion</button>
    </form>
</main>
        
<?php include("./include/footer.php"); ?>