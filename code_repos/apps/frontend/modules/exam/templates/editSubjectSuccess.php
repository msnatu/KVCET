<?php include_partial('global/page_title', array('title' => 'Examination', 'straight_forward' => true, 'icon_class' => 'page-title-exam-icon')); ?>
<div class="kt-small-form-container">
  <div class="form-header">Edit Subject</div>
  <?php $form = new formHelper(); ?>
  <form method="POST" id="edit_subject_form">
    <?php echo $form->printTextBox('Subject Name', 'name', $subjectName, 1); ?>
    <?php echo $form->printTextBox('Subject Code', 'code', $subjectCode, 1); ?>
    <input type="hidden" value="<?php echo $subjectId; ?>" name="id"/>
    <input type="hidden" value="<?php echo $dept; ?>" name="dept"/>
    <input type="hidden" value="<?php echo $sem; ?>" name="sem"/>
    <input type="hidden" value="<?php echo $batch; ?>" name="batch"/>
    <input type="submit" value="Edit" name="save" class="form-submit-button">
  </form>
</div>

<script type="text/javascript">
  $(document).ready(function () {
    new PageHelper({
      navigationNo: 5,
      callback: 'activateCurrentTab'
    });
  });
</script>