<article class="">
    <table class="table">
        <th>Id</th>
        <th>Titel</th>
        <th>Bild</th>
        <th>År</th>
        <th></th>
        <?php foreach ($res as $movie) : ?>
            <tr>
                <td><?= $movie->id; ?></td>
                <td><?= $movie->title; ?></td>
                <td><img src="<?= $movie->image; ?>"
                    onerror="this.src='img/movie/noimage.png'" alt="<?= $movie->image; ?>"></td>
                <td><?= $movie->year; ?></td>
                <td><a href="movie/edit?id=<?= $movie->id ?>"><img src="https://png.icons8.com/ios-glyphs/20/FF0055/pencil.png"></a></td>
            </tr>
        <?php endforeach; ?>
    </table>
</article>
