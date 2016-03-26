<?php
    function isValid($sessionId)
    {
       // $strId = (string) $sessionId;
        $strId = (string) $sessionId;
        if ($strId !== $sessionId){
            return FALSE;
        } else {
            return TRUE;
        }
        
    }
    $currentID = (string) session_id();
    $result = isValid(currentID);
    //echo '<p>Bank Index</p>';
    if ($result==FALSE) {
        //echo '<p>heading to account</p>';
        header ("Location: accounts.php");
    } else {
        //echo '<p>heading to login</p>';
        header ("Location: login.html");
    }
    print_r($result);

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

 </body>
</html>