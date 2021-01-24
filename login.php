<script>
function login () {
  // APPEND FORM DATA
  var data = new FormData();
  data.append('req', 'in');
  data.append('email', document.getElementById("login-email").value);
  data.append('password', document.getElementById("login-password").value);

  // INIT AJAX
  var xhr = new XMLHttpRequest();
  xhr.open('POST', "ajax-login.php", true);

  // WHEN THE PROCESS IS COMPLETE
  xhr.onload = function () {
    if (this.response=="OK") {
      window.location.href = "index.php";
    } else {
      alert("Invalid email/password");
    }
  };

  // SEND
  xhr.send(data);
  return false;
}

function logout () {
  // APPEND FORM DATA
  var data = new FormData();
  data.append('req', 'out');

  // INIT AJAX
  var xhr = new XMLHttpRequest();
  xhr.open('POST', "ajax-login.php", true);

  // WHEN THE PROCESS IS COMPLETE
  xhr.onload = function () {
    if (this.response=="OK") {
      window.location.href = "login.php";
    } else {
      alert("Error signing out");
    }
  };

  // SEND
  xhr.send(data);
}
</script>
<?php
// Init + Start session
error_reporting(E_ALL & ~E_NOTICE);
session_start();

// Redirect users to the main page if already signed in
if (is_array($_SESSION['user'])) {
  header("Location: index.php");
  die();
}
?>
<!DOCTYPE html>
<html>
  <head>
    <style>html, body, input {
  font-family: arial;
}
#login-form {
  padding: 20px;
  background: #f2f2f2;
  max-width: 320px;
  margin: 0 auto;
}
#login-form h1 {
  font-size: 1.5em;
  margin: 0;
  color: #9b9b8d;
}
#login-form label, #login-form input {
  display: block;
  margin-top: 10px;
  width: 100%;
}
#login-form input[type=email], #login-form input[type=password] {
  padding: 5px;
  font-size: 1em;
  box-sizing: border-box;
}
#login-form input[type=submit] {
  background: #ad4343;
  color: #fff;
  font-size: 1em;
  padding: 10px 0;
  border: 0;
}</style>
    <title>
      Login Page Example
    </title>
    <link href="login.css" rel="stylesheet">
    <script src="login.js"></script>
  </head>
  <body>
    <form id="login-form" onsubmit="return login();">
      <h1>
        PLEASE SIGN IN
      </h1>
      <label for="login_email">Email</label>
      <input type="email" id="login-email" required value="john@doe.com"/>
      <label for="login_password">Password</label>
      <input type="password" id="login-password" required value="123456"/>
      <input type="submit" value="Sign In"/>
    </form>
  </body>
</html>
