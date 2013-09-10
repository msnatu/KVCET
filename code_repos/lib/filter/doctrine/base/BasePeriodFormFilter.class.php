<?php

/**
 * Period filter form base class.
 *
 * @package    KVCET
 * @subpackage filter
 * @author     Natu
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePeriodFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'start_time'    => new sfWidgetFormFilterInput(),
      'end_time'      => new sfWidgetFormFilterInput(),
      'batch_year'    => new sfWidgetFormFilterInput(),
      'dept_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Department'), 'add_empty' => true)),
      'semester'      => new sfWidgetFormFilterInput(),
      'section_no'    => new sfWidgetFormFilterInput(),
      'is_break_time' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'created_at'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'deleted_at'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'start_time'    => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'end_time'      => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'batch_year'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'dept_id'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Department'), 'column' => 'id')),
      'semester'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'section_no'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'is_break_time' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'created_at'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'deleted_at'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('period_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Period';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'start_time'    => 'Number',
      'end_time'      => 'Number',
      'batch_year'    => 'Number',
      'dept_id'       => 'ForeignKey',
      'semester'      => 'Number',
      'section_no'    => 'Number',
      'is_break_time' => 'Boolean',
      'created_at'    => 'Date',
      'updated_at'    => 'Date',
      'deleted_at'    => 'Date',
    );
  }
}
