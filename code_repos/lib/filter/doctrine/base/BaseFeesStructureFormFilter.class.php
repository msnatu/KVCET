<?php

/**
 * FeesStructure filter form base class.
 *
 * @package    KVCET
 * @subpackage filter
 * @author     Natu
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseFeesStructureFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'amount'           => new sfWidgetFormFilterInput(),
      'batch_start_year' => new sfWidgetFormFilterInput(),
      'acad_year_no'     => new sfWidgetFormFilterInput(),
      'fees_type'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('FeesCategory'), 'add_empty' => true)),
      'course_type'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CourseCategory'), 'add_empty' => true)),
      'created_at'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'deleted_at'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'amount'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'batch_start_year' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'acad_year_no'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'fees_type'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('FeesCategory'), 'column' => 'id')),
      'course_type'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CourseCategory'), 'column' => 'id')),
      'created_at'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'deleted_at'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('fees_structure_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'FeesStructure';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'amount'           => 'Number',
      'batch_start_year' => 'Number',
      'acad_year_no'     => 'Number',
      'fees_type'        => 'ForeignKey',
      'course_type'      => 'ForeignKey',
      'created_at'       => 'Date',
      'updated_at'       => 'Date',
      'deleted_at'       => 'Date',
    );
  }
}
