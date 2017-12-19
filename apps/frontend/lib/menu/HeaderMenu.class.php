<?php

class HeaderMenu
{
    private const LINKS_FOR_AUTHORIZED_USER = [
        "Профиль" => "@user_profile",
        "Выход" => "@log_out",
    ];

    private const LINKS_FOR_UNAUTHORIZED_USER = [
        "Вход" => "@log_in",
        "Регистрация" => "@registration",
    ];

    private const LINKS_FROM_USER_ROLE = [
        UserRole::USER => [],
        UserRole::ADMIN => [
            "Список пользователей" => "@user_list",
        ],
    ];

    private $menuItems = [];

    public function generateItems()
    {
        $user = sfContext::getInstance()->getUser();

        $links = null;
        if (!$user->isAuthenticated())
        {
            $links = HeaderMenu::LINKS_FOR_UNAUTHORIZED_USER;
        }
        else
        {
            $links = array_merge(HeaderMenu::LINKS_FROM_USER_ROLE[$user->getUserRole()], HeaderMenu::LINKS_FOR_AUTHORIZED_USER);
        }

        foreach ($links as $title => $link)
        {
            $this->menuItems[] = new MenuItem($title, url_for($link));
        }
    }

    public function getMenuItems()
    {
        return $this->menuItems;
    }
}