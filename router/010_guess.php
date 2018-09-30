<?php
/**
 * Create routes using $app programming style.
 */
//var_dump(array_keys(get_defined_vars()));

namespace Oliver\Guess;

/**
 * Showing Guess game using GET, rendered within the standard page layout.
 */
$app->router->get("guess/get", function () use ($app) {

    $title = "Guess my number (GET)";

    $correctNumber = $app->request->getGet("correctNumber") ?? -1;
    $tries = $app->request->getGet("tries") ?? 6;
    $guessedNumber = $app->request->getGet("guessedNumber") ?? null;

    $guess = $app->request->getGet("guess") ?? null;
    $reset = $app->request->getGet("reset") ?? null;
    $cheat = $app->request->getGet("cheat") ?? null;

    $game = new Guess($correctNumber, $tries);
    $message = "";


    if (isset($guess)) {
        try {
            $message = $game->makeGuess($guessedNumber);
        } catch (GuessException $e) {
            $message = $e->getMessage();
        }
    }

    if (isset($reset)) {
        $game = new Guess(-1, 6);
    }

    if (isset($cheat)) {
        $message = "Cheat: <b>" . $game->number() . "</b>";
    }

    $data = [
      "title" => $title,
      "game" => $game,
      "message" => $message,
      "type" => "GET"
    ];

    $app->page->add("guess/game", $data);

    return $app->page->render([
        "title" => $title,
    ]);
});







/**
 * Showing Guess game using POST, rendered within the standard page layout.
 */
$app->router->any(["GET", "POST"], "guess/post", function () use ($app) {

    $title = "Guess my number (POST)";

    $correctNumber = $_POST["correctNumber"] ?? -1;
    $tries = $_POST["tries"] ?? 6;
    $guessedNumber = $_POST["guessedNumber"] ?? null;

    $game = new Guess($correctNumber, $tries);
    $message = "";

    if (isset($_POST["guess"])) {
        try {
            $message = $game->makeGuess($guessedNumber);
        } catch (GuessException $e) {
            $message = $e->getMessage();
        }
    }

    if (isset($_POST["reset"])) {
        $game = new Guess(-1, 6);
    }

    if (isset($_POST["cheat"])) {
        $message = "Cheat: <b>" . $game->number() . "</b>";
    }

    $data = [
      "title" => $title,
      "game" => $game,
      "message" => $message,
      "type" => "POST"
    ];

    $app->page->add("guess/game", $data);

    return $app->page->render([
        "title" => $title,
    ]);
});






/**
 * Showing Guess game using SESSION, rendered within the standard page layout.
 */
$app->router->any(["GET", "POST"], "guess/session", function () use ($app) {

    $title = "Guess my number (SESSION)";

    $game = $app->session->get("game") ?? null;
    if (!$game) {
        $game = new Guess(-1, 6);
        $app->session->set("game", $game);
    }

    $guessedNumber = $_POST["guessedNumber"] ?? null;
    $message = "";

    if (isset($_POST["guess"])) {
        try {
            $message = $game->makeGuess($guessedNumber);
        } catch (GuessException $e) {
            $message = $e->getMessage();
        }
    }

    if (isset($_POST["reset"])) {
        $app->session->destroy();
        $app->response->redirect("guess/session");
    }

    if (isset($_POST["cheat"])) {
        $message = "Cheat: <b>" . $game->number() . "</b>";
    }

    $data = [
      "title" => $title,
      "game" => $game,
      "message" => $message,
      "type" => "POST"
    ];

    $app->page->add("guess/game", $data);

    return $app->page->render([
        "title" => $title,
    ]);
});
