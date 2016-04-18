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
     
        //echo 'You have successfully logged out.';
        header('Location: login.html'); 
        
        //  session_destroy();
        //   header ("Location: index.php");
    }
    
    //   echo '<p>logout page</p>';
    ?>