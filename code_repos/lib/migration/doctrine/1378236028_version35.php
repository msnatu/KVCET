<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version35 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->addColumn('manage_user', 'first_name', 'string', '64', array(
             ));
        $this->addColumn('manage_user', 'last_name', 'string', '64', array(
             ));
    }

    public function down()
    {
        $this->removeColumn('manage_user', 'first_name');
        $this->removeColumn('manage_user', 'last_name');
    }
}