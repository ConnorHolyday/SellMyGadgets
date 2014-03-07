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

      <div class="drop-zone">
      </div>

      <input type="file" name="uploads[]" multiple>

      <input type="submit" class="form__submit button button--submit" value="Next Stage">

    </form>
  </div>

</section>

<script type="text/javascript">

  //*

  ;(function (w, d, undefined) {

    var dropZone = d.querySelector('.drop-zone'),
      progressBar = d.querySelector('.file-progress');

    dropZone.addEventListener('drop', function(e) {
      e.preventDefault();
      e.stopPropagation();

      var files = e.dataTransfer.files;

      for(var i = 0, len = files.length; i < len; i++) {
        sendFile(files[i]);
      }

    }, false);

    dropZone.addEventListener('dragenter', function(e) {
      e.preventDefault();
      e.stopPropagation();
    }, false);

    dropZone.addEventListener('dragover', function(e) {
      e.preventDefault();
      e.stopPropagation();
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
