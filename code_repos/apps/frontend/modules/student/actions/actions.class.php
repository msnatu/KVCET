<?php

/**
 * student actions.
 *
 * @package    KVCET
 * @subpackage student
 * @author     Natu
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class studentActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->course_types = CourseTypesTable::getInstance()->getCourseTypes();
  }

  public function executeSearchStudent($request) {
    $this->name = $request->getParameter('name');
    $courseType = $request->getParameter('course_type');
    $department = $request->getParameter('department');

    $query = StudentTable::getInstance()->searchStudent($this->name, $courseType, $department);
    $this->pager = new sfDoctrinePager('Student', 3);
    $this->pager->setQuery($query);
    $this->pager->setPage($request->getParameter('page', 1));
    $this->pager->init();
  }

}
