<section class="form form--login">

  <h1>Reset your Password</h1>

  <form action="/account/forgotten-password" method="post">

    <div class="row">
      <div class="col m-all t-all d-all / label__bottom form__block">
        <input type="text" name="username" placeholder="example@example.com" required>
        <label for="username">Email Address:</label>
      </div>
    </div>

    <button type="sbumit" class="btn btn--dark pull-right">Reset Password</button>
  </form>

</section>

<script>
  document.getElementsByTagName('input')[0].focus();
</script>