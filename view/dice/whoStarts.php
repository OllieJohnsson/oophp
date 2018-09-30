<?php

namespace Anax\View;

?>

<div class="game-container">
    <a href="../dice/quit" class="quitButton left">
        <img src="https://png.icons8.com/ios-glyphs/30/a63151/delete-sign.png">
    </a>
    <h1><?= $title ?></h1>

    <div class="row-container">
        <?php foreach ($game->getPlayers() as $player) : ?>

            <div class="column-container">
                <p><?= $player->getName() ?></p>
                <div class="dice-utf8">
                    <?php foreach ($player->getLastGraphics() as $value) : ?>
                        <i class="<?= $value; ?>"></i>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <p><b><?= $game->getCurrentPlayer()->getName(); ?></b> börjar!</p>

    <a href="../dice/game" class="roundedButton">Spela</a>
</div>
