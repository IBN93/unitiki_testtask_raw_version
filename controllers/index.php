<?php
$page_title ="Лента новостей - Главная";
require_once "../models/News.php";
require_once "../models/Tag.php";
$first_ten_news = News::getFirstTen(isset($_GET['tag_id']) ? $_GET['tag_id'] : false);
if (isset($_GET['tag_id'])) $tag_obj = new Tag($_GET['tag_id']);
$tag_title_in_header = isset($_GET['tag_id']) ? "on tag " . $tag_obj->getTitle() : '';
require_once "../views/index.php";
