<?php

namespace Anax\View;

?>


<div class="game-container">
    <h1><?= $title ?></h1>

    <h2><?= $game->getWinner()->getName() ?> vann!</h2>

    <div class="column-container">
        <p>Resultat</p>

        <?php foreach ($game->getPlayers() as $player) : ?>
            <div class="player-container">
                <p><?= $player->getName() . ": " . $player->getScore()?></p>
            </div>
        <?php endforeach; ?>

    </div>

    <a href="../dice/quit" class="roundedButton">Spela igen</a>


</div>
