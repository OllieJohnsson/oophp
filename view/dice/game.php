<?php

namespace Anax\View;

// $computerHand = $game->getHand("computer");
// $playerHand = $game->getHand("player1");

// echo "TURN: " . $game->getTurn()->getName();
// echo "VALUES: " . array_sum($game->getTurn()->getValues());

// if ($game->getTurn()->getName() == "Coumputer") {
    // $computerHand->roll($game->getNumberOfDices());
    // $computerHand->setTotalScore();
    // $game->setTurn($playerHand);

// }




?>


<div class="game-container">
    <h1><?= $title ?></h1>

    <div class="column-container">
        <h3 style="margin-bottom:0;">Ställning</h3>
        <div class="row-container">
            <?php foreach ($game->getPlayers() as $player) : ?>
                <div class="column-container" style="margin: 0 1rem;">
                    <p><?= $player->getName() . ": " . $player->getScore()?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>


    <p>Det är <b><?= $game->getCurrentPlayer()->getName(); ?>s</b> tur att kasta tärningarna.</p>

    <a href="../dice/startRound" class="roundedButton">Kasta tärningar</a>
    <a href="../dice/quit" class="roundedButton">Avsluta</a>


</div>
