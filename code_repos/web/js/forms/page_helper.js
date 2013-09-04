/**
 * Created with JetBrains PhpStorm.
 * User: natu
 * Date: 7/27/13
 * Time: 11:27 PM
 * To change this template use File | Settings | File Templates.
 */
var PageHelper = function (options) {
  this.init(options);
};

PageHelper.prototype = {
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

  activateCurrentTab: function() {
    $('.page-top-menu-item[item="' + this.navigationNo + '"]').addClass('page-top-menu-selected-item');
  },

  routeFor: function (route) {
    if (this.isProdEnv()) {
      return "/" + route;
    } else {
      var path = document.location.pathname;
      return path == "/" ? path + route : path.substring(0, path.indexOf("/", 1) + 1) + route;
    }
  },

  isProdEnv: function () {
    if (document.location.hostname) {
      return document.location.hostname.indexOf("54.226.211.94") >= 0;
    }
    return true;
  }

};