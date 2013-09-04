<?php include_partial('global/page_title', array('title' => 'Timetable', 'back_url' => 'dashboard/index', 'icon_class' => 'page-title-timetable-icon')); ?>

<ul class="kt-small-form-container">
  <li class="kt-page-link-button">
    <?php echo link_to("Assign Student's Classroom", 'timetable/viewClassroom'); ?>
    <div class="kt-desc-text-container">
      Assign students to the classroom
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
