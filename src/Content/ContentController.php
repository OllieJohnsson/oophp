<?php
namespace Oliver\Content;

use Anax\Commons\AppInjectableInterface;
use Anax\Commons\AppInjectableTrait;
use Oliver\TextFilter;

/**
 * @SuppressWarnings(PHPMD.TooManyPublicMethods)
 */
class ContentController implements AppInjectableInterface
{
    use AppInjectableTrait;

    public function indexAction()
    {
        $title = "Content | oophp";

        $this->app->db->connect();
        $sql = <<<EOD
SELECT
*,
CASE
    WHEN (deleted <= NOW()) THEN "isDeleted"
    WHEN (published <= NOW()) THEN "isPublished"
    ELSE "notPublished"
END AS status
FROM content
;
EOD;
        $res = $this->app->db->executeFetchAll($sql);

        $this->app->page->add("content/menu", [
            "baseUrl" => $this->app->request->getBaseUrl()
        ]);
        $this->app->page->add("content/index", [
            "res" => $res
        ]);

        return $this->app->page->render([
            "title" => $title,
        ]);
    }



    public function pagesAction($path = null)
    {
        $this->app->db->connect();
        if (!$path) {
            $title = "Pages | oophp";

            $sql = "SELECT * FROM content WHERE type = ?;";

            $res = $this->app->db->executeFetchAll($sql, ["page"]);

            $this->app->page->add("content/menu", [
                "baseUrl" => $this->app->request->getBaseUrl()
            ]);
            $this->app->page->add("content/pages", [
                "res" => $res
            ]);
        } else {
            $sql = "SELECT * FROM content WHERE path = ? AND type = 'page';";
            $res = $this->app->db->executeFetch($sql, [$path]);

            $title = $res->title." | oophp";

            $textFilter = new TextFilter();
            $filtersArray = explode(",", $res->filter);
            $formattedText = $textFilter->parse($res->data, $filtersArray);

            $this->app->page->add("content/menu", [
                "baseUrl" => $this->app->request->getBaseUrl()
            ]);
            $this->app->page->add("content/page", [
                "res" => $res,
                "formattedText" => $formattedText
            ]);
        }

        return $this->app->page->render([
            "title" => $title,
        ]);

    }



    public function blogAction($slug = null)
    {
        $this->app->db->connect();

        if (!$slug) {
            $sql = "SELECT * FROM content WHERE type = ? ORDER BY published DESC;";
            $res = $this->app->db->executeFetchAll($sql, ["post"]);

            $title = "Blog | oophp";

            $this->app->page->add("content/menu", [
                "baseUrl" => $this->app->request->getBaseUrl()
            ]);
            $this->app->page->add("content/blog", [
                "res" => $res
            ]);
        } else {
            $sql = "SELECT * FROM content WHERE slug = ? AND type = ?;";
            $res = $this->app->db->executeFetch($sql, [$slug, "post"]);

            $title = $res->title." | oophp";

            $textFilter = new TextFilter();
            $filtersArray = explode(",", $res->filter);
            $formattedText = $textFilter->parse($res->data, $filtersArray);

            $this->app->page->add("content/menu", [
                "baseUrl" => $this->app->request->getBaseUrl()
            ]);
            $this->app->page->add("content/page", [
                "res" => $res,
                "formattedText"  => $formattedText
            ]);
        }

        return $this->app->page->render([
            "title" => $title,
        ]);
    }


    /**
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function adminAction($path = null, $id = null)
    {
    }
}
