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

 }