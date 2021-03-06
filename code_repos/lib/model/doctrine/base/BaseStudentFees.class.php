<?php

/**
 * BaseStudentFees
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $student_id
 * @property integer $acad_year_no
 * @property date $date
 * @property integer $amount
 * @property integer $added_by
 * @property integer $challan_no
 * @property boolean $is_due_paid
 * @property Student $Stud
 * @property sfGuardUser $User
 * 
 * @method integer     getStudentId()    Returns the current record's "student_id" value
 * @method integer     getAcadYearNo()   Returns the current record's "acad_year_no" value
 * @method date        getDate()         Returns the current record's "date" value
 * @method integer     getAmount()       Returns the current record's "amount" value
 * @method integer     getAddedBy()      Returns the current record's "added_by" value
 * @method integer     getChallanNo()    Returns the current record's "challan_no" value
 * @method boolean     getIsDuePaid()    Returns the current record's "is_due_paid" value
 * @method Student     getStud()         Returns the current record's "Stud" value
 * @method sfGuardUser getUser()         Returns the current record's "User" value
 * @method StudentFees setStudentId()    Sets the current record's "student_id" value
 * @method StudentFees setAcadYearNo()   Sets the current record's "acad_year_no" value
 * @method StudentFees setDate()         Sets the current record's "date" value
 * @method StudentFees setAmount()       Sets the current record's "amount" value
 * @method StudentFees setAddedBy()      Sets the current record's "added_by" value
 * @method StudentFees setChallanNo()    Sets the current record's "challan_no" value
 * @method StudentFees setIsDuePaid()    Sets the current record's "is_due_paid" value
 * @method StudentFees setStud()         Sets the current record's "Stud" value
 * @method StudentFees setUser()         Sets the current record's "User" value
 * 
 * @package    KVCET
 * @subpackage model
 * @author     Natu
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseStudentFees extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('student_fees');
        $this->hasColumn('student_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('acad_year_no', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('date', 'date', null, array(
             'type' => 'date',
             ));
        $this->hasColumn('amount', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('added_by', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('challan_no', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('is_due_paid', 'boolean', null, array(
             'type' => 'boolean',
             'default' => false,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Student as Stud', array(
             'local' => 'student_id',
             'foreign' => 'student_id'));

        $this->hasOne('sfGuardUser as User', array(
             'local' => 'added_by',
             'foreign' => 'id'));

        $timestampable0 = new Doctrine_Template_Timestampable(array(
             ));
        $softdelete0 = new Doctrine_Template_SoftDelete(array(
             ));
        $this->actAs($timestampable0);
        $this->actAs($softdelete0);
    }
}