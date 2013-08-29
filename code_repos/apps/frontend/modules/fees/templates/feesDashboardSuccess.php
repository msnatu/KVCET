<?php include_partial('global/page_title', array('title' => 'Student', 'back_url' => 'profile/studentProfile?id=' . $studentId, 'icon_class' => 'page-title-student-icon')); ?>
<div class="kt-page-sub-header">Fees history of <?php echo $studentName . " (" . $batchYearText . ")"; ?></div>
<?php if ($feesAssignmentSuccessMsg != '') { ?>
  <div class="form-success-msg"><?php echo $feesAssignmentSuccessMsg; ?></div>
<?php } ?>
<?php if ($feesEntrySuccess != '') { ?>
  <div class="form-success-msg"><?php echo $feesEntrySuccess; ?></div>
<?php } ?>

<ul class="kt-small-form-container">
  <li class="kt-page-link-button">
    <?php echo link_to('Fees Assignment', 'fees/assignment?id=' . $studentId); ?>
    <div class="kt-desc-text-container">
      Assign the fees structure for the student
    </div>
  </li>
  <li class="kt-page-link-button">
    <?php echo link_to('Add Fees', 'student/add-fees?id=' . $studentId); ?>
    <div class="kt-desc-text-container">
      Add fees for the student
    </div>
  </li>
  <li class="kt-page-link-button">
    <?php echo link_to('Add Fees Discount', 'student/add-fees-discount?id=' . $studentId); ?>
    <div class="kt-desc-text-container">
      Add fees discount for the student
    </div>
  </li>
  <li class="kt-page-link-button">
    <?php echo link_to('Payment History', 'student/payment-history?id=' . $studentId); ?>
    <div class="kt-desc-text-container">
      See the previous payment history
    </div>
  </li>
</ul>

<script type="text/javascript">
  $(document).ready(function () {
    new PageHelper({
      navigationNo: 2,
      callback: 'activateCurrentTab'
    });
  });
</script>