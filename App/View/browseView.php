<?php
use App\Controller\UserController;
UserController::Redirect(false);

$title = "Parcourir les sondages";
$js = array("main.js");

include("./include/head.php");
include("./include/header.php");
?>

<main>
    <h1><?= $title ?></h1>
    <aside> <!-- Put on the top right of the page for easy access (in absolute) -->
        <nav>
            <ul>
                <!-- All the anchors for the different categories -->
            </ul>
        </nav>
    </aside>
    <section id="category-container">
        <!-- <section class="category" id="sport-category">
            <article class="poll-preview" id="poll-<?= $poll_id ?>">
                <p class="poll-question"><?= $poll_question ?></p>
                <p class="participants-count"><?= $entry_count ?></p>
                <p class="creation-date">Créé le <time datetime="<?= $creation_date_html ?>"><?= $creation_date_text ?></time>.</p>
                <a href="index.php?page=poll&poll=<?= $poll_id ?>" class="button-primary">Voir</a>
            </article>
        </section> -->
    </section>
</main>
        
<?php include("./include/footer.php"); ?>