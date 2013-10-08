/**
 * Created with JetBrains PhpStorm.
 * User: natu
 * Date: 7/10/13
 * Time: 9:47 PM
 * To change this template use File | Settings | File Templates.
 */
var TemplateEngine = {

  paint:function (container, template, args) {
    container.append(this.html(template, args));
  },

  html:function (template, args) {
    var ejs_template = new EJS({
      text:template
    });
    return ejs_template.render(args);
  }

};