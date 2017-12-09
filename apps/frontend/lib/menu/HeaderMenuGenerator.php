<?php

class HeaderMenuGenerator extends MenuItem implements MenuGenerator
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

    private const MENU_FORMAT = "<ul>%s</ul>";

    public function generateMenu()
    {
        $isAdmin = sfContext::getInstance()->getUser()->isAdmin();
        $links = ($isAdmin) ? HeaderMenuGenerator::LINKS_FOR_ADMIN : HeaderMenuGenerator::LINKS_FOR_USER;
        $items = $this->generateItems($links);
        return sprintf(HeaderMenuGenerator::MENU_FORMAT, $items);
    }
}