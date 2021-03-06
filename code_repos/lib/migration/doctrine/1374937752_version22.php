<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version22 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->createTable('student_varying_fees', array(
             'id' => 
             array(
              'type' => 'integer',
              'length' => '8',
              'autoincrement' => '1',
              'primary' => '1',
             ),
             'student_id' => 
             array(
              'type' => 'integer',
              'length' => '8',
             ),
             'acad_year_no' => 
             array(
              'type' => 'integer',
              'length' => '8',
             ),
             'fees_type' => 
             array(
              'type' => 'integer',
              'length' => '8',
             ),
             'route_id' => 
             array(
              'type' => 'integer',
              'length' => '8',
             ),
             'created_at' => 
             array(
              'notnull' => '1',
              'type' => 'timestamp',
              'length' => '25',
             ),
             'updated_at' => 
             array(
              'notnull' => '1',
              'type' => 'timestamp',
              'length' => '25',
             ),
             'deleted_at' => 
             array(
              'notnull' => '',
              'type' => 'timestamp',
              'length' => '25',
             ),
             ), array(
             'primary' => 
             array(
              0 => 'id',
             ),
             'collate' => 'utf8_unicode_ci',
             ));
        $this->createTable('transport_fees', array(
             'id' => 
             array(
              'type' => 'integer',
              'length' => '8',
              'autoincrement' => '1',
              'primary' => '1',
             ),
             'route_name' => 
             array(
              'type' => 'string',
              'length' => '256',
             ),
             'amount' => 
             array(
              'type' => 'integer',
              'length' => '8',
             ),
             'year' => 
             array(
              'type' => 'integer',
              'length' => '8',
             ),
             'created_at' => 
             array(
              'notnull' => '1',
              'type' => 'timestamp',
              'length' => '25',
             ),
             'updated_at' => 
             array(
              'notnull' => '1',
              'type' => 'timestamp',
              'length' => '25',
             ),
             'deleted_at' => 
             array(
              'notnull' => '',
              'type' => 'timestamp',
              'length' => '25',
             ),
             ), array(
             'primary' => 
             array(
              0 => 'id',
             ),
             'collate' => 'utf8_unicode_ci',
             ));
        $this->removeColumn('student_fees', 'fees_type');
        $this->addColumn('student_fees', 'date', 'date', '25', array(
             ));
        $this->addColumn('student_fees', 'amount', 'integer', '8', array(
             ));
        $this->addColumn('student_fees', 'added_by', 'integer', '8', array(
             ));
        $this->addColumn('student_fees', 'challan_no', 'integer', '8', array(
             ));
    }

    public function down()
    {
        $this->dropTable('student_varying_fees');
        $this->dropTable('transport_fees');
        $this->addColumn('student_fees', 'fees_type', 'integer', '8', array(
             ));
        $this->removeColumn('student_fees', 'date');
        $this->removeColumn('student_fees', 'amount');
        $this->removeColumn('student_fees', 'added_by');
        $this->removeColumn('student_fees', 'challan_no');
    }
}