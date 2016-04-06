<?php
    $usertable = "bmcfarland49_users";
    $accttable = "bmcfarland49_accounts";
    $hostname = "cse3342smu.db.9430912.hostedresource.com";
    $username = "cse3342smu";
    $dbname = "cse3342smu";
    $password = "FaPn0!dMn";
    
        session_name('BlackBoxBank');
      session_start();
    //   echo "ID";
    // echo $_SESSION['new_session'];
    $ID = $_SESSION['new_session'];
    $db_handle = mysql_pconnect($hostname, $username, $password);
    $db_found = mysql_select_db($dbname, $db_handle);
    
    
    if ($db_found) {
        
        $SQL_upd = "UPDATE $accttable SET SESSION_ID = NULL WHERE SESSION_ID = '$ID'";
        // echo $SQL_upd;
        $upd = mysql_query($SQL_upd);
        if (!$upd) {
            trigger_error('Invalid query: ' . mysql_error()." in ".$query);
        }
        //    session_destroy();
        session_unset();
        session_write_close();
     
        echo 'You have successfully logged out.';
        echo '<br/>';
        echo '<br/>';
        echo '<br/>';
        
        //  session_destroy();
        //   header ("Location: index.php");
    }
    
    //   echo '<p>logout page</p>';
    ?>

<html>
 <head>
  <title>Black Box Bank</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
 </head>

 <body>
 <a href="index.php" class="login_link">home</a>
 <a href="login.php" class="login_link">login</a>
 <a href="accounts.php" class="login_link">accounts</a>
 <a href="transfer.php" class="login_link">transfer</a>
 <a href="deposit.php" class="login_link">deposit</a>
 <a href="logout.php" class="login_link">logout</a>

 </body>
</html>