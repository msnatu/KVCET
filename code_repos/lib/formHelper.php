<?php

class formHelper
{
  public function printTextBox($label, $fieldName, $value = '', $is_required = '', $validator_type = '', $size = 30, $customClassName = '', $type = '')
  {
    $validator_class = $this->validationClass($is_required, $validator_type);

    $html = "<div class=\"form-field-container\"><label class=\"text_box_label\">$label";
    if ($is_required == 1) {
      $html .= "<span class=\"is_required\">*</span>";
    }
    $html .= "</label>";

    $html .= "<div class=\"text_box_div $customClassName\">";
    if ($type == "view") {
      $html .= "<input name=\"$fieldName\" type=\"text\" size=\"$size\" id=\"$fieldName\" value=\"$value\" readonly  class=\"text_box_view\"/>";
    } elseif ($type == "password") {
      $html .= "<input name=\"$fieldName\" type=\"password\" size=\"$size\" id=\"$fieldName\" value=\"$value\" class=\"text_box $validator_class\"/>";
    } else {
      $html .= "<input name=\"$fieldName\" type=\"text\" size=\"$size\" id=\"$fieldName\" value=\"$value\" class=\"text_box $validator_class\"/>";
    }
    $html .= "</div>";
    $html .= "<br clear=\"all\"/></div>";
    return $html;
  }

  /**
   * returns the class name required for the particular type of validation
   * @param <integer> $is_required
   * @param <integer> $type
   *  1 - Integer Only
   *  2 - Text Only
   *  3 - Date
   *  4 - Phone
   *  5 - Float number
   * @return string
   */
  public function validationClass($is_required = '', $type = '', $max = '')
  {
    //text_box validate[required,custom[onlyLetterSp]]
    $validator_class = "";
    if ($is_required || $type != null) {

      if ($is_required == 1)
        $required = "required";
      else
        $required = "";

      $max_size = "";
      if ($max) {
        if ($required)
          $max_size .= ",";
        $max_size .= "maxSize[$max]";
      }

      $validator_type = "";
      if ($type) {
        switch ($type) {
          case 1:
            if ($is_required)
              $validator_type .= ",";
            $validator_type .= "custom[integer]";
            break;
          case 2:
            if ($is_required)
              $validator_type .= ",";
            $validator_type .= "custom[onlyLetterSp]";
            break;
          case 3:
            if ($is_required)
              $validator_type .= ",";
            $validator_type .= "custom[date]";
            break;
          case 4:
            if ($is_required)
              $validator_type .= ",";
            $validator_type .= "custom[phone]";
            break;
          case 5:
            if ($is_required)
              $validator_type .= ",";
            $validator_type .= "custom[number]";
            break;
        }
      } else {
        $validator_type = "";
      }
      $validator_class = "validate[" . $required . $validator_type . $max_size . "]";
    }

    return $validator_class;
  }

  public function printSelectBox($type, $label, $tagName, $optionArray, $valueArray, $firstString = '', $valueSelected = '', $is_required = '')
  {
    $validator_class = $this->validationClass($is_required);

    $html = "<div class=\"form-field-container\">";
    $html .= "<label class=\"text_box_label\">$label";
    if ($is_required == 1)
      $html .= "<span class=\"is_required\">*</span>";
    $html .= " </label>";
    $html .= "<div class=\"text_box_div\">";
    $html .= "<select name=\"$tagName\" id=\"$tagName\" class=\"$validator_class\">";
    if ($type == 'add')
      $selected = "selected=yes";
    else
      $selected = "";
    $html .= "<option value='' " . $selected . ">Select " . $firstString . "</option>";
    for ($i = 0; $i < count($optionArray); $i++) {
      if ($valueSelected == $valueArray[$i] && $type != 'add')
        $html .= "<option value=\"" . $valueArray[$i] . "\" selected=yes>" . $optionArray[$i] . "</option>";
      else
        $html .= "<option value=\"" . $valueArray[$i] . "\">" . $optionArray[$i] . "</option>";
    }
    $html .= "</select>";
    $html .= "</div><br clear=\"all\"/></div>";
    return $html;
  }

  public function printRadioButton($type, $label, $tagName, $optionArray, $valueSelected = '', $is_required = '')
  {
    $validator_class = $this->validationClass($is_required);
    $html = "<div class=\"form-field-container\"><label class=\"text_box_label\">$label";
    if ($is_required == 1)
      $html .= "<span class=\"is_required\">*</span>";
    $html .= " </label><div class=\"text_box_div radio_box_div\">";
    if ($type == 'edit')
      $selected = "checked";
    else
      $selected = "";

    for ($i = 0; $i < count($optionArray); $i++) {
      $idName = $tagName . '_' . strtolower(str_replace(' ', '_', $optionArray[$i]));
      if ($valueSelected == $i && $type != 'add') {
        $html .= "<input type='radio' style='margin:0 5px 0 10px;' class=\"$validator_class\" name=\"$tagName\" id=\"$idName\" value=\"$i\" " . $selected . ">$optionArray[$i]";
      } else {
        $html .= "<input type='radio' style='margin:0 5px 0 10px;' class=\"$validator_class\" name=\"$tagName\" id=\"$idName\" value=\"$i\">$optionArray[$i]";
      }
    }
    $html .= "</div><br clear=\"all\"/></div>";
    return $html;
  }

  /**
   * returns a HR:MIN AM/PM drop down for both add and edit model
   * @param <string> $type (add, edit)
   * @param <string> $label
   * @param <string> $tagName ('abcd'=>'abcd_in_hour'=>'abcd_mins'=>'abcd_meridiem')
   * @param <24 hr timer> $timeSelected
   * @return string
   */
  public function printTimeDropDown($type, $label, $tagName, $timeSelected = '', $is_required = '')
  {
    if ($type != "add") {
      $temp = time_converter($timeSelected, 0);
      $temp_time = explode(':', $temp);
      $selected_hr = $temp_time[0];
      $selected_min = substr($temp_time[1], 0, 2);
      $temp_meridiem = explode(' ', $temp);
      $selected_meridiem = $temp_meridiem[1];
    }
    $html = "<div class=\"form-field-container\">";
    $html .= "<label class=\"text_box_label\">$label";
    if ($is_required == 1)
      $html .= "<span class=\"is_required\">*</span>";
    $html .= " </label>";
    $html .= "<div class=\"text_box_div\">";
    if ($type == 'add')
      $selected = "selected=yes";
    else
      $selected = "";
    $html .= "<select name=\"" . $tagName . "_hour\" id=\"hour\" class=\"hour\">";
    $html .= "<option value='' " . $selected . ">-- HR --</option>";
    for ($i = 1; $i <= 12; $i++) {
      if ($i < 10)
        $hr = "0" . $i;
      else
        $hr = $i;
      if ($type != 'add' && $selected_hr == $hr)
        $html .= "<option value=\"" . $hr . "\" selected=yes>" . $hr . "</option>";
      else
        $html .= "<option value=\"" . $hr . "\">" . $hr . "</option>";
    }
    $html .= "</select>";
    $html .= "<select name=\"" . $tagName . "_mins\" id=\"mins\" class=\"mins\">";
    $html .= "<option value='' " . $selected . ">-- MIN --</option>";
    for ($i = 0; $i <= 60; $i = $i + 5) {
      if ($i < 10)
        $m = "0" . $i;
      else
        $m = $i;
      if ($type != 'add' && $selected_min == $m)
        $selected = "selected=yes";
      else
        $selected = '';
      $html .= "<option value=\"" . $m . "\" $selected>" . $m . "</option>";
    }
    $html .= "</select>";
    $html .= "<select name=\"" . $tagName . "_meridiem\" id=\"meridiem\" class=\"meridiem\">";
    if ($type != 'add') {
      if ($selected_meridiem == 'AM') {
        $selected_1 = "selected=yes";
        $selected_2 = "";
      } else {
        $selected_1 = "";
        $selected_2 = "selected=yes";
      }
      $html .= "<option value=\"AM\" $selected_1>AM</option>";
      $html .= "<option value=\"PM\" $selected_2>PM</option>";
    } else {
      $html .= "<option value=\"AM\">AM</option>";
      $html .= "<option value=\"PM\">PM</option>";
    }
    $html .= "</select>";
    $html .= "</div><br clear=\"all\"/></div>";
    return $html;
  }

  public function printTextArea($label, $tagName, $value = '', $is_required = '', $validatorType = null, $customClassName = '', $type = '')
  {
    $validator_class = $this->validationClass($is_required, $validatorType);

    $html = "<div class=\"form-field-container\"><label class=\"text_box_label $customClassName\">$label";
    if ($is_required == 1) {
      $html .= "<span class=\"is_required\">*</span>";
    }
    $html .= " </label><div class=\"text_box_div\">";
    if ($type == "view") {
      $html .= "<textarea name=\"$tagName\" class = \"view $validator_class\" id=\"$tagName\" rows=\"2\" cols=\"45\" readonly>$value</textarea>";
    } else {
      $html .= "<textarea name=\"$tagName\" class = \"$validator_class\" id=\"$tagName\" rows=\"4\" cols=\"23\" >$value</textarea>";
    }
    $html .= "</div><br clear=\"all\"/></div>";
    return $html;
  }

  public function formatDate($inputDate)
  {
    $date = explode('-', $inputDate);
    $formattedDate = $date[2] . '-' . $date[1] . '-' . $date[0];

    return $formattedDate;
  }

}