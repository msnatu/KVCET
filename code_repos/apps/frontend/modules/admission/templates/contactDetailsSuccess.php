<?php include_partial('global/page_title', array('title' => 'Admission', 'back_url' => '', 'icon_class' => 'dashboard-admission-link1')); ?>
<div class="steps-container">
  <div class="steps-no-container">
    <div class="step-no step-no-1"><span>1</span></div>
    <div class="step-line step-line-1"></div>
    <div class="step-no step-no-2 active-step-no"><span>2</span></div>
    <div class="step-line step-line-2"></div>
    <div class="step-no step-no-3"><span>3</span></div>
  </div>
  <div class="steps-details-container">
    <div class="step-detail step-detail-1">Personal Details</div>
    <div class="step-detail step-detail-2">Contact Details</div>
    <div class="step-detail step-detail-3">Parent's Details</div>
  </div>
</div>

<?php
$form = new formHelper();
?>

<div class="form-container contact-details-container">
  <div class="form-header">Contact Details</div>
  <form action="<?php echo url_for('admission/contactDetails'); ?>" method="POST" id="student_contact_details_form">
    <?php echo $form->printTextArea('Address', 'address', $student['address'], 1); ?>
    <?php echo $form->printTextBox('City', 'city', $student['city'], 1, 2); ?>
    <?php echo $form->printTextBox('State', 'state', $student['state'], 1, 2); ?>
    <?php echo $form->printTextBox('Pincode', 'pincode', $student['pincode'], 1, 1); ?>
    <?php echo $form->printTextBox('Mobile', 'mobile', $student['mobile'], '', 4); ?>
    <input type="submit" value="Save & Proceed" class="form-submit-button">
  </form>
</div>

<script type="text/javascript">
  $(document).ready( function() {
    $("#student_contact_details_form").validationEngine();
  });
</script>