<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version38 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->createTable('period', array(
             'id' => 
             array(
              'type' => 'integer',
              'length' => '8',
              'autoincrement' => '1',
              'primary' => '1',
             ),
             'start_time' => 
             array(
              'type' => 'string',
              'length' => '256',
             ),
             'end_time' => 
             array(
              'type' => 'string',
              'length' => '256',
             ),
             'batch_year' => 
             array(
              'type' => 'integer',
              'length' => '8',
             ),
             'dept_id' => 
             array(
              'type' => 'integer',
              'length' => '8',
             ),
             'semester' => 
             array(
              'type' => 'integer',
              'length' => '8',
             ),
             'section_no' => 
             array(
              'type' => 'integer',
              'length' => '8',
             ),
             'is_break_time' => 
             array(
              'type' => 'boolean',
              'default' => '0',
              'length' => '25',
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
    }

    public function down()
    {
        $this->dropTable('period');
    }
}