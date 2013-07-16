<?php
$form = new formHelper();
?>

<div class="form-container contact-details-container">
  <h3>Contact Details</h3>
  <form action="<?php echo url_for('admission/contactDetails'); ?>" method="POST" id="student_contact_details_form">
    <?php echo $form->printTextArea('Address', 'address', $student['address'], 1); ?>
    <?php echo $form->printTextBox('City', 'city', $student['city'], 1, 2); ?>
    <?php echo $form->printTextBox('State', 'state', $student['state'], 1, 2); ?>
    <?php echo $form->printTextBox('Pincode', 'pincode', $student['pincode'], 1, 1); ?>
    <?php echo $form->printTextBox('Mobile', 'mobile', $student['mobile'], '', 4); ?>
    <input type="submit" value="Save & Proceed" id="save_contact_details">
  </form>
</div>

<script type="text/javascript">
  $(document).ready( function() {
    $("#student_contact_details_form").validationEngine();
  });
</script>