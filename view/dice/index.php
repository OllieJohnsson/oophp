<?php

namespace Anax\View;

?>

<div class="game-container">

    <h1><?= $title; ?></h1>

    <p>Skriv in ditt namn</p>

    <form class="" action="" method="post">
        <input type="text" name="playerName" value="" placeholder="Namn">
        <button class="roundedButton" type="submit">Start</button>
    </form>

    <p><?= $game->getMessage(); ?></p>
</div>
