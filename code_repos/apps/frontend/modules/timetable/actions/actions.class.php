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
    $section = $request->getParameter('section_no');
    $dept = $request->getParameter('department');
    $batch = $request->getParameter('batch');
    $sem = $request->getParameter('semester');

    $student = new TimetableInteraction();
    $periods = $student->getClassroomPeriods($dept, $batch, $section, $sem);
    $this->classroomPeriods = $periods['periods'];
    $this->assignmentDetails = $periods['assignment_details'];
  }
}
