<?php

class errorsActions extends sfActions
{
    public function executeError404(sfWebRequest $request)
    {
        return sfView::SUCCESS;
    }
}
