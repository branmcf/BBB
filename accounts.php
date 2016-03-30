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
    
    
	if ($db_found) {
        $SQL = "SELECT accountnum, balance FROM $accttable WHERE session_id = '$ID'";
        $accts = mysql_query($SQL);
        if (!$accts) {
            trigger_error('Invalid query: ' . mysql_error()." in ".$query);
        }
        $num_acct = mysql_num_rows($accts);
        
        echo '<table class="table table-striped table-bordered table-hover">';
        echo "<tr><th>Account #</th><th>Balance</th></tr>";

        while ($row = mysql_fetch_array($accts, MYSQL_ASSOC))
        {
          //  $acctinfo_arr[]=$row['accountnum'];
            //$acctinfo_arr[]=$row['balance'];
            echo "<tr><td>";
            echo $row['accountnum'];
            echo "</td><td>";
            echo $row['balance'];
            echo "</td>";
        }
        echo "</table>";    

    }
    
    ?>
<html>
 <head>
  <title>Black Box Bank</title>
  <link rel="stylesheet" href="style.css" type="text/css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js">
 </head>

 <body style="background: black;">

<form action="deposit.php" method="POST">
<button> Deposit </button>
</form>

<form action="withdraw.php" method="POST">
<button> Withdraw </button>
</form>

<form action="transfer.php" method="POST">
<button> Transfer </button>
<!-- <button type="button" data-toggle="modal" data-target="#transferModal"> Transfer </button>  -->
</form>


    <!-- Bootstrap Core JavaScript -->
  <script src="/bootstrap.min.js"></script>

 </body>

</html>

<?php
    if(isset($_GET['deposit'])) {
        depositFunc();
    }
    if(isset($_GET['withdraw'])) {
        withdrawFunc();
    }
    if(isset($_GET['transfer'])) {
        transferFunc();
    }

    function depositFunc(){
        echo "Button deposit Clicked";
    }
    function withdrawFunc(){
        echo "Button withdraw clicked";
    }
    function transferFunc(){
        echo "Button transfer clicked";
    }

    ?>