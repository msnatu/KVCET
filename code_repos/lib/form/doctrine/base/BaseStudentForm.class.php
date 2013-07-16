<?php

/**
 * Student form base class.
 *
 * @method Student getObject() Returns the current form's model object
 *
 * @package    KVCET
 * @subpackage form
 * @author     Natu
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseStudentForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                  => new sfWidgetFormInputHidden(),
      'student_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => true)),
      'first_name'          => new sfWidgetFormInputText(),
      'last_name'           => new sfWidgetFormInputText(),
      'admission_no'        => new sfWidgetFormInputText(),
      'admission_date'      => new sfWidgetFormDate(),
      'admission_mode'      => new sfWidgetFormInputText(),
      'department'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('StudDepartment'), 'add_empty' => true)),
      'dob'                 => new sfWidgetFormDate(),
      'gender'              => new sfWidgetFormInputCheckbox(),
      'address'             => new sfWidgetFormTextarea(),
      'city'                => new sfWidgetFormInputText(),
      'state'               => new sfWidgetFormInputText(),
      'pincode'             => new sfWidgetFormInputText(),
      'mobile'              => new sfWidgetFormInputText(),
      'email'               => new sfWidgetFormInputText(),
      'photo_id'            => new sfWidgetFormInputText(),
      'parent_first_name'   => new sfWidgetFormInputText(),
      'parent_last_name'    => new sfWidgetFormInputText(),
      'parent_gender'       => new sfWidgetFormInputCheckbox(),
      'parent_occupation'   => new sfWidgetFormInputText(),
      'parent_email'        => new sfWidgetFormInputText(),
      'parent_phone'        => new sfWidgetFormInputText(),
      'parent_mobile'       => new sfWidgetFormInputText(),
      'institution_name'    => new sfWidgetFormInputText(),
      'total_percent_marks' => new sfWidgetFormInputText(),
      'created_at'          => new sfWidgetFormDateTime(),
      'updated_at'          => new sfWidgetFormDateTime(),
      'deleted_at'          => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'student_id'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'required' => false)),
      'first_name'          => new sfValidatorString(array('max_length' => 64, 'required' => false)),
      'last_name'           => new sfValidatorString(array('max_length' => 64, 'required' => false)),
      'admission_no'        => new sfValidatorInteger(array('required' => false)),
      'admission_date'      => new sfValidatorDate(array('required' => false)),
      'admission_mode'      => new sfValidatorPass(array('required' => false)),
      'department'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('StudDepartment'), 'required' => false)),
      'dob'                 => new sfValidatorDate(array('required' => false)),
      'gender'              => new sfValidatorBoolean(array('required' => false)),
      'address'             => new sfValidatorString(array('max_length' => 1000, 'required' => false)),
      'city'                => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'state'               => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'pincode'             => new sfValidatorInteger(array('required' => false)),
      'mobile'              => new sfValidatorInteger(array('required' => false)),
      'email'               => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'photo_id'            => new sfValidatorInteger(array('required' => false)),
      'parent_first_name'   => new sfValidatorString(array('max_length' => 64, 'required' => false)),
      'parent_last_name'    => new sfValidatorString(array('max_length' => 64, 'required' => false)),
      'parent_gender'       => new sfValidatorBoolean(array('required' => false)),
      'parent_occupation'   => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'parent_email'        => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'parent_phone'        => new sfValidatorInteger(array('required' => false)),
      'parent_mobile'       => new sfValidatorInteger(array('required' => false)),
      'institution_name'    => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'total_percent_marks' => new sfValidatorNumber(array('required' => false)),
      'created_at'          => new sfValidatorDateTime(),
      'updated_at'          => new sfValidatorDateTime(),
      'deleted_at'          => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('student[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Student';
  }

}
