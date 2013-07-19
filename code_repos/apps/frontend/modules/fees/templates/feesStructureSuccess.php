<?php echo link_to('Back', 'fees/index'); ?>
<?php
$currentYear = date('Y');
$firstYear = $currentYear . " - " . ($currentYear + 4);
$secondYear = ($currentYear - 1) . " - " . ($currentYear + 3);
$thirdYear = ($currentYear - 2) . " - " . ($currentYear + 2);
$finalYear = ($currentYear - 3) . " - " . ($currentYear + 1);
?>
<h2>Fees Structure</h2>
<div>
  <?php echo link_to('Set Fees For ' . $firstYear . ' batch', 'fees/index'); ?>
</div>
<div>
  <?php echo link_to('Set Fees For ' . $secondYear . ' batch', 'fees/index'); ?>
</div>
<div>
  <?php echo link_to('Set Fees For ' . $thirdYear . ' batch', 'fees/index'); ?>
</div>
<div>
  <?php echo link_to('Set Fees For ' . $finalYear . ' batch', 'fees/index'); ?>
</div>