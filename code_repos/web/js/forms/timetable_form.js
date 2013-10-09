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
  },

  bindTimetableForm: function () {
    var self = this;
    this.bindPeriodsForm();
    if(this.showForm == false) {
      return false;
    }
    this.pageHelper = new PageHelper();
    $('.period-td').colorbox({
      html: '<div class="timetable-form-body"></div>',
      width: '50%',
      height: '50%',
      opacity: 0.5,
      cbox_open: function () {
        self.period_id = $(this).attr('period_id');
        self.day_no = $(this).attr('day_no');
        $.ajax({
          url: self.pageHelper.routeFor("timetable/get-assigned-period"),
          type: 'POST',
          data: {
            period_id: self.period_id,
            day_no: self.day_no
          },
          success: function (response) {
            self.assignmentFormData = response.data;
            self.renderTimetableForm();
          }
        });
      }
    });
  },

  renderTimetableForm: function () {
    var bodyContainer = $('.timetable-form-body');
    bodyContainer.append('<div class="kt-page-sub-header">Period Assignment</div>');
    bodyContainer.append(this.formHtml);
    bodyContainer.append('<div class="form-submit-button small-btn">Save</div>');
    if(this.assignmentFormData) {
      $('#staff').val(Number(this.assignmentFormData.staff_id));
      $('#subject').val(Number(this.assignmentFormData.subject_id));
    }
    this.bindSaveTimetable();
  },

  bindSaveTimetable: function() {
    var self = this;
    $('.form-submit-button').unbind('click').bind('click', function() {
      $.ajax({
        url: self.pageHelper.routeFor("timetable/assign-period"),
        type: 'POST',
        data: {
          period_id: self.period_id,
          day_no: self.day_no,
          staff_id: $('#staff').val(),
          subject_id: $('#subject').val()
        },
        success: function () {
          window.location.reload();
        }
      });
    });
  },

  bindPeriodsForm: function () {
    var self = this;
    this.pageHelper = new PageHelper();
    $('.js-manage-period-btn').unbind('click').bind('click', function () {
      $.ajax({
        url: self.pageHelper.routeFor("timetable/get-classroom-periods"),
        type: 'POST',
        dataType: 'json',
        data: {
          section_no: $(this).attr('section_no'),
          batch: $(this).attr('batch'),
          semester: $(this).attr('semester'),
          department: $(this).attr('department')
        },
        success: function (response) {
          self.periods = response.data;
          self.renderPeriodForm();
        }
      });
    });
  },

  renderPeriodForm: function () {
    var self = this;
    $('.no-records-found-box').hide();
    $('.js-manage-period-btn').hide();
    var table = $('.timetable-table');
    table.hide();
    var periodFormContainer = $('.period-form-container');
    periodFormContainer.empty();
    periodFormContainer.show();
    TemplateEngine.paint(periodFormContainer, '<table class="period-form kt-table">\n  <th>No</th>\n  <th>Start Time</th>\n  <th>End Time</th>\n  <th>Is Break Time</th>\n  <th>Remove</th>\n</table>');
    this.periodRowTpl = '<tr class="period-row" period_id="<%=p.id%>">\n  <td class="counter"><%=counter%></td>\n  <td class="start-time-container"></td>\n  <td class="end-time-container"></td>\n  <td class="break-checkbox-container"></td>\n  <td class="delete-btn-container"></td>\n</tr>';

    this.formTable = $('.period-form');
    var counter = 1;
    _.each(this.periods, function (period) {
      TemplateEngine.paint(self.formTable, self.periodRowTpl, {
        p: period,
        counter: counter
      });
      counter++;

      new TimeBox({
        container: $('.period-row[period_id="' + period.id + '"] .start-time-container'),
        id: 'start_time_' + period.id,
        value: period.start_time
      });

      new TimeBox({
        container: $('.period-row[period_id="' + period.id + '"] .end-time-container'),
        id: 'end_time_' + period.id,
        value: period.end_time
      });

      var isBreak = period.is_break_time ? 'checked' : '';
      $('.period-row[period_id="' + period.id + '"] .break-checkbox-container').append('<input type="checkbox" ' + isBreak + ' id="is_break_' + period.id + '" value="1"/>');
      $('.period-row[period_id="' + period.id + '"] .delete-btn-container').append('<div class="delete-icon"></div> ');

    });
    periodFormContainer.append('<div class="period-btn-container">\n  <div class="float-left form-submit-button period-submit-btn">Submit</div>\n  <div class="float-left cancel-btn period-cancel-btn">Cancel</div>\n  <div class="float-left blue-btn period-add-btn">Add Another</div>\n  <div class="clr"></div>\n</div>\n');
    this.bindAddPeriod();
    this.bindDeletePeriod();
    this.bindCancelPeriod();
  },

  bindAddPeriod: function () {
    var self = this;
    $('.period-add-btn').unbind('click').bind('click', function () {
      var newCounter = parseInt($('.counter').length) + 1;
      TemplateEngine.paint(self.formTable, self.periodRowTpl, {
        p: {id: 'new_' + newCounter},
        counter: newCounter
      });

      new TimeBox({
        container: $('.period-row[period_id="new_' + newCounter + '"] .start-time-container'),
        id: 'start_time_new_' + newCounter
      });

      new TimeBox({
        container: $('.period-row[period_id="new_' + newCounter + '"] .end-time-container'),
        id: 'end_time_new_' + newCounter
      });

      $('.period-row[period_id="new_' + newCounter + '"] .break-checkbox-container').append('<input type="checkbox" id="is_break_' + newCounter + '" value="1"/>');
      $('.period-row[period_id="new_' + newCounter + '"] .delete-btn-container').append('<div class="delete-icon"></div> ');

      self.bindDeletePeriod();
    });
  },

  bindDeletePeriod: function () {
    $('.delete-icon').unbind('click').bind('click', function () {
      $(this).parent().parent().remove();

      //reorder serial no
      var rows = $('.counter');
      counter = 1;
      _.each(rows, function(row) {
        $(row).html(counter);
        counter++;
      });
    });
  },

  bindCancelPeriod: function () {
    $('.period-cancel-btn').unbind('click').bind('click', function () {
      $('.no-records-found-box').show();
      $('.js-manage-period-btn').show();
      $('.timetable-table').show();
      $('.period-form-container').hide();
    });
  }

};
