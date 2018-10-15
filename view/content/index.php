<article class="">
    <table class="table">
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Path</th>
            <th>Slug</th>
            <th>Type</th>
            <th>Filter</th>
            <th>Status</th>
            <th>Published</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Deleted</th>
        </tr>
        <?php foreach ($res as $row) : ?>
            <tr>
                <td><?= $row->id; ?></td>
                <td><?= $row->title; ?></td>
                <td><?= $row->path; ?></td>
                <td><?= $row->slug; ?></td>
                <td><?= $row->type; ?></td>
                <td><?= $row->filter; ?></td>
                <td><?= $row->status; ?></td>
                <td nowrap><?= $row->published; ?></td>
                <td nowrap><?= $row->created; ?></td>
                <td nowrap><?= $row->updated; ?></td>
                <td nowrap><?= $row->deleted; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</article>
