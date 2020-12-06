<?php
use App\Controller\UserController;
// UserController::Redirect(true); //TODO retirer le commentaire

$title = "Sondages";
$js = array("main.js", "pollCreation.js");

include("./include/head.php");
include("./include/header.php");
?>

<main>
    <h1><?= $title ?></h1>
    <nav>
        <button class="tab-links" id="new-poll-tab">Nouveau sondage</button>
        <button class="tab-links" id="my-polls-tab">Mes sondages</button>
    </nav>
    <section class="tab-content" id="new-poll-content">
        <h2>Créer un sondage</h2>
        <form action="index.php" method="post">
            <div class="input-group">
                <label for="poll-question-input" class="input-label">Question du sondage</label>
                <input type="text" name="poll-question" id="poll-question-input" placeholder="Question du sondage">
                <label for="poll-question-input" id="poll-question-error" class="error-label"></label>
            </div>
            <div class="input-group">
                <label for="deadline-input" class="input-label">Date de fin</label>
                <input type="datetime-local" name="deadline" id="deadline-input">
                <label for="deadline-input" id="deadline-error" class="error-label"></label>
            </div>
            <div class="input-group">
                <label for="category-input" class="input-label">Catégorie</label>
                <input type="text" name="category" id="category-input">
                <label for="category-input" id="category-error" class="error-label"></label>
            </div>
            <section id="answer-container">
           <!-- <article class="answer">
                    <div class="input-group">
                        <label for="answer-x-input" class="input-label">Réponse du sondage</label>
                        <input type="text" name="answers[]" id="answer-x-input" placeholder="Votre réponse">
                        <label for="answer-x-input" id="answer-x-error" class="error-label"></label>
                    </div>
                    <div class="input-group">
                        <label for="is-correct-x-input" class="input-label">Est la bonne réponse</label>
                        <input type="radio" name="is-correct" id="is-correct-x-input" value="x">
                        <label for="is-correct-x-input" id="is-correct-x-error" class="error-label"></label>
                    </div>
                    <button class="remove-button fas fa-times" id="remove-answer-x"></button>
                </article> -->
                <article class="answer">
                    <div class="input-group">
                        <label for="answer-1-input" class="input-label">Réponse du sondage</label>
                        <input type="text" name="answers[]" id="answer-1-input" placeholder="Votre réponse">
                        <label for="answer-1-input" id="answer-1-error" class="error-label"></label>
                    </div>
                    <div class="input-group">
                        <label for="is-correct-1-input" class="input-label">Est la bonne réponse</label>
                        <input type="radio" name="is-correct" id="is-correct-1-input" value="1">
                        <label for="is-correct-1-input" id="is-correct-1-error" class="error-label"></label>
                    </div>
                    <button class="remove-button fas fa-times" id="remove-answer-1"></button>
                </article>
                <article class="answer">
                    <div class="input-group">
                        <label for="answer-2-input" class="input-label">Réponse du sondage</label>
                        <input type="text" name="answers[]" id="answer-2-input" placeholder="Votre réponse">
                        <label for="answer-2-input" id="answer-2-error" class="error-label"></label>
                    </div>
                    <div class="input-group">
                        <label for="is-correct-2-input" class="input-label">Est la bonne réponse</label>
                        <input type="radio" name="is-correct" id="is-correct-2-input" value="2">
                        <label for="is-correct-2-input" id="is-correct-2-error" class="error-label"></label>
                    </div>
                    <button class="remove-button fas fa-times" id="remove-answer-2"></button>
                </article>
            </section>
            <button class="button-secondary fas fa-plus" id="new-answer"></button>

            <button class="button-primary" type="submit" name="action" value="new-poll">Créer un sondage</button>
        </form>
    </section>
    <section class="tab-content" id="my-polls-content">
        <h2>Mes sondages</h2>
        <section id="my-polls-container">
       <!-- <article class="poll-preview" id="poll-x">
                <p class="poll-question">Lorem Ipsum</p>
                <p class="participants-count">2</p>
                <p class="creation-date">Créé le <time datetime="2020-12-06 20:00">6/12/2020 à 20h</time>.</p>
                <a href="index.php?page=poll&poll=x" class="button-primary">Voir <i class="fas fa-arrow-right"></i></a>
            </article> -->
        </section>
        
    </section>
</main>
        
<?php include("./include/footer.php"); ?>