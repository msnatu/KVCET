<?php

/**
 * TimetableAssignment filter form base class.
 *
 * @package    KVCET
 * @subpackage filter
 * @author     Natu
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseTimetableAssignmentFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'subject_id' => new sfWidgetFormFilterInput(),
      'staff_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Staff'), 'add_empty' => true)),
      'period_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Period'), 'add_empty' => true)),
      'day_no'     => new sfWidgetFormFilterInput(),
      'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'deleted_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'subject_id' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'staff_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Staff'), 'column' => 'id')),
      'period_id'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Period'), 'column' => 'id')),
      'day_no'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'deleted_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('timetable_assignment_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TimetableAssignment';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'subject_id' => 'Number',
      'staff_id'   => 'ForeignKey',
      'period_id'  => 'ForeignKey',
      'day_no'     => 'Number',
      'created_at' => 'Date',
      'updated_at' => 'Date',
      'deleted_at' => 'Date',
    );
  }
}
