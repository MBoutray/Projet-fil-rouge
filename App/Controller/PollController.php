<?php
namespace App\Controller;
use App\Model\PollModel;

class PollController {
    private $model;

    public function __construct() {
        $this->model = new PollModel();
    }

    //Créer un sondage
    public function CreatePoll($answers)
    {
        $this->model->CreatePoll($_SESSION['id'], $_POST['poll-question'], $_POST['category'], $_POST['deadline'], $answers);
    }
    //Répondre à un sondage
    //Afficher une preview
}