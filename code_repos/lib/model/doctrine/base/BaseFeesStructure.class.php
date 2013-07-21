<?php

/**
 * BaseFeesStructure
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $amount
 * @property integer $batch_start_year
 * @property integer $acad_year_no
 * @property integer $fees_type
 * @property integer $course_type
 * @property FeesTypes $FeesCategory
 * @property CourseTypes $CourseCategory
 * 
 * @method integer       getAmount()           Returns the current record's "amount" value
 * @method integer       getBatchStartYear()   Returns the current record's "batch_start_year" value
 * @method integer       getAcadYearNo()       Returns the current record's "acad_year_no" value
 * @method integer       getFeesType()         Returns the current record's "fees_type" value
 * @method integer       getCourseType()       Returns the current record's "course_type" value
 * @method FeesTypes     getFeesCategory()     Returns the current record's "FeesCategory" value
 * @method CourseTypes   getCourseCategory()   Returns the current record's "CourseCategory" value
 * @method FeesStructure setAmount()           Sets the current record's "amount" value
 * @method FeesStructure setBatchStartYear()   Sets the current record's "batch_start_year" value
 * @method FeesStructure setAcadYearNo()       Sets the current record's "acad_year_no" value
 * @method FeesStructure setFeesType()         Sets the current record's "fees_type" value
 * @method FeesStructure setCourseType()       Sets the current record's "course_type" value
 * @method FeesStructure setFeesCategory()     Sets the current record's "FeesCategory" value
 * @method FeesStructure setCourseCategory()   Sets the current record's "CourseCategory" value
 * 
 * @package    KVCET
 * @subpackage model
 * @author     Natu
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseFeesStructure extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('fees_structure');
        $this->hasColumn('amount', 'integer', 64, array(
             'type' => 'integer',
             'length' => 64,
             ));
        $this->hasColumn('batch_start_year', 'integer', 64, array(
             'type' => 'integer',
             'length' => 64,
             ));
        $this->hasColumn('acad_year_no', 'integer', 64, array(
             'type' => 'integer',
             'length' => 64,
             ));
        $this->hasColumn('fees_type', 'integer', 64, array(
             'type' => 'integer',
             'length' => 64,
             ));
        $this->hasColumn('course_type', 'integer', 64, array(
             'type' => 'integer',
             'length' => 64,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('FeesTypes as FeesCategory', array(
             'local' => 'fees_type',
             'foreign' => 'id'));

        $this->hasOne('CourseTypes as CourseCategory', array(
             'local' => 'course_type',
             'foreign' => 'id'));

        $timestampable0 = new Doctrine_Template_Timestampable(array(
             ));
        $softdelete0 = new Doctrine_Template_SoftDelete(array(
             ));
        $this->actAs($timestampable0);
        $this->actAs($softdelete0);
    }
}