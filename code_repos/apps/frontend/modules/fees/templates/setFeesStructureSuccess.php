<?php include_partial('global/page_title', array('title' => 'Fees', 'back_url' => 'fees/fees-structure', 'icon_class' => 'dashboard-admission-link1')); ?>
<?php
if($successMsg != "") {
  echo '<div class="form-success-msg">'.$successMsg."</div>";
}
?>
<?php $form = new formHelper(); ?>

<div class="form-header">Set Fees Structure for <?php echo $courseName . " (" . $batchYearText . ")"; ?></div>
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
  <input type="submit" value="Save" name="save" class="form-submit-button">
</form>
