<?php

/**
 * profile actions.
 *
 * @package    KVCET
 * @subpackage profile
 * @author     Natu
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class timetableActions extends sfActions
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

  public function executeViewClassroom($request)
  {
    $this->course_types = CourseTypesTable::getInstance()->getCourseTypes();
  }

  public function executeSearchClassroom($request) {
    $this->department = $request->getParameter('department');
    $this->batchYear = $request->getParameter('batch');

    $academicHelper = new academicHelper();
    $this->sections = $academicHelper->getSectionsDropDown($this->department);
    $student = new TimetableInteraction();
    $this->searchedStudents = $student->getUnassignedClassroomStudents($this->department, $this->batchYear);
  }

  public function executeAssignStudentsClassroom($request) {
    $studentIds = $request->getParameter('student_id');
    $section = $request->getParameter('section');
    $dept = $request->getParameter('department');
    $batch = $request->getParameter('batch');

    $student = new TimetableInteraction();
    $student->assignStudentClassroom($studentIds, $section, $dept);
    $this->redirect($this->generateUrl('timetable_search_classroom', array('department'=>$dept,'batch'=>$batch)));
  }

  public function executeSearchTimetable($request) {
    $this->course_types = CourseTypesTable::getInstance()->getCourseTypes();
  }

  public function executeShowTimetable($request) {
    $this->section = $request->getParameter('section_no');
    $this->batch = $request->getParameter('batch');
    $this->semester = $request->getParameter('semester');
    $this->department = $request->getParameter('department');

    $student = new TimetableInteraction();
    $periods = $student->getClassroomPeriods($this->department, $this->batch, $this->section, $this->semester);
    $this->classroomPeriods = $periods['periods'];
    $this->assignmentDetails = $periods['assignment_details'];
    $this->staffs = OtherUserTable::getInstance()->getStaffs($this->department);
    $this->subjects = SubjectsTable::getInstance()->getSubjects($this->department, $this->batch, $this->semester);

    $academicHelper = new academicHelper();
    $department = DepartmentTable::getInstance()->find($this->department);
    $this->dept = $department->getName();
    $this->sem = $academicHelper->getYearSuffix($this->semester);
  }

  public function executeGetAssignedPeriod($request) {
    $period = $request->getParameter('period_id');
    $dayNo = $request->getParameter('day_no');

    $student = new TimetableInteraction();
    $data = $student->getPeriodData($dayNo, $period);

    $this->getResponse()->setContentType('application/json');
    return $this->renderText(json_encode(array('data' => $data)));
  }

  public function executeAssignPeriod($request) {
    $values = $request->getPostParameters();
    $student = new TimetableInteraction();
    $student->assignPeriod($values);
    return sfView::NONE;
  }

  public function executeGetClassroomPeriods($request) {
    $section = $request->getParameter('section_no');
    $batch = $request->getParameter('batch');
    $sem = $request->getParameter('semester');
    $dept = $request->getParameter('department');

    $student = new TimetableInteraction();
    $periods = $student->getClassroomPeriods($dept, $batch, $section, $sem);
    return $this->renderText(json_encode(array('data' => $periods['periods'])));
  }


  public function executeManagePeriod($request) {
    $this->section = $request->getParameter('section_no');
    $this->batch = $request->getParameter('batch');
    $sem = $request->getParameter('semester');
    $dept = $request->getParameter('department');

    $student = new TimetableInteraction();
    $periods = $student->getClassroomPeriods($dept, $this->batch, $this->section, $sem);
    $this->classroomPeriods = $periods['periods'];
  }

}
