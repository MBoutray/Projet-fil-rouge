<?php
use App\Model\PollModel;
require "../../Autoloader.php";
Autoloader::register();

$input = $_POST['input'];
$data = $_POST['data'];
$returnedData = array('result' => '');

switch ($input) {
    case 'poll-question':
        if ($data == "") {
            $returnedData = array('result' => 'error', 'errorMessage' => 'Veuillez rentrer une question pour le sondage.');
        }
        break;
    case 'deadline':
        $deadline = new DateTime($data);
        $now = new DateTime();
        $deadlineHasPassed = $now->diff($deadline)->invert == 1;

        if ($data == "") {
            $returnedData = array('result' => 'error', 'errorMessage' => 'Veuillez rentrer une date de fin pour le sondage.');
        } else if ($deadlineHasPassed) {
            $returnedData = array('result' => 'error', 'errorMessage' => 'Veuillez rentrer une date de fin valide (dans le futur).');
        }
        break;
    case 'category':
        $model = new PollModel();
        $categories = $model->GetCategories();

        if ($data === "" || array_search($data, array_column($categories, 'category_id')) === false) {
            $returnedData = array('result' => 'error', 'errorMessage' => 'Veuillez entrer une categorie correcte.');
        }
        break;
    case 'answers[]':
        if ($data == "") {
            $returnedData = array('result' => 'error', 'errorMessage' => "Veuillez entrer l'intitulé de la réponse.");
        }
        break;
    case 'is-correct':
        if (!isset($data)) {
            $returnedData = array('result' => 'error', 'errorMessage' => "Veuillez sélectionner une réponse correcte.");
        }
        break;
}

echo json_encode($returnedData);