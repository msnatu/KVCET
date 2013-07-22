<?php

/**
 * dashboard actions.
 *
 * @package    KVCET
 * @subpackage dashboard
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class dashboardActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    if($this->getUser()->getGuardUser()->hasGroup('DOP')) {
      $this->setTemplate('dop');
    } else if($this->getUser()->getGuardUser()->hasGroup('Director')) {
      $this->setTemplate('director');
    }
  }
}
