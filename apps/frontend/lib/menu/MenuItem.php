<?php

class MenuItem
{
    private const ITEM_FORMAT = "<li> <a href='%2\$s'>%1\$s</a> </li>";

    public function generateItems($links)
    {
        $items = "";
        foreach ($links as $linkText => $routingLink)
        {
            $items .= $this->generateItem($linkText, $routingLink);
        }
        return $items;
    }

    private function generateItem($linkText, $routingLink)
    {
        $link = $this->convertRoutingLinkToHyperlinks($routingLink);
        return sprintf(MenuItem::ITEM_FORMAT, $linkText, $link);
    }

    private static function convertRoutingLinkToHyperlinks($routingLink)
    {
        return url_for($routingLink);
    }
}