<?php
$form = new formHelper();
$relationArray = array('Father', 'Mother');
?>

<form action="<?php echo url_for('admission/parentDetails'); ?>" method="POST" id="student_parent_details_form">
  <div class="form-container parent-details-container">
    <h3>Parent Details</h3>
    <?php echo $form->printTextBox('First Name', 'parent_first_name', $student['parent_first_name'], 1, 2); ?>
    <?php echo $form->printTextBox('Last Name', 'parent_last_name', $student['parent_last_name'], 1, 2); ?>
    <?php echo $form->printRadioButton('edit', "Relation", 'relation', $relationArray, $student['parent_gender'], 1); ?>
    <?php echo $form->printTextBox('Occupation', 'parent_occupation', $student['parent_occupation'], 1, 2); ?>
    <?php echo $form->printTextBox('Phone', 'parent_phone', $student['parent_phone'], '', 4); ?>
    <?php echo $form->printTextBox('Mobile', 'parent_mobile', $student['parent_mobile'], '', 4); ?>
    <?php echo $form->printTextBox('Email', 'parent_email', $student['parent_email'], 1, ''); ?>
  </div>
  <div class="form-container prev-education-details-container">
    <h3>Previous Educational Details</h3>
    <?php echo $form->printTextBox('Institution Name', 'institution_name', $student['institution_name'], 1, 2); ?>
    <?php echo $form->printTextBox('Total Marks', 'total_percent_marks', $student['total_percent_marks'], 1, 5); ?>
    <input type="submit" value="Finish" id="save_prev_education_details">
  </div>
</form>

<script type="text/javascript">
  $(document).ready( function() {
    $("#student_parent_details_form").validationEngine();
  });
</script>