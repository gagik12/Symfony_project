<?php
/**
 * Created by PhpStorm.
 * User: vadim
 * Date: 29.11.2017
 * Time: 15:38
 */

class PageAccessFilter extends sfBasicSecurityFilter
{
    public function execute($filterChain)
    {
        if ($pages = ($this->getParameter('pages')))
        {
            foreach ($pages as $page)
            {
                $module = isset($page['module']) ? $page['module'] : null;
                $action = isset($page['action']) ? $page['action'] : $this->context->getActionName();

                $login = isset($page['login']) ? $page['login'] : null;
                $secure = isset($page['secure']) ? $page['secure'] : null;

                if (($module != $this->context->getModuleName()) || ($action != $this->context->getActionName()))
                {
                    continue;
                }

                if (isset($login) and !$this->context->getUser()->isAuthenticated())
                {
                    $loginModule = isset($login['module']) ? $login['module'] : null;
                    $loginAction = isset($login['action']) ? $login['action'] : null;
                    if (isset($loginModule) and isset($loginAction))
                    {
                        $this->redirectToAction($loginModule, $loginAction);
                    }
                }

                $credential = $this->getUserCredential();
                if (isset($secure) and !is_null($credential) and !$this->context->getUser()->hasCredential($credential))
                {
                    $secureModule = isset($secure['module']) ? $secure['module'] : null;
                    $secureAction = isset($secure['action']) ? $secure['action'] : null;
                    if (isset($secureModule) and isset($secureAction))
                    {
                        $this->redirectToAction($secureModule, $secureAction);
                    }
                }
            }
        }
        parent::execute($filterChain);
    }

    protected function redirectToAction($module, $action)
    {
        $this->context->getController()->redirect($module . '/' . $action);
    }
}