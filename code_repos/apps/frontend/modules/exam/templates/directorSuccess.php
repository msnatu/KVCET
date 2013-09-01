<?php include_partial('global/page_title', array('title' => 'Examination', 'back_url' => 'dashboard/index', 'icon_class' => 'page-title-exam-icon')); ?>

<ul class="kt-small-form-container">
  <li class="kt-page-link-button">
    <?php echo link_to('Subjects', 'exam/subjects'); ?>
    <div class="kt-desc-text-container">
      Manage the subjects for each semester
    </div>
  </li>
<!--  <li class="kt-page-link-button">-->
<!--    --><?php //echo link_to('Fees Categories', 'fees/fees-categories'); ?>
<!--    <div class="kt-desc-text-container">-->
<!--      Manage the fees categories-->
<!--    </div>-->
<!--  </li>-->
<!--  <li class="kt-page-link-button">-->
<!--    --><?php //echo link_to('Due List', 'fees/due-list'); ?>
<!--    <div class="kt-desc-text-container">-->
<!--      View the fees due students list-->
<!--    </div>-->
<!--  </li>-->
</ul>
