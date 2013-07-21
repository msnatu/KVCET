<?php

/**
 * FeesStructure form base class.
 *
 * @method FeesStructure getObject() Returns the current form's model object
 *
 * @package    KVCET
 * @subpackage form
 * @author     Natu
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseFeesStructureForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'amount'           => new sfWidgetFormInputText(),
      'batch_start_year' => new sfWidgetFormInputText(),
      'acad_year_no'     => new sfWidgetFormInputText(),
      'fees_type'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('FeesCategory'), 'add_empty' => true)),
      'course_type'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CourseCategory'), 'add_empty' => true)),
      'created_at'       => new sfWidgetFormDateTime(),
      'updated_at'       => new sfWidgetFormDateTime(),
      'deleted_at'       => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'amount'           => new sfValidatorInteger(array('required' => false)),
      'batch_start_year' => new sfValidatorInteger(array('required' => false)),
      'acad_year_no'     => new sfValidatorInteger(array('required' => false)),
      'fees_type'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('FeesCategory'), 'required' => false)),
      'course_type'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CourseCategory'), 'required' => false)),
      'created_at'       => new sfValidatorDateTime(),
      'updated_at'       => new sfValidatorDateTime(),
      'deleted_at'       => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('fees_structure[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'FeesStructure';
  }

}
