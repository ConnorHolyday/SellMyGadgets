<header class="header header--main bg--light cf">
    <div class="top-bar bg--dark">
        <div class="wrapper">

          <?php if (AccountService::isLoggedIn()): ?>

            <a href="/account/dashboard" class="top-bar__a">dashboard</a>
            <a href="/account" class="top-bar__a">account</a>
            <a itemprop="url" href="/account/logout" class="top-bar__a">logout</a>

          <?php else: ?>

            <a itemprop="url" href="/account/signup" class="top-bar__a">signup</a>
            <a itemprop="url" href="/account/login" class="top-bar__a">login</a>

          <?php endif ?>

          <span class="mobile-menu"></span>
        </div>
    </div>

    <div class="wrapper">

        <div class="row">
            <div class="col m-all t-all d-4">
                <div itemscope itemtype="http//schema.org/Organization"class="main-logo">
                    <a href="/" title="Sell My Gadgets">
                        <img itemprop="logo" src="/assets/img/svg/logo.svg">
                    </a>
                </div>

            </div>

            <div class="col m-all t-all d-4">
                <nav class="nav nav--main">
                    <ul class="nav--main__ul">
                        <li class="nav--main__li"><a itemprop="url" href="/" class="nav--main__a">home</a></li>
                        <li class="nav--main__li"><a itemprop="url "href="/product/all" class="nav--main__a">buy</a></li>
                        <li class="nav--main__li"><a itemprop="url"href="/sell" class="nav--main__a">sell</a></li>
                        <li class="nav--main__li"><a itemprop="url"href="/site/about" class="nav--main__a">about</a></li>
                    </ul>
                </nav>
            </div>
        </div>

    </div>
</header>
