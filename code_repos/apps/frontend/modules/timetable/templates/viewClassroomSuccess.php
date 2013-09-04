<?php include_partial('global/page_title', array('title' => 'Timetable', 'back_url' => 'timetable/index', 'icon_class' => 'page-title-timetable-icon')); ?>
<div class="kt-small-form-container">
  <div class="form-header">Search Classroom</div>
  <?php $form = new formHelper(); ?>
  <form action="<?php echo url_for('timetable_search_classroom'); ?>" method="GET" id="timetable_search_classroom_form">
    <?php echo $form->printSelectBox('add', "Course Type", 'course_type', $course_types['options'], $course_types['values'], 'Course Type', ''); ?>
    <?php echo $form->printSelectBox('add', "Department", 'department', array(), array(), 'Department', ''); ?>
    <?php echo $form->printSelectBox('add', "Batch", 'batch', array(), array(), 'Batch Year', ''); ?>
    <input type="submit" value="View" class="form-submit-button">
  </form>
</div>


<script type="text/javascript">
  new TimetableForm({
    callback: 'bindCourseTypeDepartments'
  });
  $('.page-top-menu-item[item="4"]').addClass('page-top-menu-selected-item');
</script>