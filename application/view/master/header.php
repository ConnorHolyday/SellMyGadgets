    <header class="header header--main bg--light cf">
      <div class="top-bar bg--dark">
        <div class="wrapper">
        <?php if (AccountService::isLoggedIn()): ?>
          <a href="/account/dashboard" class="top-bar__a">dashboard</a>
          <a href="/account" class="top-bar__a">account</a>
          <a href="/account/logout" class="top-bar__a">logout</a>
        <?php else: ?>
          <a href="/account/signup" class="top-bar__a">signup</a>
          <a href="/account/login" class="top-bar__a">login</a>
        <?php endif ?>
        </div>
      </div>
      <div class="wrapper">
        <div class="main-logo">
          <a href="/" title="Sell My Gadgets">
            <img src="/assets/img/svg/logo.svg">
          </a>
        </div>
        <nav class="nav nav--main">
          <ul class="nav--main__ul">
            <li class="nav--main__li"><a href="/" class="nav--main__a selected">home</a></li>
            <li class="nav--main__li"><a href="/product/all" class="nav--main__a">buy</a></li>
            <li class="nav--main__li"><a href="/sell" class="nav--main__a">sell</a></li>
            <li class="nav--main__li"><a href="/site/about" class="nav--main__a">about</a></li>
          </ul>
        </nav>
      </div>
    </header>