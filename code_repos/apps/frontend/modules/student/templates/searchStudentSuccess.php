<?php include_partial('global/page_title', array('title' => 'Student', 'back_url' => 'student/index', 'icon_class' => 'page-title-student-icon')); ?>

<?php $counter = $offset + 1; ?>
  <div class="kt-page-sub-header">
    Search Results for Student Name - "<?php echo $name; ?>"
    <div class="kt-desc-text-container">
<!--      --><?php //echo "Showing " . ($offset + 1) . " - " . abs(($offset - 1) * $recordsPerPage) . " of " . $totalStudents . ' students'; ?>
    </div>
  </div>
  <table class="kt-table student-search-table">
    <tr>
      <th>S.No</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Course Type</th>
      <th>Department</th>
      <th>View</th>
    </tr>
    <?php foreach ($searchedStudents as $student) { ?>
      <tr>
        <td class="center-align"><?php echo $counter; ?></td>
        <td><?php echo $student['first_name']; ?></td>
        <td><?php echo $student['last_name']; ?></td>
        <td class="center-align"><?php echo $student['StudCourseCategory']['name']; ?></td>
        <td class="center-align"><?php echo $student['StudDepartment']['name']; ?></td>
        <td class="center-align"><?php echo link_to('&nbsp;', 'profile/studentProfile?id=' . $student['student_id'], array('class' => 'view-icon')); ?></td>
      </tr>
      <?php $counter++; ?>
    <?php } ?>
  </table>
<?php echo $pagination->render(); ?>