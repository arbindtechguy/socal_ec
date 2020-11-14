<?php include 'includes/header.php' ?>
<?php echo isset($title) ? $title : ''; ?>

<link rel="stylesheet" href="assets/css/form.css" type="text/css">
<div class="body-content">
  <div class="module">
    <h1>Create an account</h1>
    <form class="form" action="/createuser" method="post" enctype="multipart/form-data" autocomplete="off">
      <div class="alert alert-error"></div>
      Firstname:
      <input type="text" placeholder="First name" name="firstname" required />
      Surname:
      <input type="text" placeholder="Surname" name="surname"/>
      Email:
      <input type="email" placeholder="Email" name="email" required />
      password:
      <input type="password" placeholder="Password" name="password" autocomplete="new-password" required />
      confirm password:
        <input type="password" placeholder="Confirm Password" name="confirmpassword" autocomplete="new-password" required />
          <input type="radio" name="gender" value="male" checked> Male
          <input type="radio" name="gender" value="female"> Female
          <input type="radio" name="gender" value="other"> Prefer not to say <br>
      <div class="avatar"><label>Select your avatar: </label><input type="file" name="avatar" accept="image/*"  /></div>
      <input type="submit" value="Register" name="register" class="btn btn-block btn-primary" />
    </form>
  </div>
</div>

<h5 class="text-center p-3">Already hava an account <a href="/register">click here</a> for Login</h5>
<?php include 'includes/footer.php' ?>
