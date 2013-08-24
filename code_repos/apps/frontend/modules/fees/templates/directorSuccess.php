<?php include_partial('global/page_title', array('title' => 'Fees', 'back_url' => 'dashboard/index', 'icon_class' => 'page-title-fees-icon')); ?>

<ul class="kt-small-form-container">
  <li class="kt-page-link-button">
    <?php echo link_to('Fees Structure', 'fees/fees-structure'); ?>
    <div class="kt-desc-text-container">
      Manage the fees structures
    </div>
  </li>
  <li class="kt-page-link-button">
    <?php echo link_to('Fees Categories', 'fees/fees-categories'); ?>
    <div class="kt-desc-text-container">
      Manage the fees categories
    </div>
  </li>
  <li class="kt-page-link-button">
    <?php echo link_to('Due List', 'fees/due-list'); ?>
    <div class="kt-desc-text-container">
      View the fees due students list
    </div>
  </li>
</ul>
