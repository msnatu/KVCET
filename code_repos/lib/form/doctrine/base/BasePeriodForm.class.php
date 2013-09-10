<?php

/**
 * Period form base class.
 *
 * @method Period getObject() Returns the current form's model object
 *
 * @package    KVCET
 * @subpackage form
 * @author     Natu
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePeriodForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'start_time'    => new sfWidgetFormInputText(),
      'end_time'      => new sfWidgetFormInputText(),
      'batch_year'    => new sfWidgetFormInputText(),
      'dept_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Department'), 'add_empty' => true)),
      'semester'      => new sfWidgetFormInputText(),
      'section_no'    => new sfWidgetFormInputText(),
      'is_break_time' => new sfWidgetFormInputCheckbox(),
      'created_at'    => new sfWidgetFormDateTime(),
      'updated_at'    => new sfWidgetFormDateTime(),
      'deleted_at'    => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'start_time'    => new sfValidatorNumber(array('required' => false)),
      'end_time'      => new sfValidatorNumber(array('required' => false)),
      'batch_year'    => new sfValidatorInteger(array('required' => false)),
      'dept_id'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Department'), 'required' => false)),
      'semester'      => new sfValidatorInteger(array('required' => false)),
      'section_no'    => new sfValidatorInteger(array('required' => false)),
      'is_break_time' => new sfValidatorBoolean(array('required' => false)),
      'created_at'    => new sfValidatorDateTime(),
      'updated_at'    => new sfValidatorDateTime(),
      'deleted_at'    => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('period[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Period';
  }

}
