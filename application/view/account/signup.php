
  <section class="form form--signup cf">

    <form action="/account/signup" method="post" class="form">

      <h1>
        Signup Process
      </h1>

      <div class="row">
        <div class="col m-all t-2 d-4">
          <label class="form__label" for="firstname">First Name:</label>
          <input type="text" name="firstname" class="form__textbox">
        </div>
        <div class="col m-all t-2 d-4">
          <label class="form__label" for="surname">Surname:</label>
          <input type="text" name="surname" class="form__textbox">
        </div>
      </div>

      <label class="form__label" for="email">Email:</label>
      <input type="email" name="email" class="form__textbox">

      <div class="row">
        <div class="col m-all t-2 d-4">
          <label class="form__label" for="address1">Address Line 1:</label>
          <input type="text" name="address1" class="form__textbox">
        </div>
        <div class="col m-all t-2 d-4">
          <label class="form__label" for="address2">Address Line 2:</label>
          <input type="text" name="address2" class="form__textbox">
        </div>
      </div>

      <label class="form__label" for="town_city">Town / City:</label>
      <input type="text" name="town_city" class="form__textbox">

      <label class="form__label" for="county">County:</label>
      <input type="text" name="county" class="form__textbox">

      <label class="form__label" for="postcode">Postcode:</label>
      <input type="text" name="postcode" class="form__textbox">

      <label class="form__label" for="phonenumber">Phone Number:</label>
      <input type="tel" name="phonenumber" class="form__textbox">

      <label class="form__label" for="password">Password:</label>
      <input type="password" name="password" class="form__textbox">

      <input type="submit" class="form__submit btn btn--dark pull-right" value="Signup">

    </form>

  </section>

  <script>
    document.getElementsByTagName('input')[0].focus();
  </script>