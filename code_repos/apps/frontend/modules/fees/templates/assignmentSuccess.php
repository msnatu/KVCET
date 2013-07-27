<?php echo link_to('Back', 'fees/feesDashboard?id=' . $studentId); ?>
<div class="form-header">Assign Fees for <?php echo $studentName . " (" . date('Y') . ' - ' . (date('Y') + 1)  . ")"; ?></div>
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
  <input type="submit" value="Assign" name="save">
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