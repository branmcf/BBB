<?PHP

$uname = "";
$pword = "";
$errorMessage = "";
//==========================================
//	ESCAPE DANGEROUS SQL CHARACTERS
//==========================================
function quote_smart($value, $handle) {

   if (get_magic_quotes_gpc()) {
       $value = stripslashes($value);
   }

   if (!is_numeric($value)) {
       $value = "'" . mysql_real_escape_string($value, $handle) . "'";
   }
   return $value;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	$uname = $_POST['username'];
	$pword = $_POST['password'];

	//print "uname " . $uname;

	$uname = htmlspecialchars($uname);
	$pword = htmlspecialchars($pword);

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

	$db_handle = mysql_pconnect($hostname, $username, $password);
	$db_found = mysql_select_db($dbname, $db_handle);


	if ($db_found) {

		$uname = quote_smart($uname, $db_handle);
		$pword = quote_smart($pword, $db_handle);
        

		$SQL = "SELECT * FROM $usertable WHERE username = $uname AND password = concat(salt,md5($pword))";


	//	$SQL = "SELECT * FROM $usertable WHERE username = $uname AND password = '$pword'";
		//print_r($SQL);
		$result = mysql_query($SQL);
 /*       if (!$result) {
 //           echo "invalid login";
            session_unset();
            header ("Location: index.php");
            exit;
    		//trigger_error('Invalid query: ' . mysql_error()." in ".$query);
    	}
  */
  
	//====================================================
	//	CHECK TO SEE IF THE $result VARIABLE IS TRUE
	//====================================================
		//print_r($num_rows);
		if ($result) {
            $num_rows = mysql_num_rows($result);
			if ($num_rows > 0) {
                session_name('BlackBoxBank');
                 session_start();
                 $private_id = session_id();
                 $b = $_SESSION['pr_key'];
          //      echo "b value: " . $b;
                 $_SESSION['new_session'] = $private_id;
                $_SESSION['ID'] = $private_id;
                 $_SESSION['name'] = 'BlackBoxBank';
                
        //       echo "new session " . $_SESSION['new_session'];
                
          //      print_r($private_id);
                 $b = $_SESSION['pr_key'];
                 
                session_write_close();
       //         echo $private_id;
                
                $SQL_upd = "UPDATE $accttable SET SESSION_ID = '$private_id' WHERE username = $uname";
                $upd = mysql_query($SQL_upd);
                if (!$upd) {
                    trigger_error('Invalid query: ' . mysql_error()." in ".$query);
                }
                session_write_close();
                header ("Location: accounts.php");
    
 			}
			else {
                session_write_close();
                echo "invalid login";
			//	header ("Location: index.php");
                exit;
			}
        } else {
            session_write_close();
         //   session_unset();
            echo "invalid login";

          //  trigger_error('Invalid query: ' . mysql_error()." in ".$query);
        //    header ("Location: index.php");
        }


	mysql_close($db_handle);

	}

	else {
		$errorMessage = "Error logging on";
	}

}

?>

<html>
 <head>
  <title>Black Box Bank</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
 </head>

 <body style="background: white">
 </body>
</html>

<?php
    // Store it back
    if ($result) {
      session_name('BlackBoxBank');
      $_SESSION['name'] = 'BlackBoxBank';
      session_id($private_id);
      session_start();
      $_SESSION['pr_key'] = $b;
      session_write_close();
    }
    
?>
 
