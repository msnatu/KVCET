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
    if ($this->getUser()->getGuardUser()->hasGroup('DOP')) {
      $this->setTemplate('dop');
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

  public function executeFeesCategories($request)
  {
    $this->feesTypes = FeesTypesTable::getInstance()->getAllTypes();
  }

  public function executeAddFeesCategory($request)
  {
    $this->formType = 'add';
    $this->setTemplate('feesCategoryForm');
    if ($request->isMethod('POST')) {
      $categoryName = $request->getParameter('category_name');
      $feeCategory = new FeesTypes();
      $feeCategory->setName($categoryName);
      $feeCategory->save();
      $this->redirect('fees/fees-categories');
    }
  }

  public function executeEditFeesCategory($request)
  {
    $this->formType = 'edit';
    $this->setTemplate('feesCategoryForm');
    if ($request->isMethod('POST')) {
      $feesTypeId = $request->getParameter('fees_type_id');
      $categoryName = $request->getParameter('category_name');
      $feeCategory = FeesTypesTable::getInstance()->find($feesTypeId);
      $feeCategory->setName($categoryName);
      $feeCategory->save();
      $this->redirect('fees/fees-categories');
    } else {
      $this->feesTypeId = $request->getParameter('id');
      $feeCategory = FeesTypesTable::getInstance()->find($this->feesTypeId);
      $this->categoryName = $feeCategory->getName();
    }
  }

  public function executeFeesDashboard($request)
  {
    $this->studentId = $request->getParameter('id');
    $this->student = StudentTable::getInstance()->findOneByStudentId($this->studentId);
    $this->studentName = $this->student->getFirstName();

    $this->feesAssignmentSuccessMsg = $this->getUser()->getFlash('fees_assignment_success');
    $this->feesEntrySuccess = $this->getUser()->getFlash('fees_entry_success');

    $academic = new academicHelper();
    $acadYearNo = $academic->getAcadYearNo($this->student->getBatchYear());
    $this->batchYearText = $academic->getBatchYearText($acadYearNo);
  }

  public function executeAssignment($request)
  {
    $this->feesAssignmentErrorMsg = '';
    if ($request->isMethod('POST')) {
      $this->studentId = $request->getParameter('student_id');
      $student = StudentTable::getInstance()->findOneByStudentId($this->studentId);
      $this->studentName = $student->getFirstName();
      $this->routeTypes = TransportFeesTable::getInstance()->getRouteTypes();
      $postValues = $request->getPostParameters();

      $varyingFee = StudentVaryingFeesTable::getInstance()->setStudentFees($student, $postValues);
      if($varyingFee == false) {
        $this->feesAssignmentErrorMsg = 'The selected fees has been already assigned to the student';
      } else {
        $this->getUser()->setFlash('fees_assignment_success', 'Fees for ' . $this->studentName . ' has been assigned successfully');
        $this->redirect('fees/feesDashboard?id=' . $this->studentId);
      }
    } else {
      $this->studentId = $request->getParameter('id');
      $this->student = StudentTable::getInstance()->findOneByStudentId($this->studentId);
      $this->studentName = $this->student->getFirstName();
      $this->routeTypes = TransportFeesTable::getInstance()->getRouteTypes();
    }
  }

  public function executeAddStudentFees($request)
  {
    if ($request->isMethod('POST')) {
      $studentId = $request->getParameter('student_id');
      $postValues = $request->getPostParameters();
      StudentFeesTable::getInstance()->feesEntry($studentId, $this->getUser()->getGuardUser()->getId(), $postValues);
      $this->getUser()->setFlash('fees_entry_success', 'Fees Entry has been added successfully');
      $this->redirect('fees/feesDashboard?id=' . $studentId);
    } else {
      $this->studentId = $request->getParameter('id');
      $this->student = StudentTable::getInstance()->findOneByStudentId($this->studentId);
      $academicHelper = new academicHelper();
      $this->academicYears = $academicHelper->getTotalYearsList($this->student->getCourseType());
      $this->studentName = $this->student->getFirstName();
    }
  }

  public function executeEditStudentFees($request)
  {
    if ($request->isMethod('POST')) {
      $postValues = $request->getPostParameters();
      StudentFeesTable::getInstance()->editFeesEntry($this->getUser()->getGuardUser()->getId(), $postValues);
      $this->getUser()->setFlash('fees_entry_success', 'Fees Entry has been edited successfully');
      $this->redirect('fees/feesDashboard?id=' . $postValues['student_id']);
    } else {
      $this->entryId = $request->getParameter('id');
      $this->feesEntry = StudentFeesTable::getInstance()->find($this->entryId);
      $student = $this->feesEntry->getStud();
      $this->studentId = $student->getStudentId();
      $this->studentName = $student->getFirstName();
      $academicHelper = new academicHelper();
      $this->academicYears = $academicHelper->getTotalYearsList($student->getCourseType());
    }
  }

  public function executeStudentPaymentHistory($request)
  {
    $this->studentId = $request->getParameter('id');
    $this->student = StudentTable::getInstance()->findOneByStudentId($this->studentId);
    $this->studentName = $this->student->getFirstName();
    $this->isEditable = false;
    if ($this->getUser()->getGuardUser()->hasGroup('Director')) {
      $this->isEditable = true;
    }
    $academic = new academicHelper();
    $this->currentAcadYearNo = $academic->getAcadYearNo($this->student->getBatchYear());
    $this->batchYearText = $academic->getBatchYearText($this->currentAcadYearNo);

    for($acadYearNo = 1; $acadYearNo <= $this->currentAcadYearNo; $acadYearNo++) {
      $feesStructure[$acadYearNo] = StudentFeesTable::getInstance()->getStudentFeesStructure($this->student, $acadYearNo);
    }

    $this->feesStructure = $feesStructure;
    $this->feesPaid = StudentFeesTable::getInstance()->getPaidFees($this->student);
    $this->feesDiscount = FeesDiscountTable::getInstance()->getFeesDiscount($this->student);
    $this->feesEntrySuccess = $this->getUser()->getFlash('fees_entry_success');
  }

  public function executeAddFeesDiscount($request)
  {
    if ($request->isMethod('POST')) {
      $studentId = $request->getParameter('student_id');
      $postValues = $request->getPostParameters();
      FeesDiscountTable::getInstance()->addDiscount($postValues);
      $this->getUser()->setFlash('fees_entry_success', 'Discount has been added successfully');
      $this->redirect('fees/feesDashboard?id=' . $studentId);
    } else {
      $this->studentId = $request->getParameter('id');
      $this->student = StudentTable::getInstance()->findOneByStudentId($this->studentId);
      $academicHelper = new academicHelper();
      $this->academicYears = $academicHelper->getTotalYearsList($this->student->getCourseType());
      $this->studentName = $this->student->getFirstName();
    }
  }

  public function executeEditFeesDiscount($request)
  {
    if ($request->isMethod('POST')) {
      $postValues = $request->getPostParameters();
      FeesDiscountTable::getInstance()->editFeesDiscount($postValues);
      $this->getUser()->setFlash('fees_entry_success', 'Discount has been edited successfully');
      $this->redirect('fees/studentPaymentHistory?id=' . $postValues['student_id']);
    } else {
      $this->discountId = $request->getParameter('id');
      $this->feesDiscount = FeesDiscountTable::getInstance()->find($this->discountId);
      $student = $this->feesDiscount->getStud();
      $this->studentId = $student->getStudentId();
      $this->studentName = $student->getFirstName();
      $academicHelper = new academicHelper();
      $this->academicYears = $academicHelper->getTotalYearsList($student->getCourseType());
    }
  }

  public function executeDueList($request)
  {

  }

}