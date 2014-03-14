
;(function (d) {
  var vl = d.querySelector('.view--list'),
      vg = d.querySelector('.view--grid'),
      dp = d.querySelector('.display--grid'),
      toggleDisplay = function() {
        _.cssClass.toggle(dp, 'display--list');
        _.cssClass.toggle(dp, 'display--grid');
      };
  _.addEvent(vl, 'click', function(e) {
    e.preventDefault();
    toggleDisplay();
  });
  _.addEvent(vg, 'click', function(e) {
    e.preventDefault();
    toggleDisplay();
  });
})(document);
