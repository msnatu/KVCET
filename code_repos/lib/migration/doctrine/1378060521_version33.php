<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version33 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->createForeignKey('other_user', 'other_user_user_id_sf_guard_user_id', array(
             'name' => 'other_user_user_id_sf_guard_user_id',
             'local' => 'user_id',
             'foreign' => 'id',
             'foreignTable' => 'sf_guard_user',
             ));
        $this->createForeignKey('other_user', 'other_user_dept_id_department_id', array(
             'name' => 'other_user_dept_id_department_id',
             'local' => 'dept_id',
             'foreign' => 'id',
             'foreignTable' => 'department',
             ));
        $this->addIndex('other_user', 'other_user_user_id', array(
             'fields' => 
             array(
              0 => 'user_id',
             ),
             ));
        $this->addIndex('other_user', 'other_user_dept_id', array(
             'fields' => 
             array(
              0 => 'dept_id',
             ),
             ));
    }

    public function down()
    {
        $this->dropForeignKey('other_user', 'other_user_user_id_sf_guard_user_id');
        $this->dropForeignKey('other_user', 'other_user_dept_id_department_id');
        $this->removeIndex('other_user', 'other_user_user_id', array(
             'fields' => 
             array(
              0 => 'user_id',
             ),
             ));
        $this->removeIndex('other_user', 'other_user_dept_id', array(
             'fields' => 
             array(
              0 => 'dept_id',
             ),
             ));
    }
}