<html>
<head>
<title>Black Box Bank</title>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
</head>

<body style="background:black;">
<form method="post" action="transfer.php">
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
    //  echo "ID";
    //  echo $_SESSION['new_session'];
    $ID = $_SESSION['new_session'];
    
	$db_handle = mysql_pconnect($hostname, $username, $password);
	$db_found = mysql_select_db($dbname, $db_handle);
    
    echo '<br/>';
    echo '<h1> Do a Transfer </h1>';
    echo '<br/>';
    echo '<br/>';
    echo '<label for="xfer_amt"> Transfer Amount </>';
    echo '<br/>';
    echo "<input type=text name=xfer_amt>";
    echo '<br/>';
    echo '<br/>';
    echo '<br/>';


	if ($db_found) {
        $SQL = "SELECT accountnum, balance FROM $accttable WHERE session_id = '$ID'";
        $accts = mysql_query($SQL);
        if (!$accts) {
            trigger_error('Invalid query: ' . mysql_error()." in ".$query);
        }
        $num_acct = mysql_num_rows($accts) or die(mysql_error());
        
        if (!isset($_POST['submit'])) {
        while ($row = mysql_fetch_array($accts))
        {
            $account_array[] = "account #:  ".$row['accountnum']."        balance:  $".$row['balance'];
            $accnum_array[] = $row['accountnum'];
            $bal_array[] = $row['balance'];
            
       //     echo "account #:  ".$row['accountnum']."        balance:  $".$row['balance'];
        //    $new_array[$row['accountnum']]['accountnum'] = $row['accountnum'];
            
        }

        
        echo '<label for="from_acct"> From Account </>';
        echo "<br/>";
        echo '<select name="from_acct" id="from_acct">';
        echo "<option value=''>Select the From Account</option>";
        for ($i = 0; $i < $num_acct; $i++)
        {
            $both = $accnum_array[$i].":".$bal_array[$i];
            echo "<option value='" . $both . "'>" . $account_array[$i] . "</option>";
        }
        echo "</select>";


        echo "<br/>";
        echo "<br/>";
        
        echo '<label for="to_acct"> To Account </>';
        echo "<br/>";
        echo '<select name="to_acct" id="to_acct">';
        echo "<option value=''>Select the To Account</option>";

        
        for ($j = 0; $j < $num_acct; $j++)
        {
            $both = $accnum_array[$j].":".$bal_array[$j];
            echo "<option value='" . $both . "'>" . $account_array[$j] . "</option>";
        }
        
        
        echo "</select>";
        
        } else {
            $fromAcctNum = $_POST[from_acct];
            $arrF = split(':', $fromAcctNum);
            $curFtext = $arrF[0];
            $curFbalance = $arrF[1];
 
            $toAcctNum = $_POST[to_acct];
            $arrT = split(':', $toAcctNum);
            $curTtext = $arrT[0];
            $curTbalance = $arrT[1];

            $xfer = $_POST[xfer_amt];

            if($xfer > $curFbalance){
                echo "Error:  Insufficient funds";
            } else {
                $newFbalance = $curFbalance - $xfer;
                $newTbalance = $curTbalance + $xfer;
                
                $SQLUPDF = "UPDATE $accttable SET BALANCE = $newFbalance WHERE accountnum = '$curFtext' AND SESSION_ID = '$ID'";
                $updateF = mysql_query($SQLUPDF);
                if (!$updateF) {
                    trigger_error('Invalid query: ' . mysql_error()." in ".$query);
                }
                $SQLUPDT = "UPDATE $accttable SET BALANCE = $newTbalance WHERE accountnum = '$curTtext' AND SESSION_ID = '$ID'";
                $updateT = mysql_query($SQLUPDT);
                if (!$updateT) {
                    trigger_error('Invalid query: ' . mysql_error()." in ".$query);
                }
                echo "$";
                echo "$xfer transferred from account $curFtext to account $curTtext";
                echo "<br/>";
            }

        }
    }
    
    ?>

<br/>
<br/>

<input type="submit" name="submit" value="Transfer funds">

</form>

 </body>
</html>

