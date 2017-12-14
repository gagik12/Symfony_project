<?php

class HeaderMenu
{
    private const LINKS_FOR_ADMIN = [
        "Профиль" => "@user_profile",
        "Список пользователей" => "@user_list",
        "Выход" => "@log_out",
    ];

    private const LINKS_FOR_USER = [
        "Профиль" => "@user_profile",
        "Выход" => "@log_out",
    ];

    private const LINKS_FOR_UNAUTHORIZED_USER = [
        "Вход" => "@log_in",
        "Регистрация" => "@registration",
    ];

    public function generateItems()
    {
        $user = sfContext::getInstance()->getUser();

        $links = null;
        if(!$user->isAuthenticated())
        {
            $links = HeaderMenu::LINKS_FOR_UNAUTHORIZED_USER;
        }
        else
        {
            $links = ($user->isAdmin()) ? HeaderMenu::LINKS_FOR_ADMIN : HeaderMenu::LINKS_FOR_USER;
        }

        $menuItems = [];
        foreach ($links as $title => $link)
        {
            $menuItems[] = new MenuItem($title, url_for($link));
        }
        return $menuItems;
    }
}