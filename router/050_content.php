<?php

$app->router->addController("content", "Oliver\Content\ContentController");
$app->router->addController("content/admin", "Oliver\Content\ContentAdminController");



// $app->router->get("content", function () use ($app) {
//     $obj = new Content();
//     $obj->injectApp($app);
//     return $obj->index();

//     $title = "Content | oophp";
//
//     $app->db->connect();
//     $sql = <<<EOD
// SELECT
// *,
// CASE
//     WHEN (deleted <= NOW()) THEN "isDeleted"
//     WHEN (published <= NOW()) THEN "isPublished"
//     ELSE "notPublished"
// END AS status
// FROM content
// ;
// EOD;
//
//     $res = $app->db->executeFetchAll($sql);
//
//     $app->page->add("content/menu");
//     $app->page->add("content/index", [
//         "res" => $res
//     ]);
//
//     return $app->page->render([
//         "title" => $title,
//     ]);
// });



// $app->router->get("content/pages", function () use ($app) {
//     $obj = new Content();
//     $obj->injectApp($app);
//     return $obj->pages();

    // $title = "Pages | oophp";
    //
    // $app->db->connect();
    // $sql = "SELECT * FROM content WHERE type = ?;";
    //
    // $res = $app->db->executeFetchAll($sql, ["page"]);
    //
    // $app->page->add("content/menu");
    // $app->page->add("content/pages", [
    //     "res" => $res
    // ]);
    //
    // return $app->page->render([
    //     "title" => $title,
    // ]);
// });





// $app->router->get("content/blog", function () use ($app) {
//     $obj = new Content();
//     $obj->injectApp($app);
//     return $obj->blog();

//     $title = "Blog | oophp";
//
    // $app->db->connect();
    // $sql = "SELECT * FROM content WHERE type = ? ORDER BY published DESC;";
    // $res = $app->db->executeFetchAll($sql, ["post"]);
//
//     $app->page->add("content/menu");
//     $app->page->add("content/blog", [
//         "res" => $res
//     ]);
//
//     return $app->page->render([
//         "title" => $title,
//     ]);
// });



// $app->router->get("content/blog/{slug}", function ($slug) use ($app) {
//     $obj = new Content();
//     $obj->injectApp($app);
//     return $obj->blogPost($slug);

//     $app->db->connect();
//     $sql = "SELECT * FROM content WHERE slug = ? AND type = ?;";
//     $res = $app->db->executeFetch($sql, [$slug, "post"]);
//
//     $title = $res->title." | oophp";
//
//     $tf = new TextFilter();
//     $filtersArray = explode(",", $res->filter);
//     $formattedText = $tf->parse($res->data, $filtersArray);
//
//     $app->page->add("content/menu");
//     $app->page->add("content/page", [
//         "res" => $res,
//         "formattedText"  => $formattedText
//     ]);
//
//     return $app->page->render([
//         "title" => $title,
//     ]);
// });




// $app->router->get("content/admin", function () use ($app) {
//     $obj = new Content();
//     $obj->injectApp($app);
//     return $obj->admin();

//     $title = "Admin | oophp";
//
//     $app->db->connect();
//     $sql = "SELECT * FROM content;";
//     $res = $app->db->executeFetchAll($sql);
//
//     $app->page->add("content/menu");
//     $app->page->add("content/admin", [
//         "res" => $res
//     ]);
//
//     return $app->page->render([
//         "title" => $title,
//     ]);
// });



// $app->router->get("content/admin/create", function () use ($app) {
//     $obj = new Content();
//     $obj->injectApp($app);
//     return $obj->create();

//     $title = "Admin create | oophp";
//
//     $app->page->add("content/menu");
//     $app->page->add("content/create", [
//     ]);
//
//     return $app->page->render([
//         "title" => $title,
//     ]);
// });
// $app->router->post("content/admin/create", function () use ($app) {
//     $obj = new Content();
//     $obj->injectApp($app);
//     return $obj->createPost();

//     $title = $app->request->getPost("title") ?? "";
//
//     $app->db->connect();
//     $sql = "INSERT INTO content (title) VALUES (?);";
//     $app->db->execute($sql, [$title]);
//     $id = $app->db->lastInsertId();
//
//     $app->response->redirect("content/admin/edit/{$id}");
// });



// $app->router->get("content/admin/edit/{id:digit}", function ($id) use ($app) {
//     $obj = new Content();
//     $obj->injectApp($app);
//     return $obj->edit($id);

//     $app->db->connect();
//     $sql = "SELECT * FROM content WHERE id = ?;";
//     $res = $app->db->executeFetch($sql, [$id]);
//
//     $title = "Redigera ".$res->title." | oophp";
//
//     $app->page->add("content/menu");
//     $app->page->add("content/edit", [
//         "res" => $res
//     ]);
//
//     return $app->page->render([
//         "title" => $title,
//     ]);
// });
// $app->router->post("content/admin/edit/{id:digit}", function ($id) use ($app) {
//     $obj = new Content();
//     $obj->injectApp($app);
//     return $obj->editPost($id);

//     $title = $app->request->getPost("title");
//     $path = $app->request->getPost("path");
//     $slug = $app->request->getPost("slug");
//     $data = $app->request->getPost("data");
//     $type = $app->request->getPost("type");
//     $filter = $app->request->getPost("filter");
//     $published = $app->request->getPost("published");
//
//     $path = $path ?: null;
//     $slug = $slug ?: null;
//
//     if ($type == "post" && !$slug) {
//         $slug = slugify($title);
//     }
//
//     if ($type == "page" && !$path) {
//         $path = slugify($title);
//     }
//
//     $app->db->connect();
//
//
//     $params = [$title, $path, $slug, $data, $type, $filter, $published, $id];
//
//     $sql = <<<EOD
// UPDATE
// content SET title=?, path=?, slug=?, data=?, type=?, filter=?,
// published =
//       CASE
//       WHEN type IS NOT NULL THEN
//         NOW()
//       ELSE
//         ?
//       END
// WHERE id = ?
// ;
// EOD;
//
//     $app->db->execute($sql, $params);
//
//     $app->response->redirect("content/admin");
// });



// $app->router->get("content/admin/delete/{id:digit}", function ($id) use ($app) {
//     $obj = new Content();
//     $obj->injectApp($app);
//     return $obj->delete($id);

//     $app->db->connect();
//     $sql = "SELECT * FROM content WHERE id = ?;";
//     $res = $app->db->executeFetch($sql, [$id]);
//
//     $title = "Radera ".$res->title." | oophp";
//
//     $app->page->add("content/menu");
//     $app->page->add("content/delete", [
//         "res" => $res
//     ]);
//
//     return $app->page->render([
//         "title" => $title,
//     ]);
// });
// $app->router->post("content/admin/delete/{id:digit}", function ($id) use ($app) {
//     $obj = new Content();
//     $obj->injectApp($app);
//     return $obj->deletePost($id);

//     $app->db->connect();
//     $sql = "UPDATE content SET deleted = NOW() WHERE id = ?;";
//     $app->db->execute($sql, [$id]);
//
//     $app->response->redirect("content/admin");
// });




// $app->router->any(["GET", "POST"], "content/admin/recreate/{id:digit}", function ($id) use ($app) {
//     $obj = new Content();
//     $obj->injectApp($app);
//     return $obj->recreate($id);

//     $app->db->connect();
//     $sql = "UPDATE content SET deleted = NULL WHERE id = ?;";
//     $app->db->execute($sql, [$id]);
//     $app->response->redirect("content/admin");
// });




// $app->router->get("content/admin/reset", function () use ($app) {
//     $obj = new Content();
//     $obj->injectApp($app);
//     return $obj->reset();

//     $title = "Admin reset | oophp";
//
//     $app->page->add("content/reset", [
//     ]);
//
//     $app->page->add("content/menu");
//     return $app->page->render([
//         "title" => $title,
//     ]);
// });



// $app->router->post("content/admin/reset", function () use ($app) {
//     $obj = new Content();
//     $obj->injectApp($app);
//     return $obj->resetPost($id);

//     $cfg = $app->get("configuration");
//     $config = $cfg->load("database");
//     $databaseConfig = $config["config"] ?? [];
//
//     // Restore the database to its original settings
//     $file   = "../sql/content/setup.sql";
//     $mysql  = "/usr/local/bin/mysql";
//     $output = null;
//
//     // Extract hostname and databasename from dsn
//     $dsnDetail = [];
//     preg_match("/mysql:host=(.+);dbname=([^;.]+)/", $databaseConfig["dsn"], $dsnDetail);
//     $host = $dsnDetail[1];
//     $database = $dsnDetail[2];
//     $login = $databaseConfig["username"];
//     $password = $databaseConfig["password"];
//
//     $command = "$mysql -h{$host} -u{$login} -p{$password} $database < $file 2>&1";
//     $output = [];
//     $status = null;
//     $res = exec($command, $output, $status);
//     $output = "<p>The command was: <code>$command</code>.<br>The command exit status was $status."
//         . "<br>The output from the command was:</p><pre>"
//         . print_r($output, 1);
//
//     $app->response->redirect("content");
// });




// $app->router->get("content/{path}", function ($path) use ($app) {
//     $obj = new Content();
//     $obj->injectApp($app);
//     return $obj->page($path);

//     $app->db->connect();
//     $sql = "SELECT * FROM content WHERE path = ? AND type = 'page';";
//     $res = $app->db->executeFetch($sql, [$path]);
//
//     $title = $res->title." | oophp";
//
//     $tf = new TextFilter();
//     $filtersArray = explode(",", $res->filter);
//     $formattedText = $tf->parse($res->data, $filtersArray);
//
//     $app->page->add("content/menu");
//     $app->page->add("content/page", [
//         "res" => $res,
//         "formattedText" => $formattedText
//     ]);
//
//     return $app->page->render([
//         "title" => $title,
//     ]);
// });
