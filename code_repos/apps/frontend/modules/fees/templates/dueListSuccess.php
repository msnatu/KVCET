<?php include_partial('global/page_title', array('title' => 'Fees', 'back_url' => 'fees/index', 'icon_class' => 'page-title-fees-icon')); ?>

<div class="kt-page-sub-header">Fees Due List</div>
<table class="kt-table fees-due-list-table">
  <tr>
    <th>S.No</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Course Type</th>
    <th>Department</th>
    <th>View</th>
  </tr>
  <?php $counter = $offset + 1; ?>
  <?php foreach($dueListStudents as $student) { ?>
    <tr>
      <td class="center-align"><?php echo $counter; ?></td>
      <td><?php echo $student['first_name']; ?></td>
      <td><?php echo $student['last_name']; ?></td>
      <td class="center-align"><?php echo $student['StudCourseCategory']['course_type']; ?></td>
      <td class="center-align"><?php echo $student['StudDepartment']['department']; ?></td>
      <td
        class="center-align"><?php echo link_to('&nbsp;', 'profile/studentProfile?id=' . $student['student_id'], array('class' => 'view-icon')); ?></td>
    </tr>
    <?php $counter++; ?>
  <?php } ?>
</table>
<?php echo $pagination->render(); ?>
