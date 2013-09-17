var TimetableForm = function (options) {
  this.init(options);
};

TimetableForm.prototype = {
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

  bindCourseTypeDepartments: function () {
    var self = this;
    var pageHelper = new PageHelper();
    $('#course_type').change(function () {
      $.ajax({
        url: pageHelper.routeFor("getCourseTypeDepartments"),
        type: 'POST',
        dataType: 'json',
        data: {
          course_type: $('#course_type').val()
        },
        success: function (response) {
          self.sections = response.sections;
          var section = $('#section_no');
          section.empty();
          section.append($('<option>', {
            text: 'Select Section',
            value: ''
          }));

          var deptBox = $('#department');
          deptBox.empty();
          deptBox.append($('<option>', {
            text: 'Select Department',
            value: ''
          }));
          var departmentOptions = response.options ? response.options : [];
          for (var i = 0; i < departmentOptions.length; i++) {
            deptBox.append($('<option>', {
              text: response.options[i],
              value: response.values[i]
            }));
          }

          //batch year
          var batchYear = $('#batch');
          batchYear.empty();
          batchYear.append($('<option>', {
            text: 'Select Batch Year',
            value: ''
          }));
          var d = new Date();
          for (var i = 0; i < response.batch_years.length; i++) {
            batchYear.append($('<option>', {
              text: response.batch_years_text[i],
              value: response.batch_years[i]
            }));
          }
        }, error: function () {
          alert("Can't connect to the server. Please try again!");
        }
      });
    });
  },

  bindSearchClassTimetable: function () {
    var self = this;
    this.bindCourseTypeDepartments();
    $('#department').change(function () {
      var section = $('#section_no');
      section.empty();
      section.append($('<option>', {
        text: 'Select Section',
        value: ''
      }));

      for (var i = 1; i <= self.sections[$(this).val()]; i++) {
        section.append($('<option>', {
          text: i,
          value: i
        }));
      }

    });
  }

};
