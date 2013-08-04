<?php echo link_to('Back', 'fees/feesDashboard?id=' . $studentId); ?>
<div class="form-header">Edit Fees Discount for <?php echo $studentName; ?></div>
<?php $form = new formHelper(); ?>
<form method="POST" id="edit_fees_discount_form">
  <?php echo $form->printTextArea('Description', 'description', $feesDiscount['description'], 1); ?>
  <?php echo $form->printTextBox('Amount', 'amount', $feesDiscount['amount'], 1, 1); ?>
  <?php echo $form->printSelectBox('edit', "Year", 'acad_year_no', $academicYears, $academicYears, 'Year', $feesDiscount->getAcadYearNo(), 1); ?>
  <input type="hidden" value="<?php echo $discountId; ?>" name="discount_id"/>
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