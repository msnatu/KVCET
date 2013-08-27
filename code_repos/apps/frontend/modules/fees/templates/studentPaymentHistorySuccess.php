<?php include_partial('global/page_title', array('title' => 'Student', 'back_url' => 'student/fees?id=' . $studentId, 'icon_class' => 'page-title-student-icon')); ?>
<?php $academicHelper = new academicHelper(); ?>
<?php if ($feesEntrySuccess != '') { ?>
  <div class="form-success-msg"><?php echo $feesEntrySuccess; ?></div>
<?php } ?>

<div class="kt-page-sub-header">Payment History of <?php echo $studentName . " (" . $batchYearText . ")" ?></div>
<div class="page-sep-line"></div>
<br/>
<?php for ($acadYearNo = $currentAcadYearNo; $acadYearNo >= 1; $acadYearNo--) {
  $totalAmount = 0;
  $totalPaidFeesAmount = 0;
  $totalDiscountAmount = 0;
  $varyingFees = StudentVaryingFeesTable::getInstance()->findOneByStudentIdAndAcadYearNo($student->getStudentId(), $acadYearNo);
  ?>
  <!-- FEES ASSIGNMENT NOTICE -->
  <?php if (!$varyingFees) { ?>
    <div class="form-notice">NOTE: Varying fees has not been assigned
      for <?php echo $academicHelper->getYearSuffix($acadYearNo); ?> year
    </div>
  <?php } ?>

  <!-- FEES STRUCTURE -->
  <?php if (count($feesStructure[$acadYearNo]) > 1) { ?> <!-- For object, the count is 1 for a null array -->
    <div class="kt-page-sub-header">Fees Structure for <?php echo $academicHelper->getYearSuffix($acadYearNo); ?>year
    </div>
    <table class="kt-table fees-categories-table">
      <tr>
        <th>S.No</th>
        <th>Fees Type</th>
        <th>Amount</th>
      </tr>
      <?php
      $counter = 1;
      foreach ($feesStructure[$acadYearNo] as $feeType) {
        $totalAmount += $feeType['amount'];
        ?>
        <tr>
          <td class="center-align"><?php echo $counter; ?></td>
          <td><?php echo $feeType['fees_type']; ?></td>
          <td class="center-align"><?php echo $feeType['amount']; ?></td>
        </tr>
        <?php
        $counter++;
      } ?>
      <tr class="bold-text">
        <td colspan="2" class="center-align">Total</td>
        <td class="center-align"><?php echo $totalAmount; ?></td>
      </tr>
    </table>
  <?php } else { ?>
    <div class="form-notice">Please define the fees structure
      for <?php echo $academicHelper->getYearSuffix($acadYearNo); ?> year
    </div>
  <?php } ?>

  <!-- FEES PAID -->
  <?php if (isset($feesPaid[$acadYearNo])) { ?>
    <div class="kt-page-sub-header">Fees Paid for <?php echo $academicHelper->getYearSuffix($acadYearNo); ?> year</div>
    <table class="kt-table fees-paid-table">
      <tr>
        <th>S.No</th>
        <?php if ($isEditable) { ?>
          <th>Edit</th>
        <?php } ?>
        <th>Date</th>
        <th>Challan No</th>
        <th>Entry by</th>
        <th>Amount</th>
      </tr>
      <?php
      $paidFeesCounter = 1;
      foreach ($feesPaid[$acadYearNo] as $fp) {
        $totalPaidFeesAmount += $fp['amount'];
        ?>
        <tr>
          <td class="center-align"><?php echo $paidFeesCounter; ?></td>
          <?php if ($isEditable) { ?>
            <td class="center-align"><?php echo link_to('&nbsp;', 'student/edit-fees?id=' . $fp['id'], array('class' => 'edit-icon')); ?></td>
          <?php } ?>
          <td class="center-align"><?php echo $fp['date']; ?></td>
          <td class="center-align"><?php echo $fp['challan_no']; ?></td>
          <td class="center-align"><?php echo $fp['entry_by']; ?></td>
          <td class="center-align"><?php echo $fp['amount']; ?></td>
        </tr>
        <?php
        $paidFeesCounter++;
      }
      ?>
      <tr class="bold-text">
        <td colspan="<?php echo $isEditable ? 5 : 4; ?>" class="center-align"></td>
        <td class="center-align"><?php echo $totalPaidFeesAmount; ?></td>
      </tr>
    </table>
  <?php } else { ?>
    <div class="form-notice">This year does not have any paid fees history</div>
  <?php } ?>

  <!-- FEES DISCOUNT -->
  <?php if (isset($feesDiscount[$acadYearNo])) { ?>
    <div class="kt-page-sub-header">Fees Discount for <?php echo $academicHelper->getYearSuffix($acadYearNo); ?>year
    </div>
    <table class="kt-table fees-discount-table">
      <tr>
        <th>S.No</th>
        <?php if ($isEditable) { ?>
          <th>Edit</th>
        <?php } ?>
        <th>Description</th>
        <th>Amount</th>
      </tr>
      <?php
      $feesDiscountCounter = 1;
      foreach ($feesDiscount[$acadYearNo] as $fd) {
        $totalDiscountAmount += $fd['amount'];
        ?>
        <tr>
          <td class="center-align"><?php echo $feesDiscountCounter; ?></td>
          <?php if ($isEditable) { ?>
            <td class="center-align"><?php echo link_to('&nbsp;', 'student/edit-fees-discount?id=' . $fd['id'], array('class'=>'edit-icon')); ?></td>
          <?php } ?>
          <td class="center-align"><?php echo $fd['description']; ?></td>
          <td class="center-align"><?php echo $fd['amount']; ?></td>
        </tr>
        <?php
        $feesDiscountCounter++;
      }
      ?>
      <tr class="bold-text">
        <td colspan="<?php echo $isEditable ? 3 : 2; ?>" class="center-align"></td>
        <td class="center-align"><?php echo $totalDiscountAmount; ?></td>
      </tr>
    </table>
  <?php } else { ?>
    <div class="italic-text">No Discount has been levied on this student</div>
  <?php } ?>

  <!-- DUE AMOUNT-->
  <?php
  if ($totalAmount != 0) {
    $balance = $totalAmount - $totalPaidFeesAmount;
    if ($balance == 0) {
      ?>
      <div class="fees-history-balance">No Due</div>
    <?php } else { ?>
      <div class="fees-history-balance due-amount">Due amount:
        Rs.<?php echo $totalAmount - $totalPaidFeesAmount - $totalDiscountAmount; ?></div>
    <?php
    }
  } ?>
  <div class="page-sep-line"></div>

<?php } ?>

<script type="text/javascript">
  $(document).ready(function () {
    new PageHelper({
      navigationNo: 2,
      callback: 'activateCurrentTab'
    });
  });
</script>