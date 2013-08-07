<?php echo link_to('Back', 'fees/index'); ?>

<div class="kt-page-sub-header">Fees Due List</div>
<table class="kt-table fees-due-list-table">
  <tr>
    <th>S.No</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Course Type</th>
    <th>Department</th>
    <th>Action</th>
  </tr>
  <?php
    $counter = $offset + 1;
  ?>
  <?php foreach($dueListStudents as $student) { ?>
    <tr>
      <td class="center-align"><?php echo $counter; ?></td>
      <td><?php echo $student['first_name']; ?></td>
      <td><?php echo $student['last_name']; ?></td>
      <td class="center-align"><?php echo $student['StudCourseCategory']['course_type']; ?></td>
      <td class="center-align"><?php echo $student['StudDepartment']['department']; ?></td>
      <td
        class="center-align"><?php echo link_to('View', 'profile/studentProfile?id=' . $student['student_id']); ?></td>
    </tr>
    <?php $counter++; ?>
  <?php } ?>
</table>
<?php echo $pagination->render(); ?>

<?php //include_partial('pagination_tpl', array('pager' => $pager, 'searchUrl' => url_for('@due_list'))); ?>
