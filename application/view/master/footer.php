<footer class="footer__main bg--dark cf">
  <div class="wrapper">
    <div class="row">
      <div class="col m-all t-2 d-5">
        <h1>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h1>

        <p>Quas eligendi totam sapiente adipisci officia rem vero quidem distinctio. Totam, assumenda, vel perferendis amet incidunt nihil ea quos fugiat laborum magni.</p>

        <p>Quas eligendi totam sapiente adipisci officia rem vero quidem distinctio. Totam, assumenda, vel perferendis amet incidunt nihil ea quos fugiat laborum magni.</p>
      </div>
    </div>
    <div class="sub-footer cf">
      <ul class="pull-left nav__footer inline-links inline-links--bar">
        <li><a itemprop="url" href="/site/terms">Terms &amp; Conditions</a></li>
        <li><a itemprop="url" href="/site/privacy">Privacy Policy</a></li>
        <li><a itemprop="url" href="/site/cookies">Cookies</a></li>
        <li><a itemprop="url" href="/site/advertising">Advertising</a></li>
        <li><a itemprop="url" href="/site/map">Sitemap</a></li>
        <li><a itemprop="url" href="/site/help">Help</a></li>
      </ul>
      <span class="pull-right">&copy; Sell My Gadgets <?php echo date("Y") ?></span>
    </div>
  </div>
</footer>
<script type="text/javascript" charset="utf-8">
  var body = document.querySelector("body"),
      mobileMenu = document.querySelector(".mobile-menu");

  mobileMenu.addEventListener("click", function(){
    if ( body.classList.contains('active') )
      body.classList.remove('active');
    else
      body.classList.add('active');
  }, false);
</script>
