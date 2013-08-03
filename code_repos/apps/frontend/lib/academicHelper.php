<?php

 class academicHelper {

   public function getCurrentAcadYear() {
     $currentCalYear = date('Y');
     $currentCalMonth = date('n');
     if($currentCalMonth >= 7) {
       $currentAcadYear = $currentCalYear;
     } else {
       $currentAcadYear = $currentCalYear - 1;
     }

     return $currentAcadYear;
   }

   public function getBatchYear($yearNo) {
     $currentAcadYear = $this->getCurrentAcadYear();
     if($yearNo == 1) {
       $batchYearText = $currentAcadYear;
     } else if ($yearNo == 2) {
       $batchYearText = ($currentAcadYear - 1);
     } else if ($yearNo == 3) {
       $batchYearText = ($currentAcadYear - 2);
     } else if ($yearNo == 4) {
       $batchYearText = ($currentAcadYear - 3);
     } else {
       $batchYearText = 0;
     }

     return $batchYearText;
   }

   public function getBatchYearText($yearNo) {
     $currentAcadYear = $this->getCurrentAcadYear();
     if($yearNo == 1) {
       $batchYearText = $currentAcadYear . " - " . ($currentAcadYear + 4);
     } else if ($yearNo == 2) {
       $batchYearText = ($currentAcadYear - 1) . " - " . ($currentAcadYear + 3);
     } else if ($yearNo == 3) {
       $batchYearText = ($currentAcadYear - 2) . " - " . ($currentAcadYear + 2);
     } else if ($yearNo == 4) {
       $batchYearText = ($currentAcadYear - 3) . " - " . ($currentAcadYear + 1);
     } else {
       $batchYearText = '';
     }

     return $batchYearText;
   }

   public function getAcadYearNo($batchYear) {
     $currentAcadYear = $this->getCurrentAcadYear();
     return ($currentAcadYear - $batchYear) + 1;
   }

   public function getTotalYearsList($courseType) {
     $totalYears = CourseTypesTable::getInstance()->getTotalYears($courseType);
     $academicYears = array();
     for($i = 1; $i<=$totalYears['total_years']; $i++) {
       $academicYears[] = $i;
     }

     return $academicYears;
   }

   public function getYearSuffix($yearNo) {
     if($yearNo == 1) {
       return '1<sup>st</sup>';
     } else if($yearNo == 2) {
       return '2<sup>nd</sup>';
     } else if($yearNo == 3) {
       return '3<sup>rd</sup>';
     } else if($yearNo == 4) {
       return '4<sup>th</sup>';
     }
   }

 }