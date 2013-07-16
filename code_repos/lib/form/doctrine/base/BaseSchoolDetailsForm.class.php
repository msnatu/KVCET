<?php

/**
 * SchoolDetails form base class.
 *
 * @method SchoolDetails getObject() Returns the current form's model object
 *
 * @package    KVCET
 * @subpackage form
 * @author     Natu
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseSchoolDetailsForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                  => new sfWidgetFormInputHidden(),
      'student_id'          => new sfWidgetFormInputText(),
      'institution_name'    => new sfWidgetFormInputText(),
      'total_percent_marks' => new sfWidgetFormInputText(),
      'created_at'          => new sfWidgetFormDateTime(),
      'updated_at'          => new sfWidgetFormDateTime(),
      'deleted_at'          => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'student_id'          => new sfValidatorInteger(array('required' => false)),
      'institution_name'    => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'total_percent_marks' => new sfValidatorNumber(array('required' => false)),
      'created_at'          => new sfValidatorDateTime(),
      'updated_at'          => new sfValidatorDateTime(),
      'deleted_at'          => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('school_details[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SchoolDetails';
  }

}
