

<article class="">

    <h1><?= $title ?></h1>

    <form class="form" action="<?= $link ?>" method="post">
        <input type="text" name="title" value="<?= $res->title ?>" placeholder="Titel">
        <input type="text" name="image" value="<?= $res->image ?>" placeholder="Bild-länk">
        <input type="number" name="year" value="<?= $res->year ?>" placeholder="År">
        <button style="background-color: #47D160;" class ="roundedButton" "type="input" name="save"><?= $linkName ?></button>
    </form>

    <?php if (!$link) : ?>
        <form class="" action="delete" method="post">
            <input type="text" name="id" value="<?= $res->id ?>" hidden>
            <button class="roundedButton" type="input" name="button">Radera</button>
        </form>
    <?php endif; ?>
</article>
