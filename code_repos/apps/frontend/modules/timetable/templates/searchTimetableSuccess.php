<?php include_partial('global/page_title', array('title' => 'Timetable', 'straight_forward' => true, 'icon_class' => 'page-title-timetable-icon')); ?>
<?php $formHelper = new formHelper(); ?>
<div class="kt-page-sub-header">
  Search Classroom
  <div class="kt-desc-text-container">
    Select classroom to create/edit the timetable
  </div>
</div>
<br clear="all"/>
<div class="kt-small-form-container">
  <div class="form-header">Search Classroom</div>
  <?php $form = new formHelper(); ?>
  <?php $semesters = array(1, 2, 3, 4, 5, 6, 7, 8); ?>
  <form action="<?php echo url_for('show_timetable'); ?>" method="GET" id="timetable_search_form">
    <?php echo $form->printSelectBox('add', "Course Type", 'course_type', $course_types['options'], $course_types['values'], 'Course Type', ''); ?>
    <?php echo $form->printSelectBox('add', "Department", 'department', array(), array(), 'Department', ''); ?>
    <?php echo $form->printSelectBox('add', "Batch", 'batch', array(), array(), 'Batch Year', ''); ?>
    <?php echo $form->printSelectBox('add', "Section", 'section_no', array(), array(), 'Section', ''); ?>
    <?php echo $form->printSelectBox('add', "Semester", 'semester', $semesters, $semesters, 'Semester', ''); ?>
    <input type="submit" value="View" class="form-submit-button">
  </form>
</div>


<script type="text/javascript">
  new TimetableForm({
    callback: 'bindSearchClassTimetable'
  });
  $('.page-top-menu-item[item="4"]').addClass('page-top-menu-selected-item');
</script>