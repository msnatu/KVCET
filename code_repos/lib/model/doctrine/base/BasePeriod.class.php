<?php

/**
 * BasePeriod
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $start_time
 * @property string $end_time
 * @property integer $batch_year
 * @property integer $dept_id
 * @property integer $semester
 * @property integer $section_no
 * @property boolean $is_break_time
 * @property Department $Department
 * @property Doctrine_Collection $TimetableAssignment
 * 
 * @method string              getStartTime()           Returns the current record's "start_time" value
 * @method string              getEndTime()             Returns the current record's "end_time" value
 * @method integer             getBatchYear()           Returns the current record's "batch_year" value
 * @method integer             getDeptId()              Returns the current record's "dept_id" value
 * @method integer             getSemester()            Returns the current record's "semester" value
 * @method integer             getSectionNo()           Returns the current record's "section_no" value
 * @method boolean             getIsBreakTime()         Returns the current record's "is_break_time" value
 * @method Department          getDepartment()          Returns the current record's "Department" value
 * @method Doctrine_Collection getTimetableAssignment() Returns the current record's "TimetableAssignment" collection
 * @method Period              setStartTime()           Sets the current record's "start_time" value
 * @method Period              setEndTime()             Sets the current record's "end_time" value
 * @method Period              setBatchYear()           Sets the current record's "batch_year" value
 * @method Period              setDeptId()              Sets the current record's "dept_id" value
 * @method Period              setSemester()            Sets the current record's "semester" value
 * @method Period              setSectionNo()           Sets the current record's "section_no" value
 * @method Period              setIsBreakTime()         Sets the current record's "is_break_time" value
 * @method Period              setDepartment()          Sets the current record's "Department" value
 * @method Period              setTimetableAssignment() Sets the current record's "TimetableAssignment" collection
 * 
 * @package    KVCET
 * @subpackage model
 * @author     Natu
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasePeriod extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('period');
        $this->hasColumn('start_time', 'string', 10, array(
             'type' => 'string',
             'length' => 10,
             ));
        $this->hasColumn('end_time', 'string', 10, array(
             'type' => 'string',
             'length' => 10,
             ));
        $this->hasColumn('batch_year', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('dept_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('semester', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('section_no', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('is_break_time', 'boolean', null, array(
             'type' => 'boolean',
             'default' => false,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Department', array(
             'local' => 'dept_id',
             'foreign' => 'id'));

        $this->hasMany('TimetableAssignment', array(
             'local' => 'id',
             'foreign' => 'period_id'));

        $timestampable0 = new Doctrine_Template_Timestampable(array(
             ));
        $softdelete0 = new Doctrine_Template_SoftDelete(array(
             ));
        $this->actAs($timestampable0);
        $this->actAs($softdelete0);
    }
}