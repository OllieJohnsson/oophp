<article class="">
    <form class="form" action="" method="post">

        <div class="column-container left">

        <label for="title">Titel</label>
        <input type="text" name="title" value="<?= $res->title ?>">
        <label for="path">Path</label>
        <input type="text" name="path" value="<?= $res->path ?>">
        <label for="slug">Slug</label>
        <input type="text" name="slug" value="<?= $res->slug ?>">
        <label for="text">Text</label>
        <textarea name="data" rows="12" cols="80"><?= $res->data ?></textarea>
        <label for="type">Typ</label>
        <input type="text" name="type" value="<?= $res->type ?>">
        <label for="filter">Filter</label>
        <input type="text" name="filter" value="<?= $res->filter ?>">
        <label for="publish">Publiserad</label>
        <input type="text" name="publish" value="<?= $res->published ?>">


        <button type="submit" class="roundedButton">Spara</button>

        </div>
    </form>
</article>
