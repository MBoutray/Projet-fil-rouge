<?php
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
        # code...
        break;
    case 'answer':
        # code...
        break;
}

echo json_encode($returnedData);