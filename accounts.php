<?PHP
    //==========================================
	//	CONNECT TO THE LOCAL DATABASE
	//==========================================
	//$user_name = "root";
	//$pass_word = "";
	//$database = "login";
	//$server = "127.0.0.1";
    
	//These variable values need to be changed by you before deploying
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
// print_r($ID);
	$db_handle = mysql_pconnect($hostname, $username, $password);
	$db_found = mysql_select_db($dbname, $db_handle);
    

	if ($db_found) {
        $SQL = "SELECT accountnum, balance FROM $accttable WHERE session_id = '$ID'";
        $accts = mysql_query($SQL);
        if (!$accts) {
            trigger_error('Invalid query: ' . mysql_error()." in ".$query);
        }
        $num_acct = mysql_num_rows($accts);
 //       print_r($num_acct);
   //     print_r($SQL);
        echo '<table class="table table-striped table-bordered table-hover">';
        echo "<tr><th>Account #</th><th>Balance</th></tr>";

        while ($row = mysql_fetch_array($accts, MYSQL_ASSOC))
        {
          //  $acctinfo_arr[]=$row['accountnum'];
            //$acctinfo_arr[]=$row['balance'];
            echo "<tr><td>";
            echo $row['accountnum'];
            echo "</td><td>";
            echo "$" . $row['balance'];
            echo "</td>";
        }
        echo "</table>";    

    }
    
    ?>