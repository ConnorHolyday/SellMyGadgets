  <section class="form form--login">

  <h1>Please login to continue</h1>

    <form action="/account/login" method="post">

      <div class="row">
        <div class="col m-all t-2 d-4 / label__bottom form__block">
          <input type="text" name="username" placeholder="example@example.com" required>
          <label for="username">Username:</label>
        </div>
        <div class="col m-all t-2 d-4 / label__bottom form__block">
          <input type="password" name="password" placeholder="••••••••••" required>
          <label for="password">Password:</label>
        </div>
      </div>

      <?php if(isset($_GET['from'])): ?>

      <input type="hidden" name="to" value="<?php echo $_GET['from']; ?>">

      <?php endif ?>

      <a href="/account/signup">Signup</a>
      <span>|</span>
      <a href="/account/forgotten-password">Forgot your password?</a>

      <button type="sbumit" class="btn btn--dark pull-right">Login</button>

    </form>

  </section>

  <script>
    document.getElementsByTagName('input')[0].focus();
  </script>
