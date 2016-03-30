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
    
    session_name('Private');
    session_start();
    //  echo "ID";
    //  echo $_SESSION['new_session'];
    $ID = $_SESSION['new_session'];
    
	$db_handle = mysql_pconnect($hostname, $username, $password);
	$db_found = mysql_select_db($dbname, $db_handle);
    
    echo '<br/>';
    echo '<h1> Do a Withdrawal </h1>';
    echo '<br/>';
    echo '<br/>';
   
	if ($db_found) {
        $SQL = "SELECT accountnum, balance FROM $accttable WHERE session_id = '$ID'";
        $accts = mysql_query($SQL);
        if (!$accts) {
            trigger_error('Invalid query: ' . mysql_error()." in ".$query);
        }
        $num_acct = mysql_num_rows($accts);
        
        echo '<select name="w_acct" >';
        echo "<option value=''>Select an Account</option>";
        
        while ($row = mysql_fetch_array($accts, MYSQL_ASSOC))
        {
            echo "<option value='" . $row['balance'] . "'>" . $row['accountnum'] . "</option>";
         }
        echo "</select>";
        echo "<br/>";
        echo "<br/>";
        echo "Amount"; 
        echo "<br/>"; 
        echo "<input type=text name=deposit_amt>";
        echo "<br/>"; 
        echo "Current Balance";
        echo "<br/>";
        echo "<input type=text name=balance_amt >";
        echo "<br/>";
        echo "New Balance";
        echo "<br/>";
        echo "<input type=text name=new_balance_amt >";
        echo "<br/>";
        echo "<br/>";


    }
    
    ?>

<html>
 <head>
  <title>Black Box Bank</title>
  <link rel="stylesheet" href="./style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
 </head>

 <body>
 

 </body>
</html>