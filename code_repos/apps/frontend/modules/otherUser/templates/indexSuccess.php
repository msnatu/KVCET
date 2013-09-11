<?php include_partial('global/page_title', array('title' => 'User Management', 'back_url' => 'dashboard/index', 'icon_class' => 'page-title-user-icon')); ?>

<ul class="kt-small-form-container">
  <li class="kt-page-link-button">
    <?php echo link_to('Create User', '@create_user'); ?>
    <div class="kt-desc-text-container">
      Create New User
    </div>
  </li>
  <li class="kt-page-link-button">
    <?php echo link_to('View and Manage User', '@view_user'); ?>
    <div class="kt-desc-text-container">
      Modify Already Created User
    </div>
  </li>
</ul>
