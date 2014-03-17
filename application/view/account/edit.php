<section class="form--signup">

  <h1>Edit your account details</h1>

  <form action="/account/edit" method="post">

    <div class="row">
      <div class="col m-all t-2 d-4 / label__bottom form__block">
        <input type="text" name="firstname" required value="<?php echo $this->firstName; ?>">
        <label for="firstname">First Name</label>
      </div>
      <div class="col m-all t-2 d-4 / label__bottom form__block">
        <input type="text" name="surname" required value="<?php echo $this->surname; ?>">
        <label for="surname">Surname</label>
      </div>
    </div>

    <div class="row">
      <div class="col m-all t-2 d-4 / label__bottom form__block">

        <input type="text" name="address1" required value="<?php echo $this->address1; ?>">
        <label for="address1">Address Line 1</label>
      </div>
      <div class="col m-all t-2 d-4 / label__bottom form__block">

        <input type="text" name="address2" required value="<?php echo $this->address2; ?>">
        <label for="address2">Address Line 2</label>
      </div>
    </div>

    <div class="form__block label__bottom">
      <input type="text" name="town_city" required value="<?php echo $this->city; ?>">
      <label for="town_city">Town / City</label>
    </div>

    <div class="form__block label__bottom">
      <input type="text" name="county" required value="<?php echo $this->county; ?>">
      <label for="county">County</label>
    </div>

    <div class="form__block label__bottom">
      <input type="text" name="postcode" required value="<?php echo $this->postcode; ?>">
      <label for="postcode">Postcode</label>
    </div>

    <div class="form__block label__bottom">
      <input type="tel" name="phonenumber" required value="<?php echo $this->phone; ?>">
      <label for="phonenumber">Phone Number</label>
    </div>

    <?php
      if(isset($this->message)) {
        echo $this->message;
      }
    ?>

    <button class="btn btn--dark pull-right">Submit</button>

  </form>

</section>