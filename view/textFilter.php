

<div class="column-container">
    <a href="?example=bbcode">BBcode exempel</a>
    <a href="?example=link">Link exempel</a>
    <a href="?example=markdown">Markdown exempel</a>
    <a href="?example=nl2br">nl2br exempel</a>
    <a href="?">Återställ</a>

    <form class="" action="?" method="post">
        <textarea name="text" rows="12" cols="80"><?= $text ?></textarea>
        <p>
            <label for="text">Filter</label>
            <input type="text" name="filters" value="<?= $filters ?>">
            <input type="submit" name="format" value="Formatera">
        </p>
    </form>

    <div class="">
        <p style="text-align: left;"><?= $formatted ?></p>
    </div>

</div>
