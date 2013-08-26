<?php include_partial('global/page_title', array('title' => 'Student', 'back_url' => 'dashboard/index', 'icon_class' => 'page-title-student-icon')); ?>

<div class="kt-small-form-container">
  <div class="form-header">Search Student</div>
  <?php $form = new formHelper(); ?>
  <form action="<?php echo url_for('search_student'); ?>" method="GET" id="student_search_form">
    <?php echo $form->printTextBox("First Name", 'name', '', 1, 2); ?>
    <?php echo $form->printSelectBox('add', "Course Type", 'course_type', $course_types['options'], $course_types['values'], 'Course Type', ''); ?>
    <?php echo $form->printSelectBox('add', "Department", 'department', array(), array(), 'Department', ''); ?>
    <input type="submit" value="Search" class="form-submit-button">
  </form>
</div>


<script type="text/javascript">
  new AdmissionForm({
    callback: 'bindCourseTypeDepartments'
  });
  $('.page-top-menu-item[item="2"]').addClass('page-top-menu-selected-item');
</script>