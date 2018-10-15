<article class="">
    <a href="movie/add" class="movieAddButton"><img src="https://png.icons8.com/ios-glyphs/72/FF0055/plus-math.png"></a>

    <form class="form" action="movie" method="get">
        <input type="search" name="search" value="">
        <button class="roundedButton" type="submit">Sök</button>
    </form>

    <div class="movieMessage">
        <?php if (is_array($searchRes)) : ?>
            <a href="movie">Visa alla</a>
        <?php else : ?>
            <p><?= $searchRes; ?></p>
        <?php endif; ?>
    </div>
</article>
