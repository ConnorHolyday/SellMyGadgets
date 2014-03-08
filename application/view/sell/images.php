<section>

  <div class="hero-banner">
    <div class="wrapper">
      <h1>Sell an item</h1>
    </div>
  </div>

  <div class="wrapper">

    <h2>Images</h2>

    <form action="/sell/item/delivery" method="post" class="submit-form" enctype="multipart/form-data">

      <div class="drop-zone__wrapper">
        <h1>Drag 'n' drop</h1>

        <div class="drop-zone__wrapper-inner">
          <div class="drop-zone vertical-align">
            <span class="arrow">&#8593;</span>
            <span class="anim"></span>
            <span class="anim2"></span>
            <span class="anim3"></span>
          </div>
        </div>
      </div>

      <input type="file" name="uploads[]" multiple>

      <button type="submit" class="form__submit pull-right">Next Stage</button>

    </form>
  </div>

</section>

<script type="text/javascript">

  //*

  ;(function (w, d, undefined) {

    var dropZone = d.querySelector('.drop-zone'),
      progressBar = d.querySelector('.file-progress'),
      anim = d.querySelector('.anim'),
      anim2 = d.querySelector('.anim2'),
      anim3 = d.querySelector('.anim3');

    dropZone.addEventListener('drop', function(e) {
      e.preventDefault();
      e.stopPropagation();

      var files = e.dataTransfer.files;

      for(var i = 0, len = files.length; i < len; i++) {
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

      xhr.send(fd);

      xhr.addEventListener('load', function () {
        //progressBar.setAttribute('value', (100));

        if (xhr.status >= 200 && xhr.status < 400){
          // Success
          console.log('Success');
          console.log(xhr.responseText);
        } else {
          // server returned an error.
          console.log('Error');
          console.log(xhr.responseText);
        }

      }, false);

    }

  })(window, document);

  //*/

</script>
