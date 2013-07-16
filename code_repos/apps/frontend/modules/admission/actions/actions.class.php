<?php

/**
 * admission actions.
 *
 * @package    KVCET
 * @subpackage admission
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class admissionActions extends sfActions
{
  /**
   * Executes index action
   *
   * @param sfRequest $request A request object
   */
  public function executeIndex(sfWebRequest $request)
  {
    if ($request->isMethod('POST')) {
      $formData = $request->getPostParameters();
      $student = StudentTable::getInstance()->addNewStudent($formData);
      if ($student) {
        $this->getUser()->setAttribute('admission_student_id', $student->getStudentId());
        $this->redirect('admission/contactDetails');
      } else {
        $this->forward404('Sorry! Your form has some errors.');
      }
    } else {
      $studentId = $request->getParameter('id');
      if(isset($studentId)) {
        //edit form
        $this->formType = "edit";
        $this->student = StudentTable::getInstance()->findOneByStudentId($studentId);
        if(!$this->student) {
          $this->forward404('Sorry! User not found.');
        }
      } else {
        //add form
        $this->formType = "add";
        $prevStudent = StudentTable::getInstance()->getPreviousStudent();
        $this->admissionNo = $prevStudent->getAdmissionNo() + 1;
        $this->admissionDate = date('d-m-Y');
      }
    }
    $this->departments = DepartmentTable::getInstance()->getDepartments();
  }

  public function executeContactDetails(sfWebRequest $request)
  {
    $studentId = $this->getUser()->getAttribute('admission_student_id');
    $this->student = StudentTable::getInstance()->findOnebyStudentId($studentId);
    if ($request->isMethod('POST')) {
      $formData = $request->getPostParameters();
      StudentTable::getInstance()->updateContactDetails($this->student, $formData);
      $this->redirect('admission/parentDetails');
    }
  }

  public function executeParentDetails(sfWebRequest $request)
  {
    $studentId = $this->getUser()->getAttribute('admission_student_id');
    $this->student = StudentTable::getInstance()->findOnebyStudentId($studentId);
    if ($request->isMethod('POST')) {
      $formData = $request->getPostParameters();
      StudentTable::getInstance()->updateParentDetails($this->student, $formData);
      $this->getUser()->setFlash('admission_success', 'Student '. $this->student->getFirstName() . ' has been added successfully to the system.');
      $this->redirect('profile/studentProfile?id=' . $studentId);
    }
  }

  public function executeEditPersonalDetails($request) {
    $formData = $request->getPostParameters();
    StudentTable::getInstance()->updatePersonalDetails($formData);
    $this->getUser()->setAttribute('admission_student_id', $formData['student_id']);
    $this->redirect('admission/contactDetails');
  }
}
