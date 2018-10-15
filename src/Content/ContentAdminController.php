<?php
namespace Oliver\Content;

use Anax\Commons\AppInjectableInterface;
use Anax\Commons\AppInjectableTrait;

/**
 * @SuppressWarnings(PHPMD.TooManyPublicMethods)
 */
class ContentAdminController implements AppInjectableInterface
{
    use AppInjectableTrait;

    public function indexAction()
    {
        $title = "Admin | oophp";

        $this->app->db->connect();
        $sql = "SELECT * FROM content;";
        $res = $this->app->db->executeFetchAll($sql);

        $this->app->page->add("content/menu", [
            "baseUrl" => $this->app->request->getBaseUrl()
        ]);
        $this->app->page->add("content/admin/index", [
            "res" => $res
        ]);

        return $this->app->page->render([
            "title" => $title,
        ]);
    }


    public function createActionGet()
    {
        $title = "Admin create | oophp";

        $this->app->page->add("content/menu", [
            "baseUrl" => $this->app->request->getBaseUrl()
        ]);
        $this->app->page->add("content/admin/create", [
        ]);

        return $this->app->page->render([
            "title" => $title,
        ]);
    }


    public function createActionPost()
    {
        $title = $this->app->request->getPost("title") ?? "";

        $this->app->db->connect();
        $sql = "INSERT INTO content (title) VALUES (?);";
        $this->app->db->execute($sql, [$title]);
        $id = $this->app->db->lastInsertId();

        $this->app->response->redirect("content/admin/edit/{$id}");
    }


    public function editActionGet($id)
    {
        $this->app->db->connect();
        $sql = "SELECT * FROM content WHERE id = ?;";
        $res = $this->app->db->executeFetch($sql, [$id]);

        $title = "Redigera ".$res->title." | oophp";

        $this->app->page->add("content/menu", [
            "baseUrl" => $this->app->request->getBaseUrl()
        ]);
        $this->app->page->add("content/admin/edit", [
            "res" => $res
        ]);

        return $this->app->page->render([
            "title" => $title,
        ]);
    }


    public function editActionPost($id)
    {
        $title = $this->app->request->getPost("title");
        $path = $this->app->request->getPost("path");
        $slug = $this->app->request->getPost("slug");
        $data = $this->app->request->getPost("data");
        $type = $this->app->request->getPost("type");
        $filter = $this->app->request->getPost("filter");
        $published = $this->app->request->getPost("published");

        $path = $path ?: null;
        $slug = $slug ?: null;

        if ($type == "post" && !$slug) {
            $slug = slugify($title);
        }

        if ($type == "page" && !$path) {
            $path = slugify($title);
        }

        $params = [$title, $path, $slug, $data, $type, $filter, $published, $id];
        $sql = <<<EOD
UPDATE IGNORE
content SET title=?, path=?, slug=?, data=?, type=?, filter=?,
published =
      CASE
      WHEN type IS NOT NULL THEN
        NOW()
      ELSE
        ?
      END
WHERE id = ?
;
EOD;
        $this->app->db->connect();
        $this->app->db->executeFetch($sql, $params);
        $this->app->response->redirect("content/admin");
    }


    public function deleteActionGet($id)
    {
        $this->app->db->connect();
        $sql = "SELECT * FROM content WHERE id = ?;";
        $res = $this->app->db->executeFetch($sql, [$id]);

        $title = "Radera ".$res->title." | oophp";

        $this->app->page->add("content/menu", [
            "baseUrl" => $this->app->request->getBaseUrl()
        ]);
        $this->app->page->add("content/admin/delete", [
            "res" => $res
        ]);

        return $this->app->page->render([
            "title" => $title,
        ]);
    }


    public function deleteActionPost($id)
    {
        $this->app->db->connect();
        $sql = "UPDATE content SET deleted = NOW() WHERE id = ?;";
        $this->app->db->execute($sql, [$id]);

        $this->app->response->redirect("content/admin");
    }


    public function recreateAction($id)
    {
        $this->app->db->connect();
        $sql = "UPDATE content SET deleted = NULL WHERE id = ?;";
        $this->app->db->execute($sql, [$id]);
        $this->app->response->redirect("content/admin");
    }


    public function resetActionGet()
    {
        $title = "Admin reset | oophp";

        $this->app->page->add("content/menu", [
            "baseUrl" => $this->app->request->getBaseUrl()
        ]);
        $this->app->page->add("content/admin/reset", [
        ]);
        return $this->app->page->render([
            "title" => $title,
        ]);
    }


    public function resetActionPost()
    {
        $cfg = $this->app->get("configuration");
        $config = $cfg->load("database");
        $databaseConfig = $config["config"] ?? [];

        // Restore the database to its original settings
        $file   = "../sql/content/setup.sql";
        $mysql  = $databaseConfig["mysql"];
        $output = null;

        // Extract hostname and databasename from dsn
        $dsnDetail = [];
        preg_match("/mysql:host=(.+);dbname=([^;.]+)/", $databaseConfig["dsn"], $dsnDetail);
        $host = $dsnDetail[1];
        $database = $dsnDetail[2];
        $login = $databaseConfig["username"];
        $password = $databaseConfig["password"];

        $command = "$mysql -h{$host} -u{$login} -p{$password} $database < $file 2>&1";
        $output = [];
        $status = null;
        exec($command, $output, $status);
        $output = "<p>The command was: <code>$command</code>.<br>The command exit status was $status."
            . "<br>The output from the command was:</p><pre>"
            . print_r($output, 1);

        $this->app->response->redirect("content");
    }
}
