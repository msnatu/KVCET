<?php use_helper('I18N') ?>
<div class="login-form-container">
  <div class="login-form-header">Log in</div>
  <?php if($form->hasErrors()) { ?>
    <div class="login-form-error">Sorry! Username or Password is wrong</div>
  <?php } ?>
  <form action="<?php echo url_for('@sf_guard_signin') ?>" method="POST">
    <div class="login-field-label">Username</div>
    <div class="login-field-container">
      <div class="login-field-icon-container">
        <div class="login-field-user-icon"></div>
        <div class="login-field-arrow-icon"></div>
      </div>
      <?php echo $form['username']; ?>
    </div>
    <br clear="all"/>
    <div class="big-hori-space"></div>
    <div class="login-field-label">Password</div>
    <div class="login-field-container">
      <div class="login-field-icon-container">
        <div class="login-field-password-icon"></div>
        <div class="login-field-arrow-icon"></div>
      </div>
      <?php echo $form['password']; ?>
    </div>
    <br clear="all"/>
    <?php echo $form->renderHiddenFields() ?>
    <div class="login-button-container">
      <input class="login-button" type="submit" value="Log in"/>
      <a href="<?php echo url_for('@forgot_password'); ?>" class="login-forgot-pwd-link">Forgot Password?</a>
    </div>
  </form>
</div>

