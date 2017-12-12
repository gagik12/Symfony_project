<?php

class HeaderMenu
{
    private const LINKS_FOR_ADMIN = [
        "Profile" => "@user_profile",
        "User List" => "@user_list",
        "Log Out" => "@log_out",
    ];

    private const LINKS_FOR_USER = [
        "Profile" => "@user_profile",
        "Log Out" => "@log_out",
    ];

    public function generateItems()
    {
        $menuItems = [];
        $isAdmin = sfContext::getInstance()->getUser()->isAdmin();
        $links = ($isAdmin) ? HeaderMenu::LINKS_FOR_ADMIN : HeaderMenu::LINKS_FOR_USER;
        $this->menuItems = [];
        foreach ($links as $title => $link)
        {
            $menuItems[] = new MenuItem($title, url_for($link));
        }
        return $menuItems;
    }
}