<?php

/**
 * StudentFeesTable
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class StudentFeesTable extends Doctrine_Table
{
  /**
   * Returns an instance of this class.
   *
   * @return object StudentFeesTable
   */
  public static function getInstance()
  {
    return Doctrine_Core::getTable('StudentFees');
  }

  public function feesEntry($studentId, $userId, $data) {
    $fees = new StudentFees();
    $fees->setStudentId($studentId);
    $fees->setAddedBy($userId);
    $fees->setAmount($data['amount']);
    $fees->setChallanNo($data['challan_no']);
    $fees->setDate($data['entry_date']);
    $fees->save();
  }

}