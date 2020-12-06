<?php
namespace App\Controller;
use App\Model\PollModel;

class PollController {
    private $model;

    public function __construct() {
        $this->model = new PollModel();
    }

    //Créer un sondage
    public function CreatePoll()
    {
        if (!empty($_POST['poll-question']) && !empty($_POST['deadline']) && !empty($_POST['poll-question']) && !empty($_POST['poll-question']) && !empty($_POST['answers']) && !empty($_POST['is-correct'])) {
            
        } else {
            //TODO add error for 
        }
    }
    //Répondre à un sondage
    //Afficher une preview
}