<?php include_partial('global/page_title', array('title' => 'Admission', 'back_url' => 'dashboard/index', 'icon_class' => 'dashboard-admission-link1')); ?>
<div class="steps-container">
  <div class="steps-no-container">
    <div class="step-no step-no-1 active-step-no"><span>1</span></div>
    <div class="step-line step-line-1"></div>
    <div class="step-no step-no-2"><span>2</span></div>
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
$admissionModeArray = array('Government Quota', 'Management Quota', 'First Graduate');
$genderArray = array('Male', 'Female');
?>

<?php if($formType == "add") { ?>
  <div class="form-container personal-details-container">
    <div class="form-header">Personal Details</div>
    <form action="<?php echo url_for('admission/index'); ?>" method="POST" id="student_personal_details_form">
      <?php echo $form->printTextBox('Admission No', 'admission_no', $admissionNo, 1, 1); ?>
      <?php echo $form->printTextBox('First Name', 'first_name', '', 1, 2); ?>
      <?php echo $form->printTextBox('Last Name', 'last_name', '', 1, 2); ?>
      <?php echo $form->printTextBox('Date of Birth', 'dob', '', 1); ?>
      <?php echo $form->printRadioButton('edit', "Gender", 'gender', $genderArray, 0, 1); ?>
      <?php echo $form->printTextBox('Email', 'student_email', '', 1, ''); ?>
      <?php echo $form->printTextBox('Admission Date', 'admission_date', $admissionDate, 1); ?>
      <?php echo $form->printSelectBox('add', "Course Type", 'course_type', $courseTypes['options'], $courseTypes['values'], 'Course Type', '', 1); ?>
      <?php echo $form->printSelectBox('add', "Department", 'department', array(), array(), 'Department', '', 1); ?>
      <?php echo $form->printRadioButton('edit', "Admission Mode", 'admission_mode', $admissionModeArray, 0, 1); ?>
      <?php echo $form->printRadioButton('edit', "Lateral Entry", 'is_lateral', array('No', 'Yes'), 0, 1); ?>
      <input type="submit" value="Save & Proceed" name="save" class="form-submit-button">
    </form>
  </div>
<?php } else { ?>
  <h2>Edit Student</h2>
  <div class="form-container personal-details-container">
    <h3>Personal Details</h3>
    <form action="<?php echo url_for('admission/editPersonalDetails'); ?>" method="POST" id="student_personal_details_form">
      <?php echo $form->printTextBox('Admission No', 'admission_no', $student->getAdmissionNo(), 1, 1); ?>
      <?php echo $form->printTextBox('First Name', 'first_name', $student->getFirstName(), 1, 2); ?>
      <?php echo $form->printTextBox('Last Name', 'last_name', $student->getLastName(), 1, 2); ?>
      <?php echo $form->printTextBox('Date of Birth', 'dob', $form->formatDate($student->getDob()), 1); ?>
      <?php echo $form->printRadioButton('edit', "Gender", 'gender', $genderArray, $student->getGender(), 1); ?>
      <?php echo $form->printTextBox('Email', 'student_email', $student->getEmail(), 1, ''); ?>
      <?php echo $form->printTextBox('Admission Date', 'admission_date', $form->formatDate($student->getAdmissionDate()), 1); ?>
      <?php echo $form->printSelectBox('edit', "Course Type", 'course_type', $courseTypes['options'], $courseTypes['values'], 'Course Type', $student->getCourseType(), 1); ?>
      <?php echo $form->printSelectBox('edit', "Department", 'department', $departments['options'], $departments['values'], 'Department', $student->getDepartment(), 1); ?>
      <?php echo $form->printRadioButton('edit', "Admission Mode", 'admission_mode', $admissionModeArray, $student->getAdmissionMode(), 1); ?>
      <?php echo $form->printRadioButton('edit', "Lateral Entry", 'is_lateral', array('No', 'Yes'), $student->getIsLateral(), 1); ?>
      <input type="submit" value="Save & Proceed" name="save" id="save_personal_details"/>
      <input type="hidden" value="<?php echo $student->getStudentId()?>" name="student_id"/>
    </form>
  </div>
<?php } ?>

<script type="text/javascript">
  $(document).ready( function() {
    new AdmissionForm({
      callback: 'bindPersonalDetails'
    });
  });
</script>