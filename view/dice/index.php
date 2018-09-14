<?php

namespace Anax\View;

//
// $game->addPlayers("Oliver");
// $game->rollWhoStarts();
//
// foreach ($game->getPlayers() as $player) {
//     echo $player->getName() . ": " . $player->getLastValues()[0] . "<br>";
// }
//
// echo "Starts: " . $game->getTurn()->getName() . "<br>";
//
// $game->startRound();
//
// $game->getRound()->play();
// echo "<br>";
// echo implode(", ", $game->getTurn()->getLastValues()) . "<br>";
//
// $game->getRound()->play();
// echo "<br>";
// echo implode(", ", $game->getTurn()->getLastValues()) . "<br>";
//
//
//
// $game->getRound()->end();
//
// echo "<br>Turn: " . $game->getTurn()->getName();


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
