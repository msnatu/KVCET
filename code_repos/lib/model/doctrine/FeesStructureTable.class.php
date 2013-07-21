<?php

/**
 * FeesStructureTable
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class FeesStructureTable extends Doctrine_Table
{
  /**
   * Returns an instance of this class.
   *
   * @return object FeesStructureTable
   */
  public static function getInstance()
  {
    return Doctrine_Core::getTable('FeesStructure');
  }

  public function getFeesStructure($courseType, $acadYearNo) {
    $academic = new academicHelper();
    $batchStartYear = $academic->getBatchYear($acadYearNo);

    $feesStructure = Doctrine_Query::create()
      ->select('fs.amount, ft.id, ft.name')
      ->from('FeesStructure fs')
      ->leftJoin('fs.FeesCategory ft')
      ->where('fs.batch_start_year = ?', $batchStartYear)
      ->andWhere('fs.acad_year_no = ?', $acadYearNo)
      ->andWhere('fs.course_type = ?', $courseType)
      ->fetchArray();

    $data = array();

    foreach($feesStructure as $type) {
      $feeType = $type['FeesCategory']['id'];
      $data[$feeType] = $type['amount'];
    }

    return $data;
  }

  public function setFeesStructure($data) {
    $academic = new academicHelper();
    $batchStartYear = $academic->getBatchYear($data['year']);

    foreach($data as $fieldName => $amount) {
      $is_fee_type = substr_count($fieldName, 'fees_type');
      if($is_fee_type == 1) {
        $feesType = substr($fieldName, -1);
        $feesStructure = $this->getInstance()->findOneByBatchStartYearAndAcadYearNoAndCourseTypeAndFeesType(
          $batchStartYear,
          $data['year'],
          $data['course_type'],
          $feesType
        );
        if(!$feesStructure) {
          $feesStructure = new FeesStructure();
          $feesStructure->setBatchStartYear($batchStartYear);
          $feesStructure->setAcadYearNo($data['year']);
          $feesStructure->setCourseType($data['course_type']);
          $feesStructure->setFeesType($feesType);
        }
        $feesStructure->setAmount($amount);
        $feesStructure->save();
      }
    }

  }


}