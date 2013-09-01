var ExaminationForm = function (options) {
  this.init(options);
};

ExaminationForm.prototype = {
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
    $('#course_type').change(function () {
      $.ajax({
        url: LocationHelper.routeFor("getCourseTypeDepartments"),
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
  }

};

var LocationHelper = {
  routeFor: function (route) {
    if (this.isProductionEnv()) {
      return "/" + route;
    } else {
      var path = document.location.pathname;
      return path == "/" ? path + route : path.substring(0, path.indexOf("/", 1) + 1) + route;
    }
  },

  isProductionEnv: function () {
    if (document.location.hostname) {
      return document.location.hostname.indexOf("54.226.211.94") >= 0;
    }
    return true;
  }
};
