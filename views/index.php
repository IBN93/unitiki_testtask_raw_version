<?php require_once "../templates/header.php";?>
        <h1 class="text-center">News feed <?php echo $tag_title_in_header ?></h1>
        <?php 
        foreach ($first_ten_news as $news_item) {
            $tags = $news_item->getTagsInfo();
            $str = '';
            foreach ($tags as $tag) {
                $str .= "<a href=\"index.php?tag_id={$tag['id']}\" class=\"btn btn-sm btn-outline-secondary mr-2\">{$tag['title']}</a>";
            }
            echo "<section class=\"news border rounded\">
                    <h2 class=\"text-center\">{$news_item->getTitle()}</h2>
                    <p>{$news_item->getText()}</p>
                    <p class=\"text-muted\">{$news_item->getDate()}</p>
                    <div class=\"news-tags\">$str</div>
                </section>";
        }
        ?>
<?php require_once "../templates/footer.php";?>
