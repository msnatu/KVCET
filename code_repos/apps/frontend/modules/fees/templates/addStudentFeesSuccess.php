<?php echo link_to('Back', 'fees/feesDashboard?id=' . $studentId); ?>
<div class="form-header">Assign Fees for <?php echo $studentName . " (" . date('Y') . ' - ' . (date('Y') + 1)  . ")"; ?></div>
<?php $form = new formHelper(); ?>
<form method="POST" id="add_student_fees_form">
  <?php echo $form->printTextBox('Entry Date', 'entry_date', date('d-m-Y'), 1); ?>
  <?php echo $form->printTextBox('Amount', 'amount', '', 1, 1); ?>
  <?php echo $form->printTextBox('Challan Number', 'challan_no', '', 1); ?>
  <input type="hidden" value="<?php echo $studentId; ?>" name="student_id"/>
  <input type="submit" value="Add" name="save">
</form>

<script type="text/javascript">
  $(document).ready( function() {
    new FeesForm({
      callback: 'bindAddFeesForm'
    });
  });

  new PageHelper({
    navigationNo: 2,
    callback: 'activateCurrentTab'
  });
</script>