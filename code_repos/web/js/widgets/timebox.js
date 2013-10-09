/**
 * Created with JetBrains PhpStorm.
 * User: natu
 * Date: 8/10/13
 * Time: 10:44 PM
 * To change this template use File | Settings | File Templates.
 */
var TimeBox = function (options) {
  this.init(options);
};

TimeBox.prototype = {
  init: function (options) {
    for (var key in options) {
      if (options.hasOwnProperty(key)) {
        this[key] = options[key];
      }
    }
    this.splitValue();
    this.renderHour();
    this.renderMin();
    this.renderMeridiem();
  },

  splitValue: function () {
    if(!this.value) {
      return false;
    }
    var values = this.value.split(':');
    this.hourValue = values[0] > 12 ? values[0] - 12 : values[0];
    this.minValue = values[1];
    this.meridiemValue = values[0] > 12 ? 2 : 1;
  },

  renderHour: function () {
    var hourBox = document.createElement('select');
    hourBox.id = this.id + '_hour';
    hourBox.className = 'hour-box';

    var hourLabel = document.createElement('option');
    hourLabel.innerHTML = 'Hour';
    hourBox.appendChild(hourLabel);

    for (var i = 1; i <= 12; i++) {
      var option = document.createElement('option');
      option.value = i;
      option.innerHTML = i;
      hourBox.appendChild(option);
    }

    this.container.append(hourBox);
    hourBox.value = this.hourValue ? this.hourValue : '';
  },

  renderMin: function () {
    var minBox = document.createElement('select');
    minBox.id = this.id + '_min';
    minBox.className = 'min-box';

    var minLabel = document.createElement('option');
    minLabel.innerHTML = 'Min';
    minBox.appendChild(minLabel);

    for (var i = 0; i <= 59; i = i + 5) {
      var option = document.createElement('option');
      option.value = i;
      option.innerHTML = i;
      minBox.appendChild(option);
    }

    this.container.append(minBox);
    minBox.value = this.minValue ? this.minValue : '';
  },

  renderMeridiem: function () {
    var meridiemBox = document.createElement('select');
    meridiemBox.id = this.id;
    meridiemBox.className = 'min-box';

    var am = document.createElement('option');
    am.value = 1;
    am.innerHTML = 'AM';
    meridiemBox.appendChild(am);

    var pm = document.createElement('option');
    pm.value = 2;
    pm.innerHTML = 'PM';
    meridiemBox.appendChild(pm);

    this.container.append(meridiemBox);
    meridiemBox.value = this.meridiemValue;
  }

};