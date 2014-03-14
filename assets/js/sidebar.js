(function (w, d, undefined) {

  var sidebar = d.querySelector('.page-options__sidebar'),
      boundaries = d.querySelector('.page-options').offsetHeight * 2,
      sidebarHeight = d.querySelector('.content').offsetHeight - boundaries;

  sidebar.style.height= + sidebarHeight + 'px';

})(window, document);
