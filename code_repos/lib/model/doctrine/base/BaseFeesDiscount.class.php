<?php

/**
 * BaseFeesDiscount
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $student_id
 * @property integer $acad_year_no
 * @property integer $amount
 * @property string $description
 * @property Student $Stud
 * 
 * @method integer      getStudentId()    Returns the current record's "student_id" value
 * @method integer      getAcadYearNo()   Returns the current record's "acad_year_no" value
 * @method integer      getAmount()       Returns the current record's "amount" value
 * @method string       getDescription()  Returns the current record's "description" value
 * @method Student      getStud()         Returns the current record's "Stud" value
 * @method FeesDiscount setStudentId()    Sets the current record's "student_id" value
 * @method FeesDiscount setAcadYearNo()   Sets the current record's "acad_year_no" value
 * @method FeesDiscount setAmount()       Sets the current record's "amount" value
 * @method FeesDiscount setDescription()  Sets the current record's "description" value
 * @method FeesDiscount setStud()         Sets the current record's "Stud" value
 * 
 * @package    KVCET
 * @subpackage model
 * @author     Natu
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseFeesDiscount extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('fees_discount');
        $this->hasColumn('student_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('acad_year_no', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('amount', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('description', 'string', 1000, array(
             'type' => 'string',
             'length' => 1000,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Student as Stud', array(
             'local' => 'student_id',
             'foreign' => 'student_id'));

        $timestampable0 = new Doctrine_Template_Timestampable(array(
             ));
        $softdelete0 = new Doctrine_Template_SoftDelete(array(
             ));
        $this->actAs($timestampable0);
        $this->actAs($softdelete0);
    }
}