<?php include_partial('global/page_title', array('title' => 'Examination', 'back_url' => 'exam/index', 'icon_class' => 'page-title-exam-icon')); ?>
<div class="kt-page-sub-header">
  Subjects
  <div class="kt-desc-text-container">
    You can Add/Edit the subjects here
  </div>
</div>
<?php echo link_to('Add Subject', 'add_subject', array('dept' => $department, 'sem' => $semester, 'batch' => $batchYear), array('class' => 'add-new-btn')); ?>
<br clear="all"/>

<?php if (count($searchedSubjects) == 0) { ?>
  <div class="no-records-found-box">No subjects have been added to this semester.</div>
<?php } else { ?>
  <table class="kt-table fees-categories-table">
    <tr>
      <th>S.No</th>
      <th>Subject Name</th>
      <th>Subject Code</th>
      <th>Edit</th>
    </tr>
    <?php
    $counter = 1;
    foreach ($searchedSubjects as $subject) {
      ?>
      <tr>
        <td class="center-align"><?php echo $counter; ?></td>
        <td><?php echo $subject['name']; ?></td>
        <td><?php echo $subject['code']; ?></td>
        <td class="center-align"><?php echo link_to('&nbsp;', url_for2('edit_subject', array('id' => $subject['id'], 'dept' => $department, 'sem' => $semester, 'batch' => $batchYear)), array('class' => 'edit-icon')); ?></td>
      </tr>
      <?php
      $counter++;
    }
    ?>
  </table>
<?php } ?>


<script type="text/javascript">
  $(document).ready( function() {
    new PageHelper({
      navigationNo: 5,
      callback: 'activateCurrentTab'
    });
  });
</script>