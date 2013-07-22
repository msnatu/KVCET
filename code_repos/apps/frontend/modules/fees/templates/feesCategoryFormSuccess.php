<?php echo link_to('Back', 'fees/feesCategories'); ?>
<?php $form = new formHelper(); ?>
<?php if($formType == 'add') { ?>
  <div class="form-header">Add Fees Category</div>
  <form action="<?php echo url_for('add_fees_category'); ?>" method="POST" id="add_fees_category_form">
    <?php echo $form->printTextBox("Category Name", 'category_name', '', 1, 2); ?>
    <input type="submit" value="Add" name="save">
  </form>
<?php } else { ?>
  <form action="<?php echo url_for('edit_fees_category'); ?>" method="POST" id="edit_fees_category_form">
    <?php echo $form->printTextBox("Category Name", 'category_name', $categoryName, 1, 2); ?>
    <input type="hidden" value="<?php echo $feesTypeId; ?>" name="fees_type_id">
    <input type="submit" value="Edit" name="save">
  </form>
<?php } ?>