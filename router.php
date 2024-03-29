<?php
use App\Controller\PollController;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && array_key_exists("action", $_POST)) {
    switch ($_POST['action']) {
        case 'connect':
            break;
        case 'disconnect':
            break;
        case 'register':
            break;
        case 'new-poll':
            $controller = new PollController();
            $controller->CreatePoll(json_decode($_POST['answers']));
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
            include('../App/View/homeView.php');
            break;
        case 'rankings':
            include('../App/View/rankingsView.php');
            break;
        case 'browse':
            include('../App/View/browseView.php');
            break;
        case 'mypolls':
            include('../App/View/myPollsView.php');
            break;
        case 'profil':
            include('../App/View/profilView.php');
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