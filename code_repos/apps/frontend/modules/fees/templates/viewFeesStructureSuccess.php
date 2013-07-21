<?php echo link_to('Back', 'fees/fees-structure'); ?>
<div class="form-header">Fees Structure for <?php echo $courseName . " (" . $batchYearText . ")"; ?></div>
<?php $form = new formHelper(); ?>
<?php if($isEditable) {
  echo link_to('Edit', 'fees/setFeesStructure?year='. $acadYearNo.'&course_type='.$courseType);
}
?>
<table class="kt-table fees-structure-table">
  <tr>
    <th>Fees Type</th>
    <th>Amount</th>
  </tr>
  <?php
  foreach ($feesTypes as $feeType) {
    $fieldValue = isset($feesStructure[$feeType['value']]) ? $feesStructure[$feeType['value']] : '-';
  ?>
    <tr>
      <td><?php echo $feeType['name']; ?></td>
      <td><?php echo $fieldValue; ?></td>
    </tr>
  <?php } ?>
</table>