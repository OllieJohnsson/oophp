


<article style="align-items: flex-start;">
    <?php foreach ($res as $row) : ?>
        <?php if (!$row->deleted && $row->published) : ?>
            <div class="">
                <h4><a href="blog/<?= $row->slug ?>"><?= $row->title; ?></a></h4>
                <i><?= $row->published ?></i>
                <p><?= $row->data ?></p>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
</article>
