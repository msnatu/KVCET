<?php include_partial('global/page_title', array('title' => 'Admission', 'back_url' => '', 'icon_class' => 'dashboard-admission-link1')); ?>
<div class="steps-container">
  <div class="steps-no-container">
    <div class="step-no step-no-1"><span>1</span></div>
    <div class="step-line step-line-1"></div>
    <div class="step-no step-no-2"><span>2</span></div>
    <div class="step-line step-line-2"></div>
    <div class="step-no step-no-3 active-step-no"><span>3</span></div>
  </div>
  <div class="steps-details-container">
    <div class="step-detail step-detail-1">Personal Details</div>
    <div class="step-detail step-detail-2">Contact Details</div>
    <div class="step-detail step-detail-3">Parent's Details</div>
  </div>
</div>

<?php
$form = new formHelper();
$relationArray = array('Father', 'Mother');
?>

<form action="<?php echo url_for('admission/parentDetails'); ?>" method="POST" id="student_parent_details_form">
  <div class="form-container">
    <div class="form-header">Parent Details</div>
    <?php echo $form->printTextBox('First Name', 'parent_first_name', $student['parent_first_name'], 1, 2); ?>
    <?php echo $form->printTextBox('Last Name', 'parent_last_name', $student['parent_last_name'], 1, 2); ?>
    <?php echo $form->printRadioButton('edit', "Relation", 'relation', $relationArray, $student['parent_gender'], 1); ?>
    <?php echo $form->printTextBox('Occupation', 'parent_occupation', $student['parent_occupation'], 1, 2); ?>
    <?php echo $form->printTextBox('Phone', 'parent_phone', $student['parent_phone'], '', 4); ?>
    <?php echo $form->printTextBox('Mobile', 'parent_mobile', $student['parent_mobile'], '', 4); ?>
    <?php echo $form->printTextBox('Email', 'parent_email', $student['parent_email'], 1, ''); ?>
  </div>
  <div class="form-container">
    <div class="form-header">Previous Educational Details</div>
    <?php echo $form->printTextBox('Institution Name', 'institution_name', $student['institution_name'], 1, 2); ?>
    <?php echo $form->printTextBox('Total Marks', 'total_percent_marks', $student['total_percent_marks'], 1, 5); ?>
    <input type="submit" value="Save & Finish" class="form-submit-button">
  </div>
</form>

<script type="text/javascript">
  $(document).ready( function() {
    $("#student_parent_details_form").validationEngine();
  });
</script>