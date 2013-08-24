<?php include_partial('global/page_title', array('title' => 'Fees', 'back_url' => 'fees/index', 'icon_class' => 'page-title-fees-icon')); ?>
<div class="kt-small-form-container">

  <?php $form = new formHelper(); ?>
  <?php if ($formType == 'add') { ?>
    <div class="kt-desc-text-container">Add the new fees category</div>
    <div class="form-header">Add Fees Category</div>
    <form action="<?php echo url_for('add_fees_category'); ?>" method="POST" id="add_fees_category_form">
      <?php echo $form->printTextBox("Category Name", 'category_name', '', 1, 2); ?>
      <input type="submit" value="Add" name="save" class="form-submit-button">
    </form>
  <?php } else { ?>
    <div class="kt-desc-text-container">Edit fees category</div>
    <div class="form-header">Edit Fees Category</div>
    <form action="<?php echo url_for('edit_fees_category'); ?>" method="POST" id="edit_fees_category_form">
      <?php echo $form->printTextBox("Category Name", 'category_name', $categoryName, 1, 2); ?>
      <input type="hidden" value="<?php echo $feesTypeId; ?>" name="fees_type_id">
      <input type="submit" value="Edit" name="save" class="form-submit-button">
    </form>
  <?php } ?>
</div>