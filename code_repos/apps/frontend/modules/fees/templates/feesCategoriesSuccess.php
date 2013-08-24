<?php include_partial('global/page_title', array('title' => 'Fees', 'back_url' => 'fees/index', 'icon_class' => 'page-title-fees-icon')); ?>
<div class="kt-page-sub-header">
  Fees Categories
  <div class="kt-desc-text-container">
    You can Add/Edit the fees categories, which would reflect on the Fees Structure Form
  </div>
</div>
<?php echo link_to('Add Fees Category', 'add_fees_category', array(), array('class' => 'add-new-btn')); ?>
<br clear="all"/>

<table class="kt-table fees-categories-table">
  <tr>
    <th>S.No</th>
    <th>Fees Type</th>
    <th>Action</th>
  </tr>
  <?php
  $counter = 1;
  foreach ($feesTypes as $feeType) {
    ?>
    <tr>
      <td class="center-align"><?php echo $counter; ?></td>
      <td><?php echo $feeType['name']; ?></td>
      <td class="center-align"><?php echo link_to('&nbsp;', 'fees/editFeesCategory?id=' . $feeType['value'], array('class' => 'edit-icon')); ?></td>
    </tr>
    <?php
    $counter++;
  }
  ?>
</table>