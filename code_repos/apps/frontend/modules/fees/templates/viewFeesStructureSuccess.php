<?php include_partial('global/page_title', array('title' => 'Fees', 'back_url' => 'fees/fees-structure', 'icon_class' => 'dashboard-admission-link1')); ?>
  <div class="kt-page-sub-header">Fees Structure for <?php echo $courseName . " (" . $batchYearText . ")"; ?></div>
<?php $form = new formHelper(); ?>
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

<?php if ($isEditable) {
  echo link_to('Edit', 'fees/setFeesStructure?year=' . $acadYearNo . '&course_type=' . $courseType, array('class' => 'form-submit-button link-button'));
}
?>