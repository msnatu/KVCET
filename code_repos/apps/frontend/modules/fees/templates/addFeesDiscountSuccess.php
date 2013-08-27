<?php include_partial('global/page_title', array('title' => 'Student', 'back_url' => 'fees/feesDashboard?id=' . $studentId, 'icon_class' => 'page-title-student-icon')); ?>
<?php //echo link_to('Back', 'fees/feesDashboard?id=' . $studentId); ?>
<div class="form-header">Add Fees Discount for <?php echo $studentName; ?></div>
<?php $form = new formHelper(); ?>
<form method="POST" id="add_fees_discount_form">
  <?php echo $form->printTextArea('Description', 'description', '', 1); ?>
  <?php echo $form->printTextBox('Amount', 'amount', '', 1, 1); ?>
  <?php echo $form->printSelectBox('add', "Year", 'acad_year_no', $academicYears, $academicYears, 'Year', '', 1); ?>
  <input type="hidden" value="<?php echo $studentId; ?>" name="student_id"/>
  <input type="submit" value="Add" name="save" class="form-submit-button">
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