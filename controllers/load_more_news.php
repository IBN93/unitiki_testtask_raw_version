<?php
require_once "../db.php";
require_once "../models/News.php";
$postData = file_get_contents('php://input');
$data = json_decode($postData, true);
$startFrom = $data['startfrom'];
$tag_id = $data['tag_id'];
$query = $tag_id == 0 ? "SELECT id FROM news ORDER BY date DESC LIMIT $startFrom, 10"
                      : "SELECT id FROM news WHERE id IN (SELECT news_id FROM tag_list WHERE tag_id=$tag_id) ORDER BY date DESC LIMIT $startFrom, 10";
$result = $mysqli->query($query);
$news = [];
while ($row = $result->fetch_assoc()) {
    $news[] = new News($row['id']);
}
$output = '';
foreach ($news as $news_item) {
    $tags = $news_item->getTagsInfo();
    $str = '';
    foreach ($tags as $tag) {
        $str .= "<a href=\"index.php?tag_id={$tag['id']}\" class=\"btn btn-sm btn-outline-secondary mr-2\">{$tag['title']}</a>";
    }
    $output .= "<section class=\"news border rounded\">
            <h2 class=\"text-center\">{$news_item->getTitle()}</h2>
            <p>{$news_item->getText()}</p>
            <p class=\"text-muted\">{$news_item->getDate()}</p>
            <div class=\"news-tags\">$str</div>
                </section>";
}

echo $output;
