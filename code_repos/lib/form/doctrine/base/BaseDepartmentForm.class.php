<?php

/**
 * Department form base class.
 *
 * @method Department getObject() Returns the current form's model object
 *
 * @package    KVCET
 * @subpackage form
 * @author     Natu
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseDepartmentForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'name'           => new sfWidgetFormInputText(),
      'course_type'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CourseCategory'), 'add_empty' => true)),
      'total_sections' => new sfWidgetFormInputText(),
      'created_at'     => new sfWidgetFormDateTime(),
      'updated_at'     => new sfWidgetFormDateTime(),
      'deleted_at'     => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'           => new sfValidatorString(array('max_length' => 64, 'required' => false)),
      'course_type'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CourseCategory'), 'required' => false)),
      'total_sections' => new sfValidatorInteger(array('required' => false)),
      'created_at'     => new sfValidatorDateTime(),
      'updated_at'     => new sfValidatorDateTime(),
      'deleted_at'     => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('department[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Department';
  }

}
