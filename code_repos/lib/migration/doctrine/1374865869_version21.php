<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version21 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->createForeignKey('student_fees', 'student_fees_student_id_student_student_id', array(
             'name' => 'student_fees_student_id_student_student_id',
             'local' => 'student_id',
             'foreign' => 'student_id',
             'foreignTable' => 'student',
             ));
        $this->addIndex('student_fees', 'student_fees_student_id', array(
             'fields' => 
             array(
              0 => 'student_id',
             ),
             ));
    }

    public function down()
    {
        $this->dropForeignKey('student_fees', 'student_fees_student_id_student_student_id');
        $this->removeIndex('student_fees', 'student_fees_student_id', array(
             'fields' => 
             array(
              0 => 'student_id',
             ),
             ));
    }
}