<?php

/**
 * StudentFees form base class.
 *
 * @method StudentFees getObject() Returns the current form's model object
 *
 * @package    KVCET
 * @subpackage form
 * @author     Natu
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseStudentFeesForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'student_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Stud'), 'add_empty' => true)),
      'acad_year_no' => new sfWidgetFormInputText(),
      'date'         => new sfWidgetFormDate(),
      'amount'       => new sfWidgetFormInputText(),
      'added_by'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => true)),
      'challan_no'   => new sfWidgetFormInputText(),
      'created_at'   => new sfWidgetFormDateTime(),
      'updated_at'   => new sfWidgetFormDateTime(),
      'deleted_at'   => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'student_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Stud'), 'required' => false)),
      'acad_year_no' => new sfValidatorInteger(array('required' => false)),
      'date'         => new sfValidatorDate(array('required' => false)),
      'amount'       => new sfValidatorInteger(array('required' => false)),
      'added_by'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'required' => false)),
      'challan_no'   => new sfValidatorInteger(array('required' => false)),
      'created_at'   => new sfValidatorDateTime(),
      'updated_at'   => new sfValidatorDateTime(),
      'deleted_at'   => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('student_fees[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'StudentFees';
  }

}
