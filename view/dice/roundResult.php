<?php

namespace Anax\View;

?>

<div class="game-container">
    <a href="../dice/quit" class="quitButton left">
        <img src="https://png.icons8.com/ios-glyphs/30/a63151/delete-sign.png">
    </a>
    <h1><?= $title ?></h1>

    <div class="row-container top full-width" style="margin-top: 2rem;">
        <div class="column-container left">
            <p style="margin-bottom: 0;">Ställning:</p>
            <?php foreach ($game->getPlayers() as $player) : ?>
                <div class="row-container full-width">
                    <p><?= $player->getName()?> </p>
                    <p><b><?= $player->getScore() ?></b></p>
                </div>
            <?php endforeach; ?>
        </div>


        <div class="column-container" style="margin-top: 1rem;">
            <div class="row-container">
                <?php foreach ($game->getRound()->getLastGraphics() as $value) : ?>
                    <div class="dice-utf8">
                        <i class="<?= $value; ?>"></i>
                    </div>
                <?php endforeach; ?>
            </div>
            <p>Värde: <b><?= $game->getRound()->getLastScore(); ?></b></p>
        </div>



        <div class="right">
            <p>Poäng i rundan: <b><?= $game->getRound()->getScore(); ?></b></p>
        </div>
    </div>

    <?php if ($game->getRound()->getScore() > 0) { ?>
        <p>Vill du kasta igen eller spara dina poäng?</p>

        <a href="../dice/playRound" class="roundedButton">Kasta tärningarna</a>
        <a href="../dice/saveRound" class="roundedButton">Spara poäng</a>
    <?php } else { ?>
        <p>Du fick en <b>1:a</b>. Det blev inga poäng.</p>
        <a href="../dice/loseRound" class="roundedButton">OK</a>
    <?php }; ?>

</div>
