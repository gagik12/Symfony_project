<?php

class MenuItem
{
    private $title;
    private $link;

    public function __construct($title, $link)
    {
        $this->title = $title;
        $this->link = $link;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getLink()
    {
        return $this->link;
    }
}