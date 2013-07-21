<?php echo link_to('Back', 'fees/fees-structure'); ?>
<?php
if($successMsg != "") {
  echo '<div class="form-success-msg">'.$successMsg."</div>";
}
?>
<div class="form-header">Fees Structure for <?php echo $courseName . " (" . $batchYearText . ")"; ?></div>
<?php $form = new formHelper(); ?>
<form action="<?php echo url_for('set_fees_structure'); ?>" method="POST" id="fees_structure_form">
  <?php
  foreach ($feesTypes as $feeType) {
    $fieldName = "fees_type_" . $feeType['value'];
    $fieldValue = isset($feesStructure[$feeType['value']]) && $feeType['value'] != 0 ? $feesStructure[$feeType['value']] : '';
    echo $form->printTextBox($feeType['name'], $fieldName, $fieldValue, '', 1);
  }
  ?>
  <input type="hidden" value="<?php echo $courseType?>" name="course_type">
  <input type="hidden" value="<?php echo $acadYearNo?>" name="year">
  <input type="submit" value="Set" name="save">
</form>
