<?php echo link_to('Back', 'profile/studentProfile?id=' . $studentId); ?>
<div class="kt-page-sub-header">Fees history of <?php echo $studentName . " (" . $batchYearText . ")"; ?></div>
<?php if ($feesAssignmentSuccessMsg != '') { ?>
  <div class="form-success-msg"><?php echo $feesAssignmentSuccessMsg; ?></div>
<?php } ?>
<?php if ($feesEntrySuccess != '') { ?>
  <div class="form-success-msg"><?php echo $feesEntrySuccess; ?></div>
<?php } ?>

<div>Assign the fees structure for the student</div>
<?php echo link_to('Fees Assignment', 'fees/assignment?id=' . $studentId); ?>
<br/>
<br/>
<div>Add fees for the student</div>
<?php echo link_to('Add Fees', 'student/add-fees?id=' . $studentId); ?>
<br/>
<br/>
<div>See the previous payment history</div>
<?php echo link_to('Payment History', 'student/payment-history?id=' . $studentId); ?>
