<?php echo link_to('Back', 'student/fees?id='.$studentId); ?>
<?php $academicHelper = new academicHelper(); ?>

<div class="kt-page-sub-header">Payment History of <?php echo $studentName . " (" . $batchYearText . ")"?></div>
<div class="page-sep-line"></div>
<br/>
<?php for($acadYearNo = $currentAcadYearNo; $acadYearNo >= 1; $acadYearNo--) {
  $totalAmount = 0;
  $totalPaidFeesAmount = 0;
  $varyingFees = StudentVaryingFeesTable::getInstance()->findOneByStudentIdAndAcadYearNo($student->getStudentId(), $acadYearNo);
  ?>
  <?php if(!$varyingFees) { ?>
    <div class="form-notice">NOTE: Varying fees has not been assigned for <?php echo $academicHelper->getYearSuffix($acadYearNo); ?> year</div>
  <?php } ?>
  <?php if(count($feesStructure[$acadYearNo]) > 1) { ?> <!-- For object, the count is 1 for a null array -->
    <div class="form-header">Fees Structure for <?php echo $academicHelper->getYearSuffix($acadYearNo); ?> year</div>
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
  <?php } else {?>
    <div class="form-notice">Please define the fees structure for <?php echo $academicHelper->getYearSuffix($acadYearNo); ?> year</div>
  <?php } ?>

  <?php if(isset($feesPaid[$acadYearNo])) { ?>
    <div class="form-header">Fees Paid for <?php echo $academicHelper->getYearSuffix($acadYearNo); ?> year</div>
    <table class="kt-table fees-categories-table">
      <tr>
        <th>S.No</th>
        <th>Date</th>
        <th>Challan No</th>
        <th>Amount</th>
      </tr>
      <?php
      $paidFeesCounter = 1;
      foreach ($feesPaid[$acadYearNo] as $fp) {
        $totalPaidFeesAmount += $fp['amount'];
        ?>
        <tr>
          <td class="center-align"><?php echo $paidFeesCounter; ?></td>
          <td><?php echo $fp['date']; ?></td>
          <td class="center-align"><?php echo $fp['challan_no']; ?></td>
          <td class="center-align"><?php echo $fp['amount']; ?></td>
        </tr>
        <?php
        $paidFeesCounter++;
      }
      ?>
      <tr class="bold-text">
        <td colspan="3" class="center-align">Total Paid Amount</td>
        <td class="center-align"><?php echo $totalPaidFeesAmount; ?></td>
      </tr>
    </table>
  <?php } else { ?>
    <div class="form-notice">This year does not have any paid fees history</div>
  <?php } ?>

  <?php
  if($totalAmount != 0) {
    $balance = $totalAmount - $totalPaidFeesAmount;
    if($balance == 0) { ?>
      <div class="fees-history-balance">No Due</div>
    <?php } else { ?>
      <div class="fees-history-balance due-amount">Due amount: Rs.<?php echo $totalAmount - $totalPaidFeesAmount; ?></div>
    <?php
    }
  } ?>
  <div class="page-sep-line"></div>

<?php } ?>