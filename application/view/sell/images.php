<style type="text/css">
  .drop-zone {
    width: 200px;
    height: 200px;
    margin: 40px;
    border: 4px dashed #34AADC;
  }
</style>

<section>

  <div class="hero-banner">
    <div class="wrapper">
      <h1>Sell an item</h1>
    </div>
  </div>

  <div class="wrapper">

    <h2>Images</h2>

    <form action="/sell/item/delivery" method="post" class="form" enctype="multipart/form-data">

      <!--<progress max="100" value="0" class="file-progress"></progress>
      <div class="drop-zone">
      </div>
      <p id="resp"></p>-->


      <input type="file" name="uploads[]" multiple>

      <input type="submit" class="form__submit button button--submit" value="Next Stage">

    </form>
  </div>

</section>

<script type="text/javascript">

  /*

  ;(function (w, d, undefined) {

    var dropZone = d.querySelector('.drop-zone'),
      progressBar = d.querySelector('.file-progress');

    function processUpload(file) {
      var xhr = new XMLHttpRequest();

      xhr.upload.addEventListener('progress', function (e) {

        if(e.lengthComputable) {
          progressBar.setAttribute('value', (e.loaded / e.total) * 100);
        }

      }, false);

      xhr.onload = function() {
        if (xhr.status >= 200 && xhr.status < 400){
          // Success
          d.getElementById('resp').innerText = xhr.responseText;
        } else {
          // server returned an error.
        }
      }

      xhr.addEventListener('load', function () {
        //progressBar.setAttribute('value', (100));
      }, false);

      xhr.open('post', '/sell/upload', true);

      xhr.setRequestHeader('Content-Type', 'multipart/form-data');
      xhr.setRequestHeader('X-File-Name', file.name);
      xhr.setRequestHeader('X-File-Size', file.size);
      xhr.setRequestHeader('X-File-Type', file.type);

      xhr.send(file);
    }

    function prepareFiles(files) {
      if (typeof files !== undefined) {
        for (var i = 0, len = files.length; i < len; i++) {
          processUpload(files[i]);
        }
      }
    }

    dropZone.addEventListener('drop', function(e) {
      prepareFiles(e.dataTransfer.files);
      e.preventDefault();
      e.stopPropagation();
    }, false);

    dropZone.addEventListener('dragenter', function(e) {
      e.preventDefault();
      e.stopPropagation();
    }, false);

    dropZone.addEventListener('dragover', function(e) {
      e.preventDefault();
      e.stopPropagation();
    }, false);

  })(window, document);

  //*/

</script>
