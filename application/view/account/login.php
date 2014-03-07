  <section class="form form--login">

  <h1>Please Login to continue</h1>

    <form action="/account/login" method="post">

      <div class="row form__block">
        <div class="col m-all t-2 d-4 / label__bottom">
          <input type="text" name="username" placeholder="example@example.com" required>
          <label for="username">Username:</label>
        </div>
        <div class="col m-all t-2 d-4 / label__bottom">
          <input type="password" name="password" placeholder="••••••••••" required>
          <label for="password">Password:</label>
        </div>
      </div>

      <?php if(isset($_GET['from'])): ?>

      <input type="hidden" name="to" value="<?php echo $_GET['from']; ?>">

      <?php endif ?>

      <a href="/account/forgotten-password">Forgot your password?</a>

      <button type="sbumit" class="btn btn--dark pull-right">Login</button>

    </form>

  </section>

  <script>
    document.getElementsByTagName('input')[0].focus();
  </script>