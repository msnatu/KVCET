<?php

/**
 * StudentVaryingFees form base class.
 *
 * @method StudentVaryingFees getObject() Returns the current form's model object
 *
 * @package    KVCET
 * @subpackage form
 * @author     Natu
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseStudentVaryingFeesForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'student_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Stud'), 'add_empty' => true)),
      'acad_year_no' => new sfWidgetFormInputText(),
      'fees_type'    => new sfWidgetFormInputText(),
      'route_id'     => new sfWidgetFormInputText(),
      'created_at'   => new sfWidgetFormDateTime(),
      'updated_at'   => new sfWidgetFormDateTime(),
      'deleted_at'   => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'student_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Stud'), 'required' => false)),
      'acad_year_no' => new sfValidatorInteger(array('required' => false)),
      'fees_type'    => new sfValidatorInteger(array('required' => false)),
      'route_id'     => new sfValidatorInteger(array('required' => false)),
      'created_at'   => new sfValidatorDateTime(),
      'updated_at'   => new sfValidatorDateTime(),
      'deleted_at'   => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('student_varying_fees[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'StudentVaryingFees';
  }

}
