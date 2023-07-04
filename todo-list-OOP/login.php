<?php
session_start();
$conn=require_once('config/connection.php');
?>
<!DOCTYPE html>
<html>
<head>
 <title>My Page</title>
 <style>
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
  input[type="text"], input[type="email"], input[type="password"] {
    height: 25px;
    display: block;
    width: 100%;
    margin-bottom: 20px;
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
 </style>
</head>
<body>
 <div class="container">
  <form action='' method="post">
   <h2>Login</h2>
   <label for="user_name">user_name:</label>
   <input type="text" id="user_name" name="user_name" required>
   <label for="password">Password:</label>
   <input type="password" id="password" name="password" required>
   <input type="submit" value="Login" name='submit'>
  </form>
  <p>Don't have an account? <a href="register.php">Register here</a></p>
 </div>
</body>
</html>
<?php
if(isset($_POST['submit'])){
  $user_name=$_POST['user_name'];
  $data=$conn->getData('user', 'id', "user_name='$user_name'")[0];
  // print_r($data);
  $_SESSION['id']=$data['id'];
  if(isset($_SESSION['id']))
  header('location:'.SITEURL);
}
?>