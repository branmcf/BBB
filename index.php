<?php
    function isValid($_SESSION)
    {
      //  $strId = (string) $sessionId;
       $strId = (string) $_SESSION['Private'];
        if ($strId == (string) $sessionId){
            return TRUE;
        } else {
          //  return (bool) preg_match('/^[0-9a-zA-Z,-]{22,40}$/', $strId);
            return FALSE;
        }
        
    }

    session_name('Private');
    session_start();
    //  echo "ID";
    //  echo $_SESSION['new_session'];
    $ID = $_SESSION['new_session'];


    if (!isset($_SESSION['new_session']))
    {
         header ("Location: login.html");
    } else {
        header ("Location: accounts.php");
    }
    ?>
<!DOCTYPE html>
<html lang="en">
 <head>
  <title>Black Box Bank</title>
  <link rel="stylesheet" href="style.css" type="text/css" >
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
  
 </head>

 <body style="background: black;">


 <!--<a href="login.php" class="login_link">login</a>
 <a href="accounts.php" class="login_link">accounts</a>
 <a href="logout.php" class="login_link">logout</a> -->
<h1>Private ID is <?=$id?></h1>
 </body>
</html>
<?php
    // Store it back
   session_name('Private');
    session_id($private_id);
    session_start();
    $_SESSION['pr_key'] = $b;
    session_write_close();
?>