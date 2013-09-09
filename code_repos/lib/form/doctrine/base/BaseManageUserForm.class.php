<?php

/**
 * ManageUser form base class.
 *
 * @method ManageUser getObject() Returns the current form's model object
 *
 * @package    KVCET
 * @subpackage form
 * @author     Natu
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseManageUserForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'first_name' => new sfWidgetFormInputText(),
      'last_name'  => new sfWidgetFormInputText(),
      'to_group'   => new sfWidgetFormInputText(),
      'to_dept'    => new sfWidgetFormInputText(),
      'user_name'  => new sfWidgetFormInputText(),
      'email_id'   => new sfWidgetFormInputText(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
      'deleted_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'first_name' => new sfValidatorString(array('max_length' => 64, 'required' => false)),
      'last_name'  => new sfValidatorString(array('max_length' => 64, 'required' => false)),
      'to_group'   => new sfValidatorString(array('max_length' => 64, 'required' => false)),
      'to_dept'    => new sfValidatorString(array('max_length' => 64, 'required' => false)),
      'user_name'  => new sfValidatorString(array('max_length' => 64, 'required' => false)),
      'email_id'   => new sfValidatorString(array('max_length' => 64, 'required' => false)),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
      'deleted_at' => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('manage_user[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ManageUser';
  }

}
