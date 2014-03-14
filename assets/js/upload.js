  ;(function (w, d, undefined) {

    var dz = d.querySelector('.drop-zone'),
      progressBar = d.querySelector('.file-progress'),
      anim = d.querySelector('.anim'),
      anim2 = d.querySelector('.anim2'),
      anim3 = d.querySelector('.anim3');

    _.addEvent(dz, 'drop', function(e) {
      e.preventDefault();
      e.stopPropagation();
      _.upload(e.dataTransfer.files, '/sell/upload');

      a1();
    });

    _.addEvent(dz, 'dragover', function(e) {
      e.preventDefault();
      e.stopPropagation();
    });

    _.addEvent(dz, 'dragenter', function(e) {
      e.preventDefault();
      e.stopPropagation();

      if ( anim.classList.contains('__anim') && anim2.classList.contains('__anim2') && anim3.classList.contains('__anim3') ) {
        anim.classList.remove('__anim');
        anim.classList.add('_anim');
        anim2.classList.remove('__anim2');
        anim2.classList.add('_anim2');
        anim3.classList.remove('__anim3');
        anim3.classList.add('_anim3');
      } else {
        anim.classList.add('_anim');
        anim2.classList.add('_anim2');
        anim3.classList.add('_anim3');
      }
    });

    _.addEvent(dz, 'dragleave', function(e) {
      e.preventDefault();
      e.stopPropagation();

      a1();
    });

    function a1() {
      if ( anim.classList.contains('_anim') && anim2.classList.contains('_anim2') && anim3.classList.contains('_anim3') ) {
        anim.classList.remove('_anim');
        anim.classList.add('__anim');
        anim2.classList.remove('_anim2');
        anim2.classList.add('__anim2');
        anim3.classList.remove('_anim3');
        anim3.classList.add('__anim3');
      } else {
        anim.classList.add('__anim');
        anim2.classList.add('__anim2');
        anim3.classList.add('__anim3');
      }
    }

  })(window, document);
