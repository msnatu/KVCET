<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version31 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->createForeignKey('other_user', 'other_user_user_id_sf_guard_user_id', array(
             'name' => 'other_user_user_id_sf_guard_user_id',
             'local' => 'user_id',
             'foreign' => 'id',
             'foreignTable' => 'sf_guard_user',
             ));
        $this->addIndex('other_user', 'other_user_user_id', array(
             'fields' => 
             array(
              0 => 'user_id',
             ),
             ));
    }

    public function down()
    {
        $this->dropForeignKey('other_user', 'other_user_user_id_sf_guard_user_id');
        $this->removeIndex('other_user', 'other_user_user_id', array(
             'fields' => 
             array(
              0 => 'user_id',
             ),
             ));
    }
}