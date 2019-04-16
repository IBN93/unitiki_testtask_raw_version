<?php

require_once "../db.php";
require_once "Tag.php";

class News
{
    private $id;
    private $title;
    private $text;
    private $date;
    private $tags;

    public function __construct($id)
    {
        global $mysqli;
        $query = "SELECT title, text, date FROM news WHERE id=$id";
        $result = $mysqli->query($query);
        $news_data = $result->fetch_assoc();
        $this->id = $id;
        $this->title = $news_data['title'];
        $this->text = $news_data['text'];
        $this->date = $news_data['date'];

        $query = "SELECT tag_id FROM tag_list WHERE news_id=$id ORDER BY tag_id ASC";
        $result = $mysqli->query($query);
        $news_tags = [];
        while ($tags_data = $result->fetch_assoc()) {
            $news_tags[] = $tags_data['tag_id'];
        }
        $this->tags = $news_tags;
    }

    public static function getFirstTen($tag_id = false)
    {
        if (!$tag_id) {
            global $mysqli;
            $query = "SELECT * FROM news ORDER BY date DESC LIMIT 10";
            $result = $mysqli->query($query);
            $ten_news = [];
            while ($news_item = $result->fetch_assoc()) {
                $ten_news[] = new News($news_item['id']);
            }
            return $ten_news;
        } else {
            global $mysqli;
            $query = "SELECT news_id FROM tag_list WHERE tag_id=$tag_id";
            $result = $mysqli->query($query);
            $news_ids = [];
            while ($news_id = $result->fetch_assoc()) {
                $news_ids[] = $news_id['news_id'];
            }
            $new_query = "SELECT * FROM news WHERE "; 
            foreach ($news_ids as $new_id) {
                $new_query .= "id=$new_id OR ";
            }
            $new_query = substr($new_query, 0, -3); //убираем последний OR из запроса
            $new_query .= "ORDER BY date DESC LIMIT 10";
            $new_result = $mysqli->query($new_query);
            $ten_news = [];
            while ($news_item = $new_result->fetch_assoc()) {
                $ten_news[] = new News($news_item['id']);
            }
            return $ten_news;
        }
    }

    public function getTitle() 
    {
        return $this->title;
    }

    public function getText() 
    {
        return $this->text;
    }

    public function getDate() 
    {
        return $this->date;
    }

    public function getTags() 
    {
        return $this->tags;
    }

    public function getTagsInfo()
    {
        $news_tags = $this->tags;
        $tags_titles = [];
        foreach ($news_tags as $news_tag) {
            $tag = new Tag($news_tag);
            $tags_titles[] = [
                "id" => $news_tag,
                "title" => $tag->getTitle()
            ];
        }
        return $tags_titles;
    }
}
