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

    if (this.callback) {
      this[this.callback]();
    }
  },

  bindPersonalDetails: function(){
    $("#student_personal_details_form").validationEngine();

    var d = new Date();
    var curr_year = d.getFullYear();
    $("#dob").datepicker({
      changeMonth: true,
      changeYear: true,
      dateFormat: 'dd-mm-yy',
      yearRange:(curr_year - 35) + ':' + (curr_year)
    });

    $("#admission_date").datepicker({
      changeMonth: true,
      changeYear: true,
      dateFormat: 'dd-mm-yy',
      yearRange:(curr_year - 8) + ':' + (curr_year)
    });

    this.bindCourseTypeDepartments();
  },

  bindCourseTypeDepartments: function () {
    var self = this;
    $('#course_type').change(function() {
      $.ajax({
        url: "getCourseTypeDepartments",
        type: 'POST',
        dataType: 'json',
        data: {
          course_type: $('#course_type').val()
        },
        success: function (response) {
          var deptBox = $('#department');
          deptBox.empty();
          deptBox.append($('<option>', {
            text: 'Select Department',
            value: ''
          }));
          for(var i = 0; i < response.options.length; i++) {
            deptBox.append($('<option>', {
              text: response.options[i],
              value: response.values[i]
            }));
          }
        }, error: function() {
          alert("Can't connect to the server. Please try again!");
        }
      });
    });
  }

};