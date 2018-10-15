<article class="">
    <table class="table">
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Path</th>
            <th>Slug</th>
            <th>Type</th>
            <th>Filter</th>
            <th>Published</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Deleted</th>
        </tr>
        <?php foreach ($res as $row) : ?>
            <?php if (!$row->deleted && $row->published) : ?>
                <tr>
                    <td><?= $row->id; ?></td>
                    <td><a href="<?= "pages/".$row->path ?>"><?= $row->title; ?></a></td>
                    <td><?= $row->path; ?></td>
                    <td><?= $row->slug; ?></td>
                    <td><?= $row->type; ?></td>
                    <td><?= $row->filter; ?></td>
                    <td nowrap><?= $row->published; ?></td>
                    <td nowrap><?= $row->created; ?></td>
                    <td nowrap><?= $row->updated; ?></td>
                    <td nowrap><?= $row->deleted; ?></td>
                </tr>
            <?php endif; ?>
        <?php endforeach; ?>
    </table>
</article>
