<?php

namespace Anax\View;

/**
 * Template file to render a view.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());

?>

<div class="game-container">
    <h1><?= $title ?></h1>
    <p>Guess a number between 1 and 100, you have <b><?= $game->tries(); ?></b> tries left.</p>

    <form class="" action="" method="<?= $type ?>">
        <input type="number" name="guessedNumber" value="" autocomplete="off" autofocus>
        <input type="number" name="correctNumber" value="<?= $game->number(); ?>" hidden>
        <input type="number" name="tries" value="<?= $game->tries(); ?>" hidden>

        <div class="button-container">
            <button type="submit" name="guess" <?= $game->tries() <= 0 ? "disabled" : ""; ?>>Make a guess</button>
            <button type="submit" name="reset">Reset</button>
            <button type="submit" name="cheat">Cheat</button>
        </div>
    </form>

    <p><?= $message ?></p>
</div>
