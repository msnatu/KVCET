<?php echo link_to('Back', 'fees/feesDashboard?id=' . $studentId); ?>
<div class="form-header">Edit Fees for <?php echo $studentName; ?></div>
<?php $form = new formHelper(); ?>
<form method="POST" id="edit_student_fees_form">
  <?php echo $form->printTextBox('Entry Date', 'entry_date', $form->formatDate($feesEntry->getDate()), 1); ?>
  <?php echo $form->printTextBox('Amount', 'amount', $feesEntry->getAmount(), 1, 1); ?>
  <?php echo $form->printTextBox('Challan Number', 'challan_no',  $feesEntry->getChallanNo(), 1); ?>
  <?php echo $form->printSelectBox('edit', "Year", 'acad_year_no', $academicYears, $academicYears, 'Year', $feesEntry->getAcadYearNo(), 1); ?>
  <input type="hidden" value="<?php echo $entryId; ?>" name="entry_id"/>
  <input type="hidden" value="<?php echo $studentId; ?>" name="student_id"/>
  <input type="submit" value="Edit" name="save">
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