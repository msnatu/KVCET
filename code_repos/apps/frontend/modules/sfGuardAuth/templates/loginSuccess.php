<?php use_helper('I18N') ?>
<div id="login-form" class="as-login-container">
  <form style="height: auto; width: auto;" action="<?php echo url_for($form_submit_route) ?>" method="post">
    <?php if($form->hasErrors()) { ?>
      <div class="error">Username/Password is wrong!</div>
    <?php } ?>
    <div class="font-small login-form-error">
    </div>
    <div class="username-field-label">Username:</div>
    <div class="username-field-container"><?php echo $form['username']; ?></div>

    <div class="username-field-label">Password:</div>
    <div class="username-field-div"><?php echo $form['password']; ?></div>
    <?php echo $form->renderHiddenFields() ?>
    <div style="padding-top:5px;">
      <input id="enter-button-location" class="as-login-button" type="submit" value="Log in"/>
      <br class="clr"/>
    </div>
  </form>
</div>

<?php echo link_to('Forgot Password?', '@forgot_password'); ?>