<?php echo link_to('Back', 'fees/index'); ?>
<div class="form-header">Fees Categories</div>
<div class="kt-desc-text-container">
  You can Add/Edit the fees categories, which would reflect on the Fees Structure Form
</div>
<?php echo link_to('Add Fees Category', 'add_fees_category'); ?>
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
      <td class="center-align"><?php echo link_to('Edit', 'fees/editFeesCategory?id='. $feeType['value']); ?></td>
    </tr>
  <?php
    $counter++;
  }
  ?>
</table>