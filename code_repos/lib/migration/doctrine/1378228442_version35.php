<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version35 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->createTable('student_classroom', array(
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
             'dept_id' => 
             array(
              'type' => 'integer',
              'length' => '8',
             ),
             'section_no' => 
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
        $this->addColumn('department', 'total_sections', 'integer', '8', array(
             ));
    }

    public function down()
    {
        $this->dropTable('student_classroom');
        $this->removeColumn('department', 'total_sections');
    }
}