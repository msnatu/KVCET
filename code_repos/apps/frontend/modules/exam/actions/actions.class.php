<?php

/**
 * profile actions.
 *
 * @package    KVCET
 * @subpackage profile
 * @author     Natu
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class examActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    if ($this->getUser()->getGuardUser()->hasGroup('DOP')) {
      $this->setTemplate('dop');
    } else if ($this->getUser()->getGuardUser()->hasGroup('Director')) {
      $this->setTemplate('director');
    }
  }

  public function executeViewSubjects($request)
  {
//    $this->course_types = CourseTypesTable::getInstance()->getCourseTypes();
  }

  public function executeSearchSubject($request) {
    $this->department = $request->getParameter('department');
    $this->semester = $request->getParameter('semester');
    $this->batchYear = $request->getParameter('batch');
    $this->searchedSubjects = SubjectsTable::getInstance()->findByDeptIdAndSemester($this->department, $this->semester);
  }

  public function executeAddSubject($request) {
    $this->dept = $request->getParameter('dept');
    $this->sem = $request->getParameter('sem');
    $this->batch = $request->getParameter('batch');
    if($request->getMethod() == 'POST') {
      $values = $request->getPostParameters();
      SubjectsTable::getInstance()->addNewSubject($values);
      $this->redirect($this->generateUrl('search_subject', array('department'=>$this->dept,'batch'=>$this->batch,'semester'=>$this->sem)));
    }
  }

  public function executeEditSubject($request)
  {
    if ($request->isMethod('POST')) {
      $values = $request->getPostParameters();
      $subject = SubjectsTable::getInstance()->find($values['id']);
      $subject->setName($values['name']);
      $subject->setCode($values['code']);
      $subject->save();
      $this->redirect($this->generateUrl('search_subject', array('department'=>$values['dept'],'batch'=>$values['batch'],'semester'=>$values['sem'])));
    } else {
      $this->dept = $request->getParameter('dept');
      $this->sem = $request->getParameter('sem');
      $this->batch = $request->getParameter('batch');
      $this->subjectId = $request->getParameter('id');
      $subject = SubjectsTable::getInstance()->find($this->subjectId);
      $this->subjectName = $subject->getName();
      $this->subjectCode = $subject->getCode();
    }
  }

}
