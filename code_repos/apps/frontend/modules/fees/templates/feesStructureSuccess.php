<?php echo link_to('Back', 'fees/index');
$academic = new academicHelper();
$form = new formHelper();
?>
<div class="form-header">Fees Structure</div>
<form action="<?php echo url_for('view_fees_structure'); ?>" method="POST" id="student_fees_structure_form">
  <?php echo $form->printSelectBox('add', "Course Type", 'course_type', $course_types['options'], $course_types['values'], 'Course Type', '', 1); ?>
  <?php echo $form->printSelectBox('add', "Year", 'acad_year_no', array(), array(), 'Year', '', 1); ?>
  <input type="submit" value="View" name="save" id="save_fees_structure">
</form>

<script type="text/javascript">
  new FeesForm({
    callback: 'getCourseTotalYears'
  });
</script>