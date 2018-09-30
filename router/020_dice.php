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
    $playerName = $app->request->getPost("playerName") ?? null;

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


$app->router->get("dice/autoPlay", function () use ($app) {
    $game = $app->session->get("dice");
    $game->autoPlay();
    $app->response->redirect("dice/game");
});

$app->router->get("dice/game", function () use ($app) {
    $title = "Tärningsspel 100";
    $game = $app->session->get("dice");

    if ($game->getWinner()) {
        $app->response->redirect("dice/winner");
        return;
    }

    if ($game->getCurrentPlayer()->getName() == "Dator") {
        $app->response->redirect("dice/autoPlay");
    }


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
    $game->getCurrentPlayer()->startNewRound();
    $app->response->redirect("dice/playRound");
});


$app->router->get("dice/playRound", function () use ($app) {
    $game = $app->session->get("dice");
    $game->getCurrentPlayer()->play();
    $app->response->redirect("dice/roundResult");
});


$app->router->get("dice/saveRound", function () use ($app) {
    $game = $app->session->get("dice");
    $game->getCurrentPlayer()->save();
    $game->nextPlayer($game->getTurn());
    $app->response->redirect("dice/game");
});


$app->router->get("dice/loseRound", function () use ($app) {
    $game = $app->session->get("dice");
    $game->getCurrentPlayer()->getRound()->lose();
    $game->nextPlayer($game->getTurn());
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
