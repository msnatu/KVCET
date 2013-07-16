<?php

class myUser extends sfGuardSecurityUser
{
  public function initialize(sfEventDispatcher $dispatcher, sfStorage $storage, $options = array()) {
    $options['timeout'] = '28800';
    parent::initialize($dispatcher, $storage, $options);
  }
}
