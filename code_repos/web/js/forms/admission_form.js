/**
 * Created with JetBrains PhpStorm.
 * User: natu
 * Date: 7/12/13
 * Time: 10:58 PM
 * To change this template use File | Settings | File Templates.
 */
var AdmissionForm = function (options) {
  this.init(options);
};

AdmissionForm.prototype = {
  init: function (options) {
    for (var key in options) {
      if (options.hasOwnProperty(key)) {
        this[key] = options[key];
      }
    }

    this.validateForm();
    this.bindFormNavigation();
  },

  validateForm: function () {
    $("#student_personal_details_form, #student_contact_details_form, #student_parent_details_form, #student_prev_education_details_form").validationEngine();
  },

  bindFormNavigation: function () {
    var self = this;
    var counter = 0;
    $('#save_personal_details').unbind().bind('click', function () {
      if(counter == 0) {
        setTimeout(function(){self.formSubmit()}, 1000);
      } else {
        self.formSubmit();
      }
      counter++;
    });
  },

  getFormData: function (formId) {
    return $('#' + formId).serialize();
  },

  formSubmit: function() {
    if($('.formErrorContent').length > 0) {
      return false;
    }
    var self = this;
    $.ajax({
      url: "admission/addAdmission",
      type: 'POST',
      dataType: 'json',
      data: {
        form_data: self.getFormData('student_personal_details_form')
      },
      success: function (response) {

      }
    });
  }

};