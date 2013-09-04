<?php include_partial('global/page_title', array('title' => 'Timetable', 'straight_forward' => true, 'icon_class' => 'page-title-timetable-icon')); ?>
<?php $formHelper = new formHelper(); ?>
<div class="kt-page-sub-header">
  Assign Student's Classroom
  <div class="kt-desc-text-container">
    Select the students and assign the section
  </div>
</div>
<?php //echo link_to('Add Subject', 'add_subject', array('dept' => $department, 'sem' => $semester, 'batch' => $batchYear), array('class' => 'add-new-btn')); ?>
<br clear="all"/>

<?php if (count($searchedStudents) == 0) { ?>
  <div class="no-records-found-box">No remaining students have been found in this department.</div>
<?php } else { ?>
<form action="<?php echo url_for('timetable_assign_classroom') ?>" method="POST" class="assign-classroom">
  <table class="kt-table fees-categories-table">
    <tr>
      <th>&nbsp;</th>
      <th>S.No</th>
      <th>First Name</th>
      <th>Last Name</th>
    </tr>
    <?php
    $counter = 1;
    foreach ($searchedStudents as $student) {
      ?>
      <tr>
        <td class="center-align"><input type="checkbox" name="student_id[]" value="<?php echo $student['student_id']; ?>"/></td>
        <td class="center-align"><?php echo $counter; ?></td>
        <td><?php echo $student['first_name']; ?></td>
        <td><?php echo $student['last_name']; ?></td>
      </tr>
      <?php
      $counter++;
    }
    ?>
  </table>
  <?php } ?>
  <?php echo $formHelper->printSelectBox('add', 'Section', 'section', $sections, $sections, 'Section', '', 1); ?>
  <input type="hidden" name="department" value="<?php echo $department; ?>"/>
  <input type="hidden" name="batch" value="<?php echo $batchYear; ?>"/>
  <input type="submit" name="assign" value="Assign" class="form-submit-button"/>
</form>

<script type="text/javascript">
  $(document).ready(function () {
    new PageHelper({
      navigationNo: 5,
      callback: 'activateCurrentTab'
    });
  });
</script>