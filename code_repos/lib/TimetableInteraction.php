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

}