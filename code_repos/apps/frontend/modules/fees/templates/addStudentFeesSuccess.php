<?php include_partial('global/page_title', array('title' => 'Student', 'back_url' => 'fees/feesDashboard?id=' . $studentId, 'icon_class' => 'page-title-student-icon')); ?>
<div class="form-header">Add Fees for <?php echo $studentName; ?></div>
<?php $form = new formHelper(); ?>
<form method="POST" id="add_student_fees_form">
  <?php echo $form->printTextBox('Entry Date', 'entry_date', date('d-m-Y'), 1); ?>
  <?php echo $form->printTextBox('Amount', 'amount', '', 1, 1); ?>
  <?php echo $form->printTextBox('Challan Number', 'challan_no', '', 1); ?>
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