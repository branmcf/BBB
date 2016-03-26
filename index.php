<!DOCTYPE html>
<html lang="en">
 <head>
  <title>Black Box Bank</title>
  <link rel="stylesheet" href="style.css" type="text/css" >
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js">
 </head>

 <body style="background: black;">

 <!--<a href="login.php" class="login_link">login</a>
 <a href="accounts.php" class="login_link">accounts</a>
 <a href="logout.php" class="login_link">logout</a> -->

 <?php echo '<p>Bank</p>'; ?> 

 <div class="login-page">
  <div class="form">
    <form class="login-form" action="login.php" method="POST">
      <input type="text" name="username" placeholder="username"/>
      <input type="password" name="password" placeholder="password"/>
      <button>login</button>
    </form>
  </div>
</div>
 

 </body>
</html>