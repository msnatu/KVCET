<?php

/**
 * BaseOtherUser
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $user_id
 * @property string $first_name
 * @property string $last_name
 * @property string $email_address
 * @property integer $dept_id
 * @property sfGuardUser $GuardUser
 * @property Department $Department
 * @property Doctrine_Collection $TimetableAssignment
 * 
 * @method integer             getUserId()              Returns the current record's "user_id" value
 * @method string              getFirstName()           Returns the current record's "first_name" value
 * @method string              getLastName()            Returns the current record's "last_name" value
 * @method string              getEmailAddress()        Returns the current record's "email_address" value
 * @method integer             getDeptId()              Returns the current record's "dept_id" value
 * @method sfGuardUser         getGuardUser()           Returns the current record's "GuardUser" value
 * @method Department          getDepartment()          Returns the current record's "Department" value
 * @method Doctrine_Collection getTimetableAssignment() Returns the current record's "TimetableAssignment" collection
 * @method OtherUser           setUserId()              Sets the current record's "user_id" value
 * @method OtherUser           setFirstName()           Sets the current record's "first_name" value
 * @method OtherUser           setLastName()            Sets the current record's "last_name" value
 * @method OtherUser           setEmailAddress()        Sets the current record's "email_address" value
 * @method OtherUser           setDeptId()              Sets the current record's "dept_id" value
 * @method OtherUser           setGuardUser()           Sets the current record's "GuardUser" value
 * @method OtherUser           setDepartment()          Sets the current record's "Department" value
 * @method OtherUser           setTimetableAssignment() Sets the current record's "TimetableAssignment" collection
 * 
 * @package    KVCET
 * @subpackage model
 * @author     Natu
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseOtherUser extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('other_user');
        $this->hasColumn('user_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('first_name', 'string', 64, array(
             'type' => 'string',
             'length' => 64,
             ));
        $this->hasColumn('last_name', 'string', 64, array(
             'type' => 'string',
             'length' => 64,
             ));
        $this->hasColumn('email_address', 'string', 64, array(
             'type' => 'string',
             'length' => 64,
             ));
        $this->hasColumn('dept_id', 'integer', null, array(
             'type' => 'integer',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('sfGuardUser as GuardUser', array(
             'local' => 'user_id',
             'foreign' => 'id'));

        $this->hasOne('Department', array(
             'local' => 'dept_id',
             'foreign' => 'id'));

        $this->hasMany('TimetableAssignment', array(
             'local' => 'user_id',
             'foreign' => 'staff_id'));

        $timestampable0 = new Doctrine_Template_Timestampable(array(
             ));
        $softdelete0 = new Doctrine_Template_SoftDelete(array(
             ));
        $this->actAs($timestampable0);
        $this->actAs($softdelete0);
    }
}