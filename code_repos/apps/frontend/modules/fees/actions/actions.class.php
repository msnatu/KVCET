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
    if ($this->getUser()->getGuardUser()->hasGroup('Admin')) {
      $this->setTemplate('admin');
    } else if ($this->getUser()->getGuardUser()->hasGroup('Director')) {
      $this->setTemplate('director');
    }
  }

  public function executeFeesStructure()
  {
    $this->course_types = CourseTypesTable::getInstance()->getCourseTypes();
  }

  public function executeViewFeesStructure($request)
  {
    $this->acadYearNo = $request->getParameter('acad_year_no');
    $this->courseType = $request->getParameter('course_type');
    $this->isEditable = ($this->getUser()->getGuardUser()->hasGroup('Director')) ? true : false;

    $academic = new academicHelper();
    $this->batchYearText = $academic->getBatchYearText($this->acadYearNo);
    $courseName = CourseTypesTable::getInstance()->find($this->courseType);
    $this->courseName = ($courseName) ? $courseName->getName() : '';

    $this->feesStructure = FeesStructureTable::getInstance()->getFeesStructure($this->courseType, $this->acadYearNo);
    $this->feesTypes = FeesTypesTable::getInstance()->getAllTypes();
  }

  public function executeSetFeesStructure($request)
  {
    $this->successMsg = $this->getUser()->getFlash('edit_fees_structure_success');
    $this->acadYearNo = $request->getParameter('year');
    $this->courseType = $request->getParameter('course_type');

    $academic = new academicHelper();
    $this->batchYearText = $academic->getBatchYearText($this->acadYearNo);
    $courseName = CourseTypesTable::getInstance()->find($this->courseType);
    $this->courseName = ($courseName) ? $courseName->getName() : '';

    $this->feesStructure = FeesStructureTable::getInstance()->getFeesStructure($this->courseType, $this->acadYearNo);
    $this->feesTypes = FeesTypesTable::getInstance()->getAllTypes();

    if ($request->isMethod('POST')) {
      $postParams = $request->getPostParameters();
      FeesStructureTable::getInstance()->setFeesStructure($postParams);
      $this->getUser()->setFlash('edit_fees_structure_success', 'Fees Structure has been added successfully!');
      $this->redirect('fees/setFeesStructure?year=' . $this->acadYearNo . '&course_type=' . $this->courseType);
    }

  }

  public function executeGetCourseTotalYears($request)
  {
    $courseType = $request->getParameter('course_type');
    $totalYears = CourseTypesTable::getInstance()->getTotalYears($courseType);

    $this->getResponse()->setContentType('application/json');
    return $this->renderText(json_encode($totalYears));
  }
}
