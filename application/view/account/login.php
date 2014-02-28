  <section class="form form--login">
    <form action="/account/login" method="post">
      <h1>
        Please Login to continue
      </h1>

      <div class="row">
        <div class="col m-all t-2 d-4">
          <label for="username" class="form__label">Username:</label>
          <input type="text" name="username" placeholder="example@example.com" class="form__textbox">
        </div>
        <div class="col m-all t-2 d-4">
          <label for="password" class="form__label">Password:</label>
          <input type="password" name="password" placeholder="••••••••••" class="form__textbox">
        </div>
      </div>

      <?php if(isset($_GET['from'])): ?>

      <input type="hidden" name="to" value="<?php echo $_GET['from']; ?>">

      <?php endif ?>

      <a href="/account/forgotten-password">Forgot your password?</a>

      <button class="btn btn--dark pull-right">Login</button>

    </form>

  </section>

  <script>
    document.getElementsByTagName('input')[0].focus();
  </script>