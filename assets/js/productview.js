
;(function (d) {
  var vl = d.querySelector('.view--list'),
    vg = d.querySelector('.view--grid'),
    dp = d.querySelector('.display--grid'),
    bound = d.querySelector('.page-options').offsetHeight * 2,
    toggleDisplay = function() {
      _.cssClass.toggle(dp, 'display--list');
      _.cssClass.toggle(dp, 'display--grid');
    },
    sb = {
      el: d.querySelector('.page-options__sidebar'),
      height: d.querySelector('.content').offsetHeight - bound
    };

  sb.el.style.height = sb.height + 'px';

  _.addEvent(vl, 'click', function(e) {
    e.preventDefault();
    toggleDisplay();
  });
  _.addEvent(vg, 'click', function(e) {
    e.preventDefault();
    toggleDisplay();
  });
})(document);
