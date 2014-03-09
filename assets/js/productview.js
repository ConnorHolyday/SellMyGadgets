
;(function (w, d, undefined) {

  var viewList = d.querySelector('.view--list'),
      viewGrid = d.querySelector('.view--grid'),
      display = d.querySelector('.display--grid');

  function toggleDisplay() {
    display.classList.toggle('display--list');
    display.classList.toggle('display--grid');
  }

  viewList.addEventListener('click', function(e){
    e.preventDefault();
    if ( display.classList.contains('display--grid') )
      toggleDisplay();
  });

  viewGrid.addEventListener('click', function(e){
    e.preventDefault();
    if ( display.classList.contains('display--list') )
      toggleDisplay();
  });

})(window, document);
