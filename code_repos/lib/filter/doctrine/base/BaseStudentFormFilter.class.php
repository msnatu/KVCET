<?php

/**
 * Student filter form base class.
 *
 * @package    KVCET
 * @subpackage filter
 * @author     Natu
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseStudentFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'student_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => true)),
      'first_name'          => new sfWidgetFormFilterInput(),
      'last_name'           => new sfWidgetFormFilterInput(),
      'admission_no'        => new sfWidgetFormFilterInput(),
      'admission_date'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'admission_mode'      => new sfWidgetFormFilterInput(),
      'department'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('StudDepartment'), 'add_empty' => true)),
      'dob'                 => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'gender'              => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'address'             => new sfWidgetFormFilterInput(),
      'city'                => new sfWidgetFormFilterInput(),
      'state'               => new sfWidgetFormFilterInput(),
      'pincode'             => new sfWidgetFormFilterInput(),
      'mobile'              => new sfWidgetFormFilterInput(),
      'email'               => new sfWidgetFormFilterInput(),
      'photo_id'            => new sfWidgetFormFilterInput(),
      'parent_first_name'   => new sfWidgetFormFilterInput(),
      'parent_last_name'    => new sfWidgetFormFilterInput(),
      'parent_gender'       => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'parent_occupation'   => new sfWidgetFormFilterInput(),
      'parent_email'        => new sfWidgetFormFilterInput(),
      'parent_phone'        => new sfWidgetFormFilterInput(),
      'parent_mobile'       => new sfWidgetFormFilterInput(),
      'institution_name'    => new sfWidgetFormFilterInput(),
      'total_percent_marks' => new sfWidgetFormFilterInput(),
      'created_at'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'deleted_at'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'student_id'          => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('User'), 'column' => 'id')),
      'first_name'          => new sfValidatorPass(array('required' => false)),
      'last_name'           => new sfValidatorPass(array('required' => false)),
      'admission_no'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'admission_date'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'admission_mode'      => new sfValidatorPass(array('required' => false)),
      'department'          => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('StudDepartment'), 'column' => 'id')),
      'dob'                 => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'gender'              => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'address'             => new sfValidatorPass(array('required' => false)),
      'city'                => new sfValidatorPass(array('required' => false)),
      'state'               => new sfValidatorPass(array('required' => false)),
      'pincode'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'mobile'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'email'               => new sfValidatorPass(array('required' => false)),
      'photo_id'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'parent_first_name'   => new sfValidatorPass(array('required' => false)),
      'parent_last_name'    => new sfValidatorPass(array('required' => false)),
      'parent_gender'       => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'parent_occupation'   => new sfValidatorPass(array('required' => false)),
      'parent_email'        => new sfValidatorPass(array('required' => false)),
      'parent_phone'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'parent_mobile'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'institution_name'    => new sfValidatorPass(array('required' => false)),
      'total_percent_marks' => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'created_at'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'deleted_at'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('student_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Student';
  }

  public function getFields()
  {
    return array(
      'id'                  => 'Number',
      'student_id'          => 'ForeignKey',
      'first_name'          => 'Text',
      'last_name'           => 'Text',
      'admission_no'        => 'Number',
      'admission_date'      => 'Date',
      'admission_mode'      => 'Text',
      'department'          => 'ForeignKey',
      'dob'                 => 'Date',
      'gender'              => 'Boolean',
      'address'             => 'Text',
      'city'                => 'Text',
      'state'               => 'Text',
      'pincode'             => 'Number',
      'mobile'              => 'Number',
      'email'               => 'Text',
      'photo_id'            => 'Number',
      'parent_first_name'   => 'Text',
      'parent_last_name'    => 'Text',
      'parent_gender'       => 'Boolean',
      'parent_occupation'   => 'Text',
      'parent_email'        => 'Text',
      'parent_phone'        => 'Number',
      'parent_mobile'       => 'Number',
      'institution_name'    => 'Text',
      'total_percent_marks' => 'Number',
      'created_at'          => 'Date',
      'updated_at'          => 'Date',
      'deleted_at'          => 'Date',
    );
  }
}
