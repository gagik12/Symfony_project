<?php

/* @property form $form */
class sign_inActions extends sfActions
{
    public function executeIndex(sfWebRequest $request)
    {
        $this->form = new sfForm();
        $this->form->setWidgets([
            'name' => new sfWidgetFormInputText(),
            'email' => new sfWidgetFormInputText(['default' => '']),
            'subject' => new sfWidgetFormChoice(['choices' => ['Subject A', 'Subject B', 'Subject C']]),
            'message' => new sfWidgetFormTextarea(),
        ]);
    }
}
