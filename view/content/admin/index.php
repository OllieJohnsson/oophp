
<article class="">

    <div class="row-container">
        <a href="admin/create" class="roundedButton">
            Skapa
            <img src="https://png.icons8.com/ios-glyphs/20/ffffff/plus-math.png">
        </a>
        <a href="admin/reset" class="roundedButton">
            Återställ databas
            <img src="https://png.icons8.com/ios-glyphs/20/ffffff/reboot.png">
        </a>
    </div>

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
            <th>Action</th>
        </tr>
        <?php foreach ($res as $row) : ?>
            <tr>
                <td><?= $row->id; ?></td>
                <td><?= $row->title; ?></td>
                <td><?= $row->path; ?></td>
                <td><?= $row->slug; ?></td>
                <td><?= $row->type; ?></td>
                <td><?= $row->filter; ?></td>
                <td nowrap><?= $row->published; ?></td>
                <td nowrap><?= $row->created; ?></td>
                <td nowrap><?= $row->updated; ?></td>
                <td nowrap><?= $row->deleted; ?></td>

                <td nowrap>
                    <a href="admin/delete/<?= $row->id ?>">
                        <img src="https://png.icons8.com/ios-glyphs/25/ed4674/cancel.png">
                    </a>
                    <a href="admin/recreate/<?= $row->id ?>">
                        <img src="https://png.icons8.com/ios-glyphs/25/ed4674/reboot.png">
                    </a>
                    <a href="admin/edit/<?= $row->id ?>">
                        <img src="https://png.icons8.com/ios-glyphs/25/ed4674/pencil.png">
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

</article>
