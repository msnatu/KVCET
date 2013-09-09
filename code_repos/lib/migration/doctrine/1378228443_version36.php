<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version36 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->createForeignKey('student_classroom', 'student_classroom_student_id_student_student_id', array(
             'name' => 'student_classroom_student_id_student_student_id',
             'local' => 'student_id',
             'foreign' => 'student_id',
             'foreignTable' => 'student',
             ));
        $this->createForeignKey('student_classroom', 'student_classroom_dept_id_department_id', array(
             'name' => 'student_classroom_dept_id_department_id',
             'local' => 'dept_id',
             'foreign' => 'id',
             'foreignTable' => 'department',
             ));
        $this->addIndex('student_classroom', 'student_classroom_student_id', array(
             'fields' => 
             array(
              0 => 'student_id',
             ),
             ));
        $this->addIndex('student_classroom', 'student_classroom_dept_id', array(
             'fields' => 
             array(
              0 => 'dept_id',
             ),
             ));
    }

    public function down()
    {
        $this->dropForeignKey('student_classroom', 'student_classroom_student_id_student_student_id');
        $this->dropForeignKey('student_classroom', 'student_classroom_dept_id_department_id');
        $this->removeIndex('student_classroom', 'student_classroom_student_id', array(
             'fields' => 
             array(
              0 => 'student_id',
             ),
             ));
        $this->removeIndex('student_classroom', 'student_classroom_dept_id', array(
             'fields' => 
             array(
              0 => 'dept_id',
             ),
             ));
    }
}