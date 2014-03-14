
  <section class="form--signup">

  <h1>Signup Process</h1>

    <form action="/account/signup" method="post">

      <div class="row">
        <div class="col m-all t-2 d-4 / label__bottom form__block">
          <input type="text" name="firstname" required>
          <label for="firstname">First Name</label>
        </div>
        <div class="col m-all t-2 d-4 / label__bottom form__block">
          <input type="text" name="surname" required>
          <label for="surname">Surname</label>
        </div>
      </div>


      <div class="form__block label__bottom">
        <input type="email" name="email" required>
        <label for="email">Email</label>
      </div>

      <div class="row">
        <div class="col m-all t-2 d-4 / label__bottom form__block">

          <input type="text" name="address1" required>
          <label for="address1">Address Line 1</label>
        </div>
        <div class="col m-all t-2 d-4 / label__bottom form__block">

          <input type="text" name="address2" required>
          <label for="address2">Address Line 2</label>
        </div>
      </div>


      <div class="form__block label__bottom">
        <input type="text" name="town_city" required>
        <label for="town_city">Town / City</label>
      </div>


      <div class="form__block label__bottom">
        <input type="text" name="county" required>
        <label for="county">County</label>
      </div>


      <div class="form__block label__bottom">
        <input type="text" name="postcode" required>
        <label for="postcode">Postcode</label>
      </div>


      <div class="form__block label__bottom">
        <input type="tel" name="phonenumber" required>
        <label for="phonenumber">Phone Number</label>
      </div>


      <div class="form__block label__bottom">
        <input type="password" name="password" required>
        <label for="password">Password</label>
      </div>

      <button class="btn btn--dark pull-right">Signup</button>

    </form>

  </section>

  <script>
    document.getElementsByTagName('input')[0].focus();
  </script>
