<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version25 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->addColumn('student_fees', 'acad_year_no', 'integer', '8', array(
             ));
    }

    public function down()
    {
        $this->removeColumn('student_fees', 'acad_year_no');
    }
}