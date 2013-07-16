<?php use_helper('I18N') ?>
  <div id="login-form" class="as-login-container">
    <form style="height: auto; width: auto;" action="<?php echo url_for('sfGuardAuth/forgotPassword') ?>" method="post">
      <?php if($form->hasErrors()) { ?>
        <div class="error">No existing user found with this email!</div>
      <?php } ?>
      <div class="font-small login-form-error">
      </div>
      <div class="username-field-label">Please enter your email-address:</div>
      <div class="username-field-container"><?php echo $form['email_address']; ?></div>

      <?php echo $form->renderHiddenFields() ?>
      <div style="padding-top:5px;">
        <input id="enter-button-location" class="as-login-button" type="submit" value="Send"/>
        <br class="clr"/>
      </div>
    </form>
  </div>
