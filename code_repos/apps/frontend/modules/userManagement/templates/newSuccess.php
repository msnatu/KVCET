<?php include_partial('global/page_title', array('title' => 'Adding New User', 'back_url' => 'userManagement/index', 'icon_class' => 'page-title-user-icon')); ?>

<?php if ($sf_user->hasFlash('successMsg')): ?>
<div class="flash_success"><?php echo $sf_user->getFlash('successMsg'); ?></div>
<?php endif ?>

<?php if ($sf_user->hasFlash('errorMsg')): ?>
<div class="flash_error"><?php echo $sf_user->getFlash('errorMsg'); ?></div>
<?php endif ?>
    
<?php
$form = new formHelper();
?>

<div class="form-container">
    <div class="form-header">User Details</div>
    <form action="<?php echo url_for('userManagement/new'); ?>" method="POST" id="create_new">
        <?php echo $form->printTextBox('First Name', 'first_name', '', 1, 2); ?>
        <?php echo $form->printTextBox('Last Name', 'last_name', '', 1, 2); ?>
        <?php echo $form->printTextBox('Username', 'user_name', '', 1, 2); ?>
        <?php echo $form->printTextBox('User E-mail', 'user_mail', '', 1); ?>
        <?php echo $form->printSelectBox("add", "Assign to Department", "user_dept", $collgDept['options'], $collgDept['values'], 'a Department To Assign', "", 1); ?>
        <?php echo $form->printSelectBox("add", "Assign to Group", "user_group", $collgGroup['options'], $collgGroup['values'], 'a Group To Assign', "", 1); ?>
        <input type="submit" value="Save & Proceed" name="save" class="form-submit-button">
    </form>
</div>