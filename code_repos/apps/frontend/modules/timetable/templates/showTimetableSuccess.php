<?php include_partial('global/page_title', array('title' => 'Timetable', 'straight_forward' => true, 'icon_class' => 'page-title-timetable-icon')); ?>

<table class="kt-table timetable-table">
  <?php
  $totalPeriods = count($classroomPeriods);
  if($totalPeriods == 1) {
    echo "<div class='no-records-found-box'>Periods has not been created for this classroom yet.<br> Please contact the administrator.</div>";
    return;
  }
  $totalDays = array('Mon', 'Tue', 'Wed', 'Thu', 'Fri');
  $breakText = array('B', 'R', 'E', 'A', 'K');
  echo "<tr>";
  echo "<th  class='day-th'>Days\Periods</th>";
  for ($period = 0; $period < $totalPeriods; $period++) {
    $breakStyle = ($classroomPeriods[$period]['is_break_time']) ? "break-time-th" : 'timetable-th';
    echo "<td class='" . $breakStyle . "'>" . $classroomPeriods[$period]['start_time'] . " - " . $classroomPeriods[$period]['end_time'] . "</td>";
  }
  echo "</tr>";

  for ($day = 0; $day < count($totalDays); $day++) {
    echo "<tr>";
    echo "<th valign='center' class='day-th'>" . $totalDays[$day] . "</th>";
    for ($p = 0; $p < $totalPeriods; $p++) {
      if($classroomPeriods[$p]['is_break_time']) {
        echo "<td class='break-time-td' period_id='" . $classroomPeriods[$p]['id'] . "'>" . $breakText[$day] . "</td>";
      } else {
        echo "<td class='period-td' period_id='" . $classroomPeriods[$p]['id'] . "'>&nbsp;</td>";
      }
    }
    echo "</tr>";
  }
  ?>
</table>

<script type="text/javascript">
  new TimetableForm({
    callback: 'bindSearchClassTimetable'
  });
  $('.page-top-menu-item[item="4"]').addClass('page-top-menu-selected-item');
</script>