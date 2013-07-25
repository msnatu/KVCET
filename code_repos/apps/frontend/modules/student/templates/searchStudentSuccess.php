<?php echo link_to('Back', 'student/index'); ?>

<div class="form-header">Search Results for Student Name - "<?php echo $name;?>"</div>
<table class="kt-table student-search-table">
  <tr>
    <th>S.No</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Course Type</th>
    <th>Department</th>
    <th>Action</th>
  </tr>
  <?php
  $counter = $pager->getFirstIndice();
  echo "Showing " . $pager->getFirstIndice() . " - " . $pager->getLastIndice() . " of " . $pager->count() . ' students';
  foreach ($pager->getResults() as $student) {
    ?>
    <tr>
      <td class="center-align"><?php echo $counter; ?></td>
      <td><?php echo $student->getFirstName(); ?></td>
      <td><?php echo $student->getLastName(); ?></td>
      <td class="center-align"><?php echo $student->getStudCourseCategory()->getName(); ?></td>
      <td class="center-align"><?php echo $student->getStudDepartment()->getName(); ?></td>
      <td
        class="center-align"><?php echo link_to('View', 'profile/studentProfile?id=' . $student->getStudentId()); ?></td>
    </tr>
    <?php
    $counter++;
  }
  ?>
</table>

<?php include_partial('pagination_tpl', array('pager' => $pager, 'searchUrl' => url_for('@search_student'), 'search_parameter' => 'name', 'search_term' => $name)); ?>
