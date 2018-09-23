<?php

namespace Anax\View;

?>

<div class="game-container">
    <h1><?= $title ?></h1>

    <h2 style="color: #ed4674;"><?= $game->getWinner()->getName() ?> vann!</h2>

    <div class="column-container" style="margin-bottom: 1rem;">
        <h3 style="margin-bottom: 0;">Resultat:</h3>

        <?php foreach ($game->getPlayers() as $player) : ?>
            <div class="player-container">
                <p><?= $player->getName() . ": <b>" . $player->getScore()?></b></p>
            </div>
        <?php endforeach; ?>

    </div>

    <a href="../dice/quit" class="roundedButton">Spela igen</a>

</div>
