<?php

namespace Anax\View;

?>

<div class="game-container">
    <h1><?= $title ?></h1>

    <div class="row-container">
        <?php foreach ($game->getPlayers() as $player) : ?>

            <div class="player-container">
                <p><?= $player->getName() ?></p>
                <div class="dice-utf8">
                    <i class="<?= $player->getLastGraphics()[0]; ?>"></i>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <p><?= $game->getCurrentPlayer()->getName(); ?> börjar!</p>

    <a href="../dice/game" class="roundedButton">Spela</a>
    <a href="../dice/quit" class="roundedButton">Avsluta</a>
</div>
