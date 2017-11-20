<?php

/**
 * hello_world actions.
 *
 * @package    Symfony_project
 * @subpackage hello_world
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class hello_worldActions extends sfActions
{
    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */

    public function executeIndex(sfWebRequest $request)
    {
        $this->userName = $request->getParameter('username');
    }
}
