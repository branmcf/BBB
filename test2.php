<html>
<head>
<title>Black Box Bank</title>
<link rel="stylesheet" href="./style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
</head>

<body>
<form method="post" action="test2.php"
<?PHP
    function makeDeposit() {
        echo "<br/>";
        echo "New Balance";
        echo "<br/>";
        echo "<input type=text name=new_balance_amt >";
        
    }
    function changeValue() {
        echo "changing value";
        echo "<br/>";

        $curbalance = $_POST[d_acct];
    }
    
    
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
    
    $curbalance=0;
    $depamt=0;
    $acType=0;
    
    session_name('Private');
    session_start();
    //  echo "ID";
    //  echo $_SESSION['new_session'];
    $ID = $_SESSION['new_session'];
    
	$db_handle = mysql_pconnect($hostname, $username, $password);
	$db_found = mysql_select_db($dbname, $db_handle);
    
    echo '<br/>';
    echo '<h1> Make a Deposit </h1>';
    echo '<br/>';
    echo '<br/>';
    
	if ($db_found) {
        $SQL = "SELECT accountnum, balance FROM $accttable WHERE session_id = '$ID'";
        $accts = mysql_query($SQL);
        if (!$accts) {
            trigger_error('Invalid query: ' . mysql_error()." in ".$query);
        }
        $num_acct = mysql_num_rows($accts);
        
        if (!isset($_POST['submit'])) {

            echo '<select name="d_acct" id="d_acct" onchange="changeValue()">';
    echo "<option value='' selected='selected' >Select an Account</option>";
    
    while ($row = mysql_fetch_array($accts, MYSQL_ASSOC))
    {
        echo "<option value='" . $row['balance'] . "'>" . $row['accountnum'] . "</option>";
    }
    echo "</select>";
    echo "<br/>";
    echo "<br/>";
  //  echo "Current Balance";
  //  echo "<br/>";
  //  echo "<input type=text name=balance_amt value=$curbalance>";
 //   echo "<br/>";
   // echo "<br/>";
    echo "Amount to deposit";
    echo "<br/>";
    echo "<input type=text name=deposit_amt value=$depamt>";
    echo "<br/>";
    echo "<br/>";
    
    
    } else {
        $acType = $_POST[d_acct];
        $sel = d_acct.options;
        $deposit = $_POST[deposit_amt];
        $balance = $_POST[balance_amt];
        $newbalance = $deposit + $acType;
        
    //    echo "This is the selected item $acType";
        echo "$";
        echo "$deposit deposited to account ";
        echo "<br/>";
   //     echo $acType;
      //  echo $deposit;
        //echo $balance;
    //    echo $newbalance;
        echo "New Balance";
        echo "<br/>";
        echo "<input type=text name=new_balance_amt value=$newbalance>";

    }
    }
    ?>
<br/>
<input type="submit" name="submit" value="Deposit">
</form>



</body>
</html>