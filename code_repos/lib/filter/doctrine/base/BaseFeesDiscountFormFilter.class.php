<?php

/**
 * FeesDiscount filter form base class.
 *
 * @package    KVCET
 * @subpackage filter
 * @author     Natu
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseFeesDiscountFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'student_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Stud'), 'add_empty' => true)),
      'acad_year_no' => new sfWidgetFormFilterInput(),
      'amount'       => new sfWidgetFormFilterInput(),
      'description'  => new sfWidgetFormFilterInput(),
      'created_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'deleted_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'student_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Stud'), 'column' => 'id')),
      'acad_year_no' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'amount'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'description'  => new sfValidatorPass(array('required' => false)),
      'created_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'deleted_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('fees_discount_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'FeesDiscount';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'student_id'   => 'ForeignKey',
      'acad_year_no' => 'Number',
      'amount'       => 'Number',
      'description'  => 'Text',
      'created_at'   => 'Date',
      'updated_at'   => 'Date',
      'deleted_at'   => 'Date',
    );
  }
}
