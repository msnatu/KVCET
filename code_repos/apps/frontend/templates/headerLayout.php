<!DOCTYPE html>
<?php use_helper('I18N') ?>
<html lang="en">
<?php include('_head.php'); ?>
<body>
<div class="kvcet-page-header-container">
  <div class="kvcet-page-header-body">
    <div class="kvcet-page-header-text">KVCET</div>
    <div class="kvcet-page-header-utilities-container">
      <div class="page-header-msg-icon"></div>
      <a href="<?php echo url_for('dashboard/index'); ?>" class="page-header-msg-label">Messages (0)</a>

      <div class="page-header-settings-icon"></div>
      <a href="<?php echo url_for('dashboard/index'); ?>" class="page-header-settings-label">Settings</a>

      <div class="page-header-logout-icon"></div>
      <a href="<?php echo url_for('@sf_guard_signout'); ?>" class="page-header-logout-label">Logout</a>
    </div>
  </div>
  <div class="page-top-menu-container">
    <div class="page-top-menu-item-container">
      <a href="<?php echo url_for('dashboard/index'); ?>" class="page-top-menu-item page-top-menu-selected-item">Dashboard</a>
      <a href="<?php echo url_for('dashboard/index'); ?>" class="page-top-menu-item">Students</a>
      <a href="<?php echo url_for('dashboard/index'); ?>" class="page-top-menu-item">Attendance</a>
      <a href="<?php echo url_for('dashboard/index'); ?>" class="page-top-menu-item">Timetable</a>
      <a href="<?php echo url_for('dashboard/index'); ?>" class="page-top-menu-item">Examination</a>
      <br clear="all"/>
    </div>
  </div>
  <div class="page-top-menu-border"></div>
</div>
</body>
</html>