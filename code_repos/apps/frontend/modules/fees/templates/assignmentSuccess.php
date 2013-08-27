<?php include_partial('global/page_title', array('title' => 'Student', 'back_url' => 'fees/feesDashboard?id=' . $studentId, 'icon_class' => 'page-title-student-icon')); ?>
<div class="form-header">Assign Fees for <?php echo $studentName . " (" . date('Y') . ' - ' . (date('Y') + 1)  . ")"; ?></div>
<?php if ($feesAssignmentErrorMsg != '') { ?>
  <div class="form-success-msg"><?php echo $feesAssignmentErrorMsg; ?></div>
<?php } ?>

<?php $form = new formHelper(); ?>
<form method="POST" id="fees_assignment_form">
  <?php echo $form->printRadioButton('add', 'Accommodation', 'accommodation', array('Hosteler', 'Day Scholar')); ?>
  <div class="room-type-container" style="display: none;">
    <?php echo $form->printRadioButton('add', 'Room Type', 'room_type', array('Attached Room', 'Common Room')); ?>
  </div>
  <div class="route-type-container" style="display: none;">
    <?php echo $form->printSelectBox('edit', 'Route', 'route', $routeTypes['options'], $routeTypes['values'], 'Route'); ?>
  </div>
  <input type="hidden" value="<?php echo $studentId; ?>" name="student_id"/>
  <input type="submit" value="Assign" name="save" class="form-submit-button">
</form>


<script type="text/javascript">
  new FeesForm({
    callback: 'renderAssignmentForm'
  });

  new PageHelper({
    navigationNo: 2,
    callback: 'activateCurrentTab'
  });
</script>