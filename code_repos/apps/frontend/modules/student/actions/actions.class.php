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

    $pagination = new zebra_pagination();
    $pagination->base_url('search?name='.$this->name);
    $pagination->navigation_position(isset($_GET['navigation_position']) && in_array($_GET['navigation_position'], array('left', 'right')) ? $_GET['navigation_position'] : 'outside');

    $this->recordsPerPage = 3;
    $this->offset = ($pagination->get_page() - 1) * $this->recordsPerPage;
    $this->searchedStudents = StudentTable::getInstance()->searchStudent($this->name, $courseType, $department, $this->offset, $this->recordsPerPage);
    $this->totalStudents = StudentTable::getInstance()->totalSearchStudents($this->name, $courseType, $department, $this->offset, $this->recordsPerPage);
    $pagination->records($this->totalStudents);
    $pagination->records_per_page($this->recordsPerPage);

    $this->pagination = $pagination;
  }

}
