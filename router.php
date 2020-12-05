<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && array_key_exists("action", $_POST)) {
    switch ($_POST['action']) {
        case 'connect':
            break;
        case 'disconnect':
            break;
        case 'register':
            break;
        case 'new-poll':
            break;
    }
} else if (array_key_exists("page", $_GET)) {
    switch ($_GET["page"]) {
        case 'connection':
            include('../App/View/connectionView.php');
            break;
        case 'registration':
            include('../App/View/registrationView.php');
            break;
        case 'home':
                
            break;
        case 'rankings':
                
            break;
        case 'browse':
            
            break;
        case 'mypolls':
                
            break;
        case 'profil':
                
            break;
            
        default:
            header("Location: index.php?page=accueil");
            exit;
            break;
    }
} else {
    header("Location: index.php?page=accueil");
    exit;
}