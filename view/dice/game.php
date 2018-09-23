<?php

namespace Anax\View;

?>


<div class="game-container">
    <a href="../dice/quit" class="quitButton left">
        <img src="https://png.icons8.com/ios-glyphs/30/a63151/delete-sign.png">
    </a>
    <h1><?= $title ?></h1>

    <p><?= $game->getMessage(); ?></p>

    <div class="column-container">
        <h3 style="margin-bottom:0;">Ställning</h3>
        <div class="row-container">
            <?php foreach ($game->getPlayers() as $player) : ?>
                <div class="column-container" style="margin: 0 1rem;">
                    <p><?= $player->getName() . ": <b>" . $player->getScore()?></b></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>


    <p>Det är <b><?= $game->getCurrentPlayer()->getName(); ?>s</b> tur att kasta tärningarna.</p>

    <a href="../dice/startRound" class="roundedButton">Kasta tärningar</a>
</div>
