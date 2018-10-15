<?php
namespace Oliver;

$app->router->any(["GET", "POST"], "textFilter", function () use ($app) {
    $textFilter = new TextFilter();

    $title = "Text Filter | oophp";

    $example = $app->request->getGet("example") ?? null;
    $text = $app->request->getPost("text") ?? "";
    $filters = $app->request->getPost("filters") ?? "";

    if ($example) {
        $filtersArray = [$example];
        $text = $textFilter->getText($example);
        $filters = implode(", ", $filtersArray);
    } else {
        $filtersArray = explode(", ", $filters);
    }
    $formatted = $textFilter->parse($text, $filtersArray);


    $app->page->add("textFilter", [
        "filters"   => $filters,
        "text"      => $text,
        "formatted" => $formatted
    ]);

    return $app->page->render([
        "title" => $title,
    ]);
});
