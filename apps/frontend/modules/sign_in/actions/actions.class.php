<?php
/* @property form $form
 */
class sign_inActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
      $this->form = new sfForm();
      $this->form->setWidgets(array(
          'name'    => new sfWidgetFormInputText(),
          'email'   => new sfWidgetFormInputText(array('default' => 'me@example.com')),
          'subject' => new sfWidgetFormChoice(array('choices' => array('Subject A', 'Subject B', 'Subject C'))),
          'message' => new sfWidgetFormTextarea(),
      ));
  }
}
