<html>
<head>
<title>Black Box Bank</title>
<link rel="stylesheet" href="./style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
</head>

<body>
<form method="post" action="withdraw.php"
<?PHP
    function makeDeposit() {
        
    }
    function changeValue() {
        
        $arr = split(':', $acType);
        $curtext = $arr[0];
        $curbalance = $arr[1];
        
    }
    
    
    //==========================================
	//	CONNECT TO THE LOCAL DATABASE
	//==========================================
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
    $curtext=" nope ";
    
    session_name('Private');
    session_start();
    
    $ID = $_SESSION['new_session'];
    
	$db_handle = mysql_pconnect($hostname, $username, $password);
	$db_found = mysql_select_db($dbname, $db_handle);
    
    echo '<br/>';
    echo '<h1> Make a Withdrawl </h1>';
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
                $value = $row['balance'];
                $text = $row['accountnum'];
                $both = $text.":".$value;
                
                echo "<option value='" . $both . "'>" . $row['accountnum'] . "</option>";
            }
            echo "</select>";
            echo "<br/>";
            echo "<br/>";
            
            echo "Amount to withdraw";
            echo "<br/>";
            echo "<input type=text name=deposit_amt value=$depamt>";
            echo "<br/>";
            echo "<br/>";
            
            
        } else {
            $acType = $_POST[d_acct];
            $arr = split(':', $acType);
            $curtext = $arr[0];
            $curbalance = $arr[1];
            
            $withdraw = $_POST[deposit_amt];
            
            if($withdraw > $curbalance){
                echo "Error:  Insufficient funds";
            } else {
                $newbalance = $curbalance - $withdraw;
        

            $SQLUPD = "UPDATE $accttable SET BALANCE = $newbalance WHERE accountnum = '$curtext' AND SESSION_ID = '$ID'";
            $update = mysql_query($SQLUPD);
            if (!$update) {
                trigger_error('Invalid query: ' . mysql_error()." in ".$query);
            }
            }
            
            echo "$";
            echo "$withdraw withdrawn from account $curtext";
            echo "<br/>";
            echo "New Balance";
            echo "<br/>";
            echo "<input type=text name=new_balance_amt value=$newbalance>";
            
        }
    }
    ?>
<br/>
<br/>

<input type="submit" name="submit" value="Withdraw">

</form>
</body>
</html>

