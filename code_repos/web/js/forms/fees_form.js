/**
 * Created with JetBrains PhpStorm.
 * User: natu
 * Date: 7/12/13
 * Time: 10:58 PM
 * To change this template use File | Settings | File Templates.
 */
var FeesForm = function (options) {
  this.init(options);
};

FeesForm.prototype = {
  init: function (options) {
    for (var key in options) {
      if (options.hasOwnProperty(key)) {
        this[key] = options[key];
      }
    }

    this[this.callback]();
  },

  getCourseTotalYears: function() {
    var self = this;
    $('#course_type').change(function() {

      $.ajax({
        url: "getCourseTotalYears",
        type: 'POST',
        dataType: 'json',
        data: {
          course_type: $('#course_type').val()
        },
        success: function (response) {
          var totalYears = response.total_years;
          var yearBox = $('#acad_year_no');
          yearBox.empty();
          yearBox.append($('<option>', {
            text: 'Select Year',
            value: ''
          }));
          for(var i = 1; i <= totalYears; i++) {
            yearBox.append($('<option>', {
              text: i,
              value: i
            }));
          }
        }
      });
    });
  }

};