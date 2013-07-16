<?php

/**
 * BaseStudent
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $student_id
 * @property string $first_name
 * @property string $last_name
 * @property integer $admission_no
 * @property date $admission_date
 * @property tinyint $admission_mode
 * @property integer $department
 * @property date $dob
 * @property boolean $gender
 * @property string $address
 * @property string $city
 * @property string $state
 * @property integer $pincode
 * @property integer $mobile
 * @property string $email
 * @property integer $photo_id
 * @property string $parent_first_name
 * @property string $parent_last_name
 * @property boolean $parent_gender
 * @property string $parent_occupation
 * @property string $parent_email
 * @property integer $parent_phone
 * @property integer $parent_mobile
 * @property string $institution_name
 * @property float $total_percent_marks
 * @property sfGuardUser $User
 * @property Department $StudDepartment
 * 
 * @method integer     getStudentId()           Returns the current record's "student_id" value
 * @method string      getFirstName()           Returns the current record's "first_name" value
 * @method string      getLastName()            Returns the current record's "last_name" value
 * @method integer     getAdmissionNo()         Returns the current record's "admission_no" value
 * @method date        getAdmissionDate()       Returns the current record's "admission_date" value
 * @method tinyint     getAdmissionMode()       Returns the current record's "admission_mode" value
 * @method integer     getDepartment()          Returns the current record's "department" value
 * @method date        getDob()                 Returns the current record's "dob" value
 * @method boolean     getGender()              Returns the current record's "gender" value
 * @method string      getAddress()             Returns the current record's "address" value
 * @method string      getCity()                Returns the current record's "city" value
 * @method string      getState()               Returns the current record's "state" value
 * @method integer     getPincode()             Returns the current record's "pincode" value
 * @method integer     getMobile()              Returns the current record's "mobile" value
 * @method string      getEmail()               Returns the current record's "email" value
 * @method integer     getPhotoId()             Returns the current record's "photo_id" value
 * @method string      getParentFirstName()     Returns the current record's "parent_first_name" value
 * @method string      getParentLastName()      Returns the current record's "parent_last_name" value
 * @method boolean     getParentGender()        Returns the current record's "parent_gender" value
 * @method string      getParentOccupation()    Returns the current record's "parent_occupation" value
 * @method string      getParentEmail()         Returns the current record's "parent_email" value
 * @method integer     getParentPhone()         Returns the current record's "parent_phone" value
 * @method integer     getParentMobile()        Returns the current record's "parent_mobile" value
 * @method string      getInstitutionName()     Returns the current record's "institution_name" value
 * @method float       getTotalPercentMarks()   Returns the current record's "total_percent_marks" value
 * @method sfGuardUser getUser()                Returns the current record's "User" value
 * @method Department  getStudDepartment()      Returns the current record's "StudDepartment" value
 * @method Student     setStudentId()           Sets the current record's "student_id" value
 * @method Student     setFirstName()           Sets the current record's "first_name" value
 * @method Student     setLastName()            Sets the current record's "last_name" value
 * @method Student     setAdmissionNo()         Sets the current record's "admission_no" value
 * @method Student     setAdmissionDate()       Sets the current record's "admission_date" value
 * @method Student     setAdmissionMode()       Sets the current record's "admission_mode" value
 * @method Student     setDepartment()          Sets the current record's "department" value
 * @method Student     setDob()                 Sets the current record's "dob" value
 * @method Student     setGender()              Sets the current record's "gender" value
 * @method Student     setAddress()             Sets the current record's "address" value
 * @method Student     setCity()                Sets the current record's "city" value
 * @method Student     setState()               Sets the current record's "state" value
 * @method Student     setPincode()             Sets the current record's "pincode" value
 * @method Student     setMobile()              Sets the current record's "mobile" value
 * @method Student     setEmail()               Sets the current record's "email" value
 * @method Student     setPhotoId()             Sets the current record's "photo_id" value
 * @method Student     setParentFirstName()     Sets the current record's "parent_first_name" value
 * @method Student     setParentLastName()      Sets the current record's "parent_last_name" value
 * @method Student     setParentGender()        Sets the current record's "parent_gender" value
 * @method Student     setParentOccupation()    Sets the current record's "parent_occupation" value
 * @method Student     setParentEmail()         Sets the current record's "parent_email" value
 * @method Student     setParentPhone()         Sets the current record's "parent_phone" value
 * @method Student     setParentMobile()        Sets the current record's "parent_mobile" value
 * @method Student     setInstitutionName()     Sets the current record's "institution_name" value
 * @method Student     setTotalPercentMarks()   Sets the current record's "total_percent_marks" value
 * @method Student     setUser()                Sets the current record's "User" value
 * @method Student     setStudDepartment()      Sets the current record's "StudDepartment" value
 * 
 * @package    KVCET
 * @subpackage model
 * @author     Natu
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseStudent extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('student');
        $this->hasColumn('student_id', 'integer', 64, array(
             'type' => 'integer',
             'length' => 64,
             ));
        $this->hasColumn('first_name', 'string', 64, array(
             'type' => 'string',
             'length' => 64,
             ));
        $this->hasColumn('last_name', 'string', 64, array(
             'type' => 'string',
             'length' => 64,
             ));
        $this->hasColumn('admission_no', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('admission_date', 'date', null, array(
             'type' => 'date',
             ));
        $this->hasColumn('admission_mode', 'tinyint', 1, array(
             'type' => 'tinyint',
             'length' => 1,
             ));
        $this->hasColumn('department', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('dob', 'date', null, array(
             'type' => 'date',
             ));
        $this->hasColumn('gender', 'boolean', null, array(
             'type' => 'boolean',
             ));
        $this->hasColumn('address', 'string', 1000, array(
             'type' => 'string',
             'length' => 1000,
             ));
        $this->hasColumn('city', 'string', 200, array(
             'type' => 'string',
             'length' => 200,
             ));
        $this->hasColumn('state', 'string', 200, array(
             'type' => 'string',
             'length' => 200,
             ));
        $this->hasColumn('pincode', 'integer', 10, array(
             'type' => 'integer',
             'length' => 10,
             ));
        $this->hasColumn('mobile', 'integer', 15, array(
             'type' => 'integer',
             'length' => 15,
             ));
        $this->hasColumn('email', 'string', 100, array(
             'type' => 'string',
             'length' => 100,
             ));
        $this->hasColumn('photo_id', 'integer', 64, array(
             'type' => 'integer',
             'length' => 64,
             ));
        $this->hasColumn('parent_first_name', 'string', 64, array(
             'type' => 'string',
             'length' => 64,
             ));
        $this->hasColumn('parent_last_name', 'string', 64, array(
             'type' => 'string',
             'length' => 64,
             ));
        $this->hasColumn('parent_gender', 'boolean', null, array(
             'type' => 'boolean',
             ));
        $this->hasColumn('parent_occupation', 'string', 100, array(
             'type' => 'string',
             'length' => 100,
             ));
        $this->hasColumn('parent_email', 'string', 100, array(
             'type' => 'string',
             'length' => 100,
             ));
        $this->hasColumn('parent_phone', 'integer', 20, array(
             'type' => 'integer',
             'length' => 20,
             ));
        $this->hasColumn('parent_mobile', 'integer', 20, array(
             'type' => 'integer',
             'length' => 20,
             ));
        $this->hasColumn('institution_name', 'string', 200, array(
             'type' => 'string',
             'length' => 200,
             ));
        $this->hasColumn('total_percent_marks', 'float', null, array(
             'type' => 'float',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('sfGuardUser as User', array(
             'local' => 'student_id',
             'foreign' => 'id'));

        $this->hasOne('Department as StudDepartment', array(
             'local' => 'department',
             'foreign' => 'id'));

        $timestampable0 = new Doctrine_Template_Timestampable(array(
             ));
        $softdelete0 = new Doctrine_Template_SoftDelete(array(
             ));
        $this->actAs($timestampable0);
        $this->actAs($softdelete0);
    }
}