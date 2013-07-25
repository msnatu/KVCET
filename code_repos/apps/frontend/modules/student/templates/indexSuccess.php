<div class="page-body-header">Search Student</div>
<?php $form = new formHelper(); ?>
<form action="<?php echo url_for('search_student'); ?>" method="POST" id="student_search_form">
  <?php echo $form->printTextBox("First Name", 'name', '', 1, 2); ?>
  <?php echo $form->printSelectBox('add', "Course Type", 'course_type', $course_types['options'], $course_types['values'], 'Course Type', ''); ?>
  <?php echo $form->printSelectBox('add', "Department", 'department', array(), array(), 'Department', ''); ?>
  <input type="submit" value="Search" name="save" class="form-submit-btn">
</form>


<script type="text/javascript">
  new AdmissionForm({
    callback: 'bindCourseTypeDepartments'
  });
  $('.page-top-menu-item[item="2"]').addClass('page-top-menu-selected-item');
</script>