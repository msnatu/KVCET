<?php
if($successMsg != "") {
  echo $successMsg;
}
$formHelper = new formHelper();
?>

<h2>Student Profile</h2>
<?php
if($isEditable) {
  echo link_to('Edit', 'admission/index?id=' . $student->getStudentId());
}
?>
<table class="kt-table student-profile-table">
  <tr>
    <th colspan="2">Personal Details</th>
  </tr>
  <tr>
    <td>First Name:</td>
    <td><?php echo $student->getFirstName(); ?></td>
  </tr>
  <tr>
    <td>Last Name:</td>
    <td><?php echo $student->getLastName(); ?></td>
  </tr>
  <tr>
    <td>Date of Birth:</td>
    <td><?php echo $formHelper->formatDate($student->getDob()); ?></td>
  </tr>
  <tr>
    <td>Gender:</td>
    <td><?php echo $student->getGender() == 0 ? "Male" : "Female" ; ?></td>
  </tr>
  <tr>
    <td>Email:</td>
    <td><?php echo $student->getEmail(); ?></td>
  </tr>
  <tr>
    <td>Admission Date:</td>
    <td><?php echo $formHelper->formatDate($student->getAdmissionDate()); ?></td>
  </tr>
  <tr>
    <td>Department:</td>
    <td><?php echo $student->getStudDepartment()->getName(); ?></td>
  </tr>
  <tr>
    <td>Admission Mode:</td>
    <td><?php echo $student->getAdmissionMode() == 0 ? "Counseling" : "Management"; ?></td>
  </tr>
</table>

<br/>
<br/>
<table class="kt-table student-profile-table">
  <tr>
    <th colspan="2">Contact Details</th>
  </tr>
  <tr>
    <td>Address:</td>
    <td><?php echo $student->getAddress(); ?></td>
  </tr>
  <tr>
    <td>City:</td>
    <td><?php echo $student->getCity(); ?></td>
  </tr>
  <tr>
    <td>State:</td>
    <td><?php echo $student->getState(); ?></td>
  </tr>
  <tr>
    <td>Pincode:</td>
    <td><?php echo $student->getPincode(); ?></td>
  </tr>
  <tr>
    <td>Mobile:</td>
    <td><?php echo $student->getMobile(); ?></td>
  </tr>
</table>
<br/>
<br/>
<table class="kt-table student-profile-table">
  <tr>
    <th colspan="2">Parent Details</th>
  </tr>
  <tr>
    <td>First Name:</td>
    <td><?php echo $student->getParentFirstName(); ?></td>
  </tr>
  <tr>
    <td>Last Name:</td>
    <td><?php echo $student->getParentLastName(); ?></td>
  </tr>
  <tr>
    <td>Relation:</td>
    <td><?php echo $student->getParentGender() == 0 ? "Male" : "Female"; ?></td>
  </tr>
  <tr>
    <td>Occupation:</td>
    <td><?php echo $student->getParentOccupation(); ?></td>
  </tr>
  <tr>
    <td>Phone:</td>
    <td><?php echo $student->getParentPhone(); ?></td>
  </tr>
  <tr>
    <td>Mobile:</td>
    <td><?php echo $student->getParentMobile(); ?></td>
  </tr>
  <tr>
    <td>Email:</td>
    <td><?php echo $student->getParentEmail(); ?></td>
  </tr>
</table>
<br/>
<br/>
<table class="kt-table student-profile-table">
  <tr>
    <th colspan="2">Previous Educational Details</th>
  </tr>
  <tr>
    <td>Institution Name:</td>
    <td><?php echo $student->getInstitutionName(); ?></td>
  </tr>
  <tr>
    <td>Total Mark Percentage:</td>
    <td><?php echo $student->getTotalPercentMarks() . "%"; ?></td>
  </tr>
</table>