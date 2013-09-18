<?php

/**
 * BaseTimetableAssignment
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $subject_id
 * @property integer $staff_id
 * @property integer $period_id
 * @property integer $day_no
 * @property Subjects $Subject
 * @property OtherUser $Staff
 * @property Period $Period
 * 
 * @method integer             getSubjectId()  Returns the current record's "subject_id" value
 * @method integer             getStaffId()    Returns the current record's "staff_id" value
 * @method integer             getPeriodId()   Returns the current record's "period_id" value
 * @method integer             getDayNo()      Returns the current record's "day_no" value
 * @method Subjects            getSubject()    Returns the current record's "Subject" value
 * @method OtherUser           getStaff()      Returns the current record's "Staff" value
 * @method Period              getPeriod()     Returns the current record's "Period" value
 * @method TimetableAssignment setSubjectId()  Sets the current record's "subject_id" value
 * @method TimetableAssignment setStaffId()    Sets the current record's "staff_id" value
 * @method TimetableAssignment setPeriodId()   Sets the current record's "period_id" value
 * @method TimetableAssignment setDayNo()      Sets the current record's "day_no" value
 * @method TimetableAssignment setSubject()    Sets the current record's "Subject" value
 * @method TimetableAssignment setStaff()      Sets the current record's "Staff" value
 * @method TimetableAssignment setPeriod()     Sets the current record's "Period" value
 * 
 * @package    KVCET
 * @subpackage model
 * @author     Natu
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseTimetableAssignment extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('timetable_assignment');
        $this->hasColumn('subject_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('staff_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('period_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('day_no', 'integer', null, array(
             'type' => 'integer',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Subjects as Subject', array(
             'local' => 'subject_id',
             'foreign' => 'id'));

        $this->hasOne('OtherUser as Staff', array(
             'local' => 'staff_id',
             'foreign' => 'user_id'));

        $this->hasOne('Period', array(
             'local' => 'period_id',
             'foreign' => 'id'));

        $timestampable0 = new Doctrine_Template_Timestampable(array(
             ));
        $softdelete0 = new Doctrine_Template_SoftDelete(array(
             ));
        $this->actAs($timestampable0);
        $this->actAs($softdelete0);
    }
}