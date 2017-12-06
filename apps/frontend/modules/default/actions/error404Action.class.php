<?php

class error404Action extends sfAction
{
    public function execute($request)
    {
        return sfView::SUCCESS;
    }
}