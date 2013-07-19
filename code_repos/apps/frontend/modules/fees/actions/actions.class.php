<?php

/**
 * fees actions.
 *
 * @package    KVCET
 * @subpackage fees
 * @author     Natu
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class feesActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    if($this->getUser()->getGuardUser()->hasGroup('Admin')) {
      $this->setTemplate('admin');
    } else if($this->getUser()->getGuardUser()->hasGroup('Director')) {
      $this->setTemplate('director');
    }
  }

  public function executeFeesStructure()
  {

  }
}
