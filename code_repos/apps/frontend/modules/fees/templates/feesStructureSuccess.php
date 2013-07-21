<?php echo link_to('Back', 'fees/index'); ?>
<?php
$academic = new academicHelper();
$currentAcadYear = $academic->getCurrentAcadYear();
$firstYear = $currentAcadYear . " - " . ($currentAcadYear + 4);
$secondYear = ($currentAcadYear - 1) . " - " . ($currentAcadYear + 3);
$thirdYear = ($currentAcadYear - 2) . " - " . ($currentAcadYear + 2);
$finalYear = ($currentAcadYear - 3) . " - " . ($currentAcadYear + 1);
?>
<div class="form-header">Fees Structure</div>
<?php
  $form = new formHelper();
?>
<form action="<?php echo url_for('view_fees_structure'); ?>" method="POST" id="student_personal_details_form">
  <?php echo $form->printSelectBox('add', "Course Type", 'course_type', $course_types['options'], $course_types['values'], 'Course Type', '', 1); ?>
  <?php echo $form->printSelectBox('add', "Year", 'acad_year_no', array(), array(), 'Year', '', 1); ?>
  <input type="submit" value="View" name="save" id="save_personal_details">
</form>

<script type="text/javascript">
  new FeesForm({
    callback: 'getCourseTotalYears'
  });
</script>