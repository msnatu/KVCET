<?php

/**
 * sfGuardAuth actions.
 *
 * @package    KVCET
 * @subpackage sfGuardAuth
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */

require_once(dirname(__FILE__) . '/../lib/BasesfGuardAuthActions.class.php');

class sfGuardAuthActions extends BasesfGuardAuthActions
{
  /**
   * Executes index action
   *
   * @param sfRequest $request A request object
   */
  public function executeIndex(sfWebRequest $request)
  {
    $this->forward('default', 'module');
  }

  public function executeHomePage($request)
  {
    if ($this->getUser()->isAuthenticated()) {
      $user = $this->getUser()->getGuardUser();

      if ($user->hasGroup('Admin')) {
        $this->redirect('admin/index');
      }
    }

    $this->redirect('@sf_guard_signin');
  }

  public function executeLogin($request)
  {
    $this->getUser()->signOut();

    $this->form = new sfGuardFormSignin();
    $this->form_submit_route = '@sf_guard_signin';

    if ($request->isMethod('POST')) {
      $parameters = $request->getParameter('signin');
      $this->form->bind($parameters);
      if ($this->form->isValid()) {
        $values = $this->form->getValues();
        $this->getUser()->signin($values['user'], false);
        $this->redirect('dashboard/index');
      }
    }
  }

  public function executeForgotPassword($request)
  {
    $this->form = new sfGuardRequestForgotPasswordForm();

    if ($request->isMethod('POST')) {
      $parameters = $request->getParameter('forgot_password');
      $this->form->bind($parameters);
      if ($this->form->isValid()) {
        echo $this->user = $this->form->user;
        $values = $this->form->getValues();
//        $this->getUser()->signin($values['user'], false);
//        $this->redirect('dashboard/index');
      } else {
         print_r($this->form->getErrorSchema()->getErrors());
      }
    }
  }

}
