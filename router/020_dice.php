<?php
namespace Oliver\Dice;

$app->router->get("dice/", function () use ($app) {
    $title = "Tärningsspel 100";

    $game = $app->session->get("dice") ?? null;
    if (!$game) {
        $game = new Game();
        $app->session->set("dice", $game);
    }

    $data = [
        "title" => $title,
        "game" => $game
    ];

    $app->page->add("dice/index", $data);
    return $app->page->render([
        "title" => $title,
    ]);
});







$app->router->post("dice/", function () use ($app) {
    $title = "Tärningsspel 100";

    $game = $app->session->get("dice");
    $playerName = $_POST["playerName"] ?? null;

    try {
        $game->addPlayers($playerName);
        return $app->response->redirect("dice/rollWhoStarts");
    } catch (\Exception $e) {
        $game->setMessage($e->getMessage());
    }


    $data = [
        "title" => $title,
        "game" => $game
    ];

    $app->page->add("dice/index", $data);
    return $app->page->render([
        "title" => $title,
    ]);
});






$app->router->get("dice/rollWhoStarts", function () use ($app) {
    $title = "Tärningsspel 100";

    $game = $app->session->get("dice");
    $data = [
        "title" => $title,
        "game" => $game
    ];

    $app->page->add("dice/rollWhoStarts", $data);
    return $app->page->render([
        "title" => $title,
    ]);
});


$app->router->get("dice/whoStarts", function () use ($app) {
    $title = "Tärningsspel 100";

    $game = $app->session->get("dice");
    $game->rollWhoStarts();


    $data = [
        "title" => $title,
        "game" => $game
    ];

    $app->page->add("dice/whoStarts", $data);
    return $app->page->render([
        "title" => $title,
    ]);
});



$app->router->get("dice/game", function () use ($app) {
    $title = "Tärningsspel 100";

    $game = $app->session->get("dice");

    $data = [
        "title" => $title,
        "game" => $game
    ];

    $app->page->add("dice/game", $data);
    return $app->page->render([
        "title" => $title,
    ]);
});



$app->router->get("dice/startRound", function () use ($app) {
    $game = $app->session->get("dice");
    $game->startNewRound();
    $app->response->redirect("dice/playRound");
});


$app->router->get("dice/playRound", function () use ($app) {
    $game = $app->session->get("dice");
    $game->playRound();

    $app->response->redirect("dice/roundResult");
});


$app->router->get("dice/endRound", function () use ($app) {
    $game = $app->session->get("dice");
    $game->endCurrentRound();

    if ($game->getWinner()) {
        $app->response->redirect("dice/winner");
        return;
    }
    $app->response->redirect("dice/game");
});


$app->router->get("dice/roundResult", function () use ($app) {
    $title = "Tärningsspel 100";

    $game = $app->session->get("dice");

    $data = [
        "title" => $title,
        "game" => $game
    ];

    $app->page->add("dice/roundResult", $data);
    return $app->page->render([
        "title" => $title,
    ]);
});



$app->router->get("dice/winner", function () use ($app) {
    $title = "Tärningsspel 100";

    $game = $app->session->get("dice");

    $data = [
        "title" => $title,
        "game" => $game
    ];

    $app->page->add("dice/winner", $data);
    return $app->page->render([
        "title" => $title,
    ]);
});







$app->router->get("dice/quit", function () use ($app) {
    $app->session->destroy();
    return $app->response->redirect("dice/index");
});





//
//
// $app->router->any(["GET", "POST"], "dice", function () use ($app) {
//
//
//
//
//     $title = "Tärningsspel 100";
//     $game = $_SESSION["diceGame"] ?? null;
//     $playerName = $_POST["playerName"] ?? null;
//
//
//     if (isset($_POST["startGame"])) {
//             $_SESSION["diceGame"] = $_SESSION["diceGame"] ?? new Game();
//             $game = $_SESSION["diceGame"];
//         try {
//             $game->addPlayers($playerName);
//         } catch (\Exception $e) {
//             $game->setMessage($e->getMessage());
//         }
//     }
//
//
//
//     if (isset($_POST["quit"])) {
//         $game = null;
//         session_destroy();
//     }
//
//     if (isset($_POST["rollWhoStarts"])) {
//         $game->rollWhoStarts();
//     }
//
//     if (isset($_POST["startRound"])) {
//         $game->startRound();
//     }
//
//     if (isset($_POST["playRound"])) {
//         echo "PLAYROUND";
//     }
//
//     if (isset($_POST["endRound"])) {
//         echo "ENDING";
//         $game->getRound()->endRound();
//     }
//
//
//
//     $data = [
//       "title" => $title,
//       "game" => $game,
//       "type" => "POST"
//     ];
//
//     if ($game) {
//         $state = $game->getState();
//         foreach ($game->getPlayers() as $player) {
//             echo "Player: " . $player->getName() . "<br>";
//         }
//
//         echo "State: " . $game->getState() . "<br>";
//         switch ($state) {
//             case 0:
//                 $app->page->add("dice/enterName", $data);
//                 break;
//             case 1:
//                 $app->page->add("dice/whoStarts", $data);
//                 break;
//             case 2:
//                 $app->page->add("dice/game", $data);
//                 break;
//         }
//     } else {
//         $app->page->add("dice/enterName", $data);
//     }
//
//     return $app->page->render([
//         "title" => $title,
//     ]);
// });
