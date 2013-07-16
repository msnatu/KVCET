<?php

/**
 * profile actions.
 *
 * @package    KVCET
 * @subpackage profile
 * @author     Natu
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class profileActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->forward('default', 'module');
  }

  public function executeStudentProfile(sfWebRequest $request)
  {
    $this->successMsg = $this->getUser()->getFlash('admission_success');
    $studentId = $request->getParameter('id');
    $this->student = StudentTable::getInstance()->findOneByStudentId($studentId);
    if(!$this->student) {
      $this->forward404('Sorry! User not found');
    }
    $this->isEditable = false;
    if($this->getUser()->getGuardUser()->hasGroup('Admin')) {
      $this->isEditable = true;
    }
  }
}
