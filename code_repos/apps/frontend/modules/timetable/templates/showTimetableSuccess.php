<?php include_partial('global/page_title', array('title' => 'Timetable', 'straight_forward' => true, 'icon_class' => 'page-title-timetable-icon')); ?>
<div
    class="kt-page-sub-header"><?php echo $dept . " | Batch - " . $batch . " | " . html_entity_decode($sem) . " Semester | Section - " . $section; ?></div>
<div class="add-new-btn js-manage-period-btn" department="<?php echo $department; ?>" batch="<?php echo $batch; ?>"
     semester="<?php echo $semester; ?>" section_no="<?php echo $section; ?>">Add/Edit Periods
</div>
<?php
$totalPeriods = count($classroomPeriods);
if ($totalPeriods <= 1) {
  echo "<div class='no-records-found-box'>Periods has not been created for this classroom</div>";
} else { ?>
  <table class="kt-table timetable-table">
    <?php
    $totalDays = array('Mon', 'Tue', 'Wed', 'Thu', 'Fri');
    $breakText = array('B', 'R', 'E', 'A', 'K');
    echo "<tr>";
    echo "<th  class='day-th'>Day\Time</th>";
    for ($period = 0; $period < $totalPeriods; $period++) {
      $breakStyle = ($classroomPeriods[$period]['is_break_time']) ? "break-time-th" : 'timetable-th';
      $startTime = date('g:i a', strtotime($classroomPeriods[$period]['start_time']));
      $endTime = date('g:i a', strtotime($classroomPeriods[$period]['end_time']));
      echo "<td class='" . $breakStyle . "'>" . $startTime . " - " . $endTime . "</td>";
    }
    echo "</tr>";

    for ($day = 0; $day < count($totalDays); $day++) {
      echo "<tr>";
      echo "<th valign='center' class='day-th'>" . $totalDays[$day] . "</th>";
      for ($p = 0; $p < $totalPeriods; $p++) {
        $periodId = $classroomPeriods[$p]['id'];
        if ($classroomPeriods[$p]['is_break_time']) {
          echo "<td class='break-time-td' period_id='" . $periodId . "'>" . $breakText[$day] . "</td>";
        } else {
          if (isset($assignmentDetails[$periodId]) && $assignmentDetails[$periodId]['day_no'] == ($day + 1)) {
            $periodDetails = '<div class="subject-name-td">' . $assignmentDetails[$periodId]['Subject']['name'] . '</div>';
            $periodDetails .= '<div class="staff-name-td">' . ucwords($assignmentDetails[$periodId]['Staff']['first_name']) . '</div>';
          } else {
            $periodDetails = '&nbsp;';
          }
          echo "<td class='period-td' day_no='" . ($day + 1) . "' period_id='" . $periodId . "'>" . $periodDetails . "</td>";
        }
      }
      echo "</tr>";
    }
    ?>
  </table>
<?php } ?>
<div class="period-form-container"></div>

<?php
$form = new formHelper();
$formHtml = '';
$showForm = 'true';
if (count($subjects) == 0) {
  echo "<div class='no-records-found-box'>Please add the subjects to this batch first, to continue</div>";
  $showForm = 'false';
} else {
  $formHtml .= $form->printSelectBox('add', "Subject", 'subject', $subjects['options'], $subjects['values'], 'Subject');
  $showForm = 'true';
}

if (count($staffs) == 0) {
  $otherUserLink = url_for1('otherUser/index');
  echo "<a href='" . $otherUserLink . "' class='no-records-found-box-link'><div class='no-records-found-box'>Please click here to add staffs to this department first</div></a> ";
  $showForm = 'false';
} else {
  $formHtml .= $form->printSelectBox('add', "Staff", 'staff', $staffs['options'], $staffs['values'], 'Staff');
  $showForm = 'true';
}

?>

<script type="text/javascript">
  new TimetableForm({
    callback: 'bindTimetableForm',
    formHtml: <?php echo json_encode($formHtml); ?>,
    showForm: <?php echo $showForm; ?>
  });
  $('.page-top-menu-item[item="4"]').addClass('page-top-menu-selected-item');
</script>
