<?php
/**
 * Created by JetBrains PhpStorm.
 * User: natu
 * Date: 4/9/13
 * Time: 11:33 PM
 * To change this template use File | Settings | File Templates.
 */

class TimetableInteraction {

  public function getUnassignedClassroomStudents($department, $batchYear) {
    $unAssignedStudents = Doctrine_Query::create()
        ->select('c.section_no, s.student_id, s.first_name, s.last_name')
        ->from('Student s')
        ->leftJoin('s.StudentClassroom c')
        ->where('s.department = ?', $department)
        ->andWhere('s.batch_year = ?', $batchYear)
        ->orderBy('c.section_no, s.first_name')
        ->execute();

    return $unAssignedStudents;
  }

  public function assignStudentClassroom($studentIds, $section, $department) {
    foreach ($studentIds as $studentId) {
      $isExistingStudent = StudentClassroomTable::getInstance()->findOneByStudentId($studentId);
      if ($isExistingStudent) {
        $classroom = $isExistingStudent;
      } else {
        $classroom = new StudentClassroom();
      }
      $classroom->setStudentId($studentId);
      $classroom->setDeptId($department);
      $classroom->setSectionNo($section);
      $classroom->save();
    }
  }

  public function getClassroomPeriods($dept, $batch_year, $section, $sem) {
    $periods = Doctrine_Query::create()
        ->from('Period')
        ->where('batch_year = ?', $batch_year)
        ->andWhere('dept_id = ?', $dept)
        ->andWhere('section_no = ?', $section)
        ->andWhere('semester = ?', $sem)
        ->fetchArray();

    $periodIds = array();
    foreach ($periods as $p) {
      $periodIds[] = $p['id'];
    }

    $assignedClassrooms = array();
    if (count($periodIds) > 0) {
      $assignments = Doctrine_Query::create()
          ->select('ta.*, su.name, st.first_name')
          ->from('TimetableAssignment ta')
          ->leftJoin('ta.Subject su')
          ->leftJoin('ta.Staff st')
          ->whereIn('period_id', $periodIds)
          ->fetchArray();
      foreach ($assignments as $assignment) {
        $assignedClassrooms[$assignment['period_id']] = $assignment;
      }
    }

    return array(
      'periods' => $periods,
      'assignment_details' => $assignedClassrooms
    );
  }

  public function getPeriodData($dayNo, $periodId) {
    $assignment = Doctrine_Query::create()
        ->from('TimetableAssignment ta')
        ->where('period_id = ?', $periodId)
        ->andWhere('day_no = ?', $dayNo)
        ->fetchArray();

    return count($assignment)  > 0 ? $assignment[0] : array();
  }

  public function assignPeriod($data) {
    $assignment = TimetableAssignmentTable::getInstance()->findOneByPeriodId($data['period_id']);
    if(!$assignment) {
      $assignment = new TimetableAssignment();
    }
    $assignment->setDayNo($data['day_no']);
    $assignment->setPeriodId($data['period_id']);
    $assignment->setStaffId($data['staff_id']);
    $assignment->setSubjectId($data['subject_id']);
    $assignment->save();
  }

}