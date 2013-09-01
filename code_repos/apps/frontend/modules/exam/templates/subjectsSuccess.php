<?php include_partial('global/page_title', array('title' => 'Examination', 'back_url' => 'dashboard/index', 'icon_class' => 'page-title-exam-icon')); ?>
<?php $semesters = [1, 2, 3, 4, 5, 6, 7, 8]; ?>
<div class="kt-small-form-container">
  <div class="form-header">View Subjects</div>
  <?php $form = new formHelper(); ?>
  <form action="<?php echo url_for('search_subject'); ?>" method="GET" id="subject_search_form">
    <?php echo $form->printSelectBox('add', "Course Type", 'course_type', $course_types['options'], $course_types['values'], 'Course Type', ''); ?>
    <?php echo $form->printSelectBox('add', "Department", 'department', array(), array(), 'Department', ''); ?>
    <?php echo $form->printSelectBox('add', "Batch", 'batch', array(), array(), 'Batch Year', ''); ?>
    <?php echo $form->printSelectBox('add', "Semester", 'semester', $semesters, $semesters, 'Semester', ''); ?>
    <input type="submit" value="View" class="form-submit-button">
  </form>
</div>


<script type="text/javascript">
  new ExaminationForm({
    callback: 'bindCourseTypeDepartments'
  });
  $('.page-top-menu-item[item="5"]').addClass('page-top-menu-selected-item');
</script>