<?php
require_once "../db.php";

class Tag
{
    private $id;
    private $title;

    public function __construct($id)
    {
        global $mysqli;
        $query = "SELECT title FROM tags WHERE id=$id";
        $result = $mysqli->query($query);
        $tag_data = $result->fetch_assoc();
        $this->id = $id;
        $this->title = $tag_data['title'];
    }

    public function getTitle()
    {
        return $this->title;
    }
}
