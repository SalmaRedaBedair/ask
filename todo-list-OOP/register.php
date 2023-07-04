<?php
require_once('submit.php');
?>
<!DOCTYPE html>
<html>

<head>
  <title>My Page</title>
  <style>
    label{
      margin-top: 5px;
    }
    body {
      background-color: #f5f5f5;
      margin: 0;
      padding: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }

    form {
      background-color: #f9e8e8;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0px 0px 10px #9b4d6f;
      width: 400px;
      margin: 0 auto;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
      height: 25px;
      display: block;
      width: 100%;
      border-radius: 5px;
      border: none;
      box-shadow: 0px 0px 5px #9b4d6f;
      font-size: 16px;
      color: #9b4d6f;
    }

    input[type="submit"] {
      background-color: #9b4d6f;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #7c3a53;
    }

    .error-text {
      color: #ff0000;
      font-size: 12px;
      margin-bottom: 10px;
      display: block;
    }
  </style>
</head>

<body>
  <div class="container">
    <form method="post" action="">
      <h2>Register</h2>
      <label for="name">Name:</label>
      <input type="text" id="name" name="name">
      <?php
      message_underFields('name');
      ?>
      <label for="user_name">user_name:</label>
      <input type="text" id="user_name" name="user_name">
      <?php
      message_underFields('user_name');
      ?>
      <label for="password">Password:</label>
      <input type="password" id="password" name="password">
      <?php
      message_underFields('password');
      ?>
      <input type="submit" value="Register" name="submit">
    </form>
    <p>Already have an account? <a href="login.php">Login here</a></p>
  </div>
</body>

</html>
<?php
if (isset($_POST['submit'])) {
  submit($_POST, 'user', 'add');
}
?>