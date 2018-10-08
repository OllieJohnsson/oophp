<?php
namespace Oliver\Movie;

/**
 * Show all movies.
 */
$app->router->get("movie", function () use ($app) {
    $title = "Movie database | oophp";
    $searchTerm = $app->request->getGet("search") ?? null;
    $searchRes = "";

    $app->db->connect();

    if (!$searchTerm) {
        $sql = "SELECT * FROM movie;";
        $res = $app->db->executeFetchAll($sql);
    } else {
        $sql = "SELECT * FROM movie WHERE title LIKE ? OR year LIKE ?;";
        $res = $app->db->executeFetchAll($sql, ["%".$searchTerm."%", "%".$searchTerm."%"]);

        if (!$res) {
            $sql = "SELECT * FROM movie;";
            $res = $app->db->executeFetchAll($sql);
            $searchRes = "Hittade inget på sökningen <b>".$searchTerm;
        } else {
            $searchRes = $res;
        }
    }

    $app->page->add("movie/search", [
        "searchRes" => $searchRes
    ]);
    $app->page->add("movie/index", [
        "res" => $res
    ]);

    return $app->page->render([
        "title" => $title,
    ]);
});






/**
 * Edit movie get.
 */
$app->router->get("movie/edit", function () use ($app) {
    $id = $app->request->getGet("id");

    $app->db->connect();
    $sql = "SELECT * FROM movie WHERE id = ?";
    $res = $app->db->executeFetchAll($sql, [$id]);

    $title = "Redigera ". $res[0]->title. " | oophp";

    $app->page->add("movie/edit", [
        "res" => $res[0],
        "link" => "",
        "linkName" => "Redigera",
        "title" => "Redigera ".$res[0]->title
    ]);

    return $app->page->render([
        "title" => $title,
    ]);
});



/**
 * Edit movie post.
 */
$app->router->post("movie/edit", function () use ($app) {
    $id = $app->request->getGet("id");
    $title = $app->request->getPost("title");
    $image = $app->request->getPost("image");
    $year = $app->request->getPost("year");

    $app->db->connect();
    $sql = "UPDATE movie SET title = ?, image = ?, year = ? WHERE id = ?;";
    $res = $app->db->execute($sql, [$title, $image, $year, $id]);

    $app->response->redirect("movie");
});



/**
 * Add movie get.
 */
$app->router->get("movie/add", function () use ($app) {
    $title = "Lägg till film | oophp";

    $defaultMovie = (object) [
        "title" => "",
        "image" => "img/movie/"
    ];

    $app->page->add("movie/edit", [
        "res" => $defaultMovie,
        "link" => "add",
        "linkName" => "Lägg till",
        "title" => "Lägg till en ny film"
    ]);
    return $app->page->render([
        "title" => $title,
    ]);
});




/**
 * Add movie post.
 */
$app->router->post("movie/add", function () use ($app) {
    $title = $app->request->getPost("title");
    $image = $app->request->getPost("image");
    $year = $app->request->getPost("year");

    $app->db->connect();
    $sql = "INSERT INTO movie (title, image, year) VALUES (?, ?, ?);";
    $app->db->execute($sql, [$title, $image, $year]);

    $app->response->redirect("movie");
});




/**
 * Delete movie post.
 */
$app->router->post("movie/delete", function () use ($app) {
    $id = $app->request->getPost("id");

    $app->db->connect();
    $sql = "DELETE FROM movie WHERE id = ?;";
    $app->db->execute($sql, [$id]);

    $app->response->redirect("movie");
});
