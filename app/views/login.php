<?php include 'includes/header.php' ?>
<?php echo isset($title) ? $title : ''; ?>
<link rel="stylesheet" href="assets/css/form.css" type="text/css">
<div class="module">
<h1>Loigin to your account</h1>
<form action="/login" method="post" autocomplete="on">
    Username<br>
        <input type="text" placeholder="email or phone no.." name= "email" required>
    <br>
        password:<br>
    <input type="password"placeholder="******" name="password" required>
        <br><br>
    <input type="submit" value="Login" name="login" class="btn btn-block btn-primary">
        <br><br><br>
    </form>
</div>

<h5 class="text-center">Don't hava an account <a href="/register">click here</a> for Register</h5>
<?php include 'includes/footer.php' ?>
