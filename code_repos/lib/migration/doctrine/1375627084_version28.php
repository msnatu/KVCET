<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version28 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->addColumn('fees_discount', 'description', 'string', '1000', array(
             ));
    }

    public function down()
    {
        $this->removeColumn('fees_discount', 'description');
    }
}