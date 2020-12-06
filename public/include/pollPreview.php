<article class="poll-preview" id="poll-<?= $poll_id ?>">
    <p class="poll-question"><?= $poll_question ?></p>
    <p class="participants-count"><?= $entry_count ?></p>
    <p class="creation-date">Créé le <time datetime="<?= $creation_date_html ?>"><?= $creation_date_text ?></time>.</p>
    <a href="index.php?page=poll&poll=<?= $poll_id ?>" class="button-primary">Voir</a>
</article>