<?php

namespace Anax\View;

?>

<div class="game-container">
    <h1><?= $title ?></h1>


    <div class="row-container top full-width">
        <div class="column-container left">
            <p>Ställning</p>
            <?php foreach ($game->getPlayers() as $player) : ?>
                <div class="row-container full-width">
                    <p><?= $player->getName()?> </p>
                    <p><b><?= $player->getScore() ?></b></p>
                </div>
            <?php endforeach; ?>
        </div>


        <div class="column-container">
            <div class="row-container">
                <?php foreach ($game->getCurrentPlayer()->getLastGraphics() as $value) : ?>
                    <div class="dice-utf8">
                        <i class="<?= $value; ?>"></i>
                    </div>
                <?php endforeach; ?>
            </div>
            <p>Värde: <b><?= array_sum($game->getCurrentPlayer()->getLastValues()); ?></b></p>
        </div>



        <div class="right">
            <p>Poäng i rundan: <b><?= array_sum($game->getCurrentPlayer()->getLastValues()); ?></b></p>
        </div>
    </div>











    <?php if ($game->getCurrentPlayer()->getRound()) { ?>
        <p>Vill du kasta igen eller avsluta?</p>

        <a href="../dice/playRound" class="roundedButton">Kasta tärningarna</a>
        <a href="../dice/endRound" class="roundedButton">Avsluta rundan</a>
    <?php } else { ?>
        <p>Du fick en <b>1:a</b>. Det blev inga poäng.</p>
        <a href="../dice/game" class="roundedButton">OK</a>
    <?php }; ?>




    <a href="../dice/quit" class="roundedButton">Avsluta</a>


</div>
