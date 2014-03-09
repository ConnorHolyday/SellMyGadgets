  ;(function (w, d, undefined) {

    var dropZone = d.querySelector('.drop-zone'),
      progressBar = d.querySelector('.file-progress'),
      anim = d.querySelector('.anim'),
      anim2 = d.querySelector('.anim2'),
      anim3 = d.querySelector('.anim3');

    dropZone.addEventListener('drop', function(e) {
      e.preventDefault();
      e.stopPropagation();

      var files = e.dataTransfer.files,
        len = files.length > 5 ? 5 : files.length;

      for(var i = 0; i < len; i++) {
        sendFile(files[i]);
      }
    }, false);

    dropZone.addEventListener('dragover', function(e) {
      e.preventDefault();
      e.stopPropagation();
    }, false);

    dropZone.addEventListener('dragenter', function(e) {
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
    }, false);

    dropZone.addEventListener('dragleave', function(e) {
      e.preventDefault();
      e.stopPropagation();

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
    }, false);

    dropZone.addEventListener('drop', function(e) {
      e.preventDefault();
      e.stopPropagation();

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
    }, false);

    function sendFile(file) {

      var xhr = new XMLHttpRequest(),
        fd = new FormData();

      xhr.open('POST', '/sell/upload', true);
      fd.append('uploads[]', file);
      fd.append('isAsync', 'true');
      xhr.send(fd);

      xhr.addEventListener('load', function () {
        if (xhr.status >= 200 && xhr.status < 400){
          // Success
          //console.log('Success');
          console.log(xhr.responseText);
        } else {
          // server returned an error.
          //console.log('Error');
          console.log(xhr.responseText);
        }
      }, false);
    }

  })(window, document);
