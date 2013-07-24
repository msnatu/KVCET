<?php

/**
 * CourseTypesTable
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class CourseTypesTable extends Doctrine_Table
{
  /**
   * Returns an instance of this class.
   *
   * @return object CourseTypesTable
   */
  public static function getInstance()
  {
    return Doctrine_Core::getTable('CourseTypes');
  }

  public function getCourseTypes() {
    $data = array();
    $courseTypes = $this->createQuery()->fetchArray();
    foreach($courseTypes as $courseType) {
      $data['options'][] = $courseType['name'];
      $data['values'][] = $courseType['id'];
      $data['total_years'][] = $courseType['total_years'];
    }

    return $data;
  }

  public function getTotalYears($courseType) {
    $course = $this->createQuery()
      ->select('total_years')
      ->where('id = ?', $courseType)
      ->fetchArray();

    if(count($course) > 0) {
      return array('total_years' => $course[0]['total_years']);
    }

    return array();
  }
}