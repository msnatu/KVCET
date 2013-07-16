<?php

/**
 * StudentTable
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class StudentTable extends Doctrine_Table
{
  /**
   * Returns an instance of this class.
   *
   * @return object StudentTable
   */
  public static function getInstance()
  {
    return Doctrine_Core::getTable('Student');
  }

  public function getPreviousStudent() {
    $student = $this->createQuery()
      ->orderBy('admission_no desc')
      ->limit(1)
      ->fetchOne();

    return $student;
  }

  public function addNewStudent($data) {
    $formHelper = new formHelper();
    $admissionDate = $formHelper->formatDate($data['admission_date']);
    $dob = $formHelper->formatDate($data['dob']);
    $user = new sfGuardUser();
    $user->setFirstName($data['first_name']);
    $user->setLastName($data['last_name']);
    $user->setEmailAddress($data['student_email']);
    $user->setUsername($data['student_email']);
    $user->setPassword('Welcome123');
    $user->save();

    $student = new Student();
    $student->setStudentId($user->getId());
    $student->setAdmissionNo($data['admission_no']);
    $student->setFirstName($data['first_name']);
    $student->setLastName($data['last_name']);
    $student->setDob($dob);
    $student->setGender($data['gender']);
    $student->setEmail($data['student_email']);
    $student->setAdmissionDate($admissionDate);
    $student->setDepartment($data['department']);
    $student->setAdmissionMode($data['admission_mode']);
    $student->save();

    return $student;
  }

  public function updateContactDetails($studentObj, $data) {
    $studentObj->setAddress($data['address']);
    $studentObj->setCity($data['city']);
    $studentObj->setState($data['state']);
    $studentObj->setPincode($data['pincode']);
    $studentObj->setMobile($data['mobile']);
    $studentObj->save();
  }

  public function updateParentDetails($studentObj, $data) {
    $studentObj->setParentFirstName($data['parent_first_name']);
    $studentObj->setParentLastName($data['parent_last_name']);
    $studentObj->setParentGender($data['relation']);
    $studentObj->setParentOccupation($data['parent_occupation']);
    $studentObj->setParentPhone($data['parent_phone']);
    $studentObj->setParentMobile($data['parent_mobile']);
    $studentObj->setParentEmail($data['parent_email']);

    $studentObj->setInstitutionName($data['institution_name']);
    $studentObj->setTotalPercentMarks($data['total_percent_marks']);

    $studentObj->save();
  }

  public function updatePersonalDetails($data) {
    $studentObj = $this->getInstance()->findOneByStudentId($data['student_id']);
    if(!$studentObj) {
      return false;
    }

    $studentObj->setAdmissionNo($data['admission_no']);
    $studentObj->setFirstName($data['first_name']);
    $studentObj->setLastName($data['last_name']);
    $studentObj->setDob($data['dob']);
    $studentObj->setGender($data['gender']);
    $studentObj->setEmail($data['student_email']);
    $studentObj->setAdmissionDate($data['admission_date']);
    $studentObj->setDepartment($data['department']);
    $studentObj->setAdmissionMode($data['admission_mode']);

    $studentObj->save();
    return $studentObj;
  }

}