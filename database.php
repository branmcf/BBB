<?php

//Variables for connecting to your database.
//Everyone shares these values.
$hostname = "cse3342smu.db.9430912.hostedresource.com";
$username = "cse3342smu";
$dbname = "cse3342smu";
$password = "FaPn0!dMn";

//These variable values need to be changed by you before deploying
$usertable = "your_tablename";

//Connecting to your database
mysql_connect($hostname, $username, $password) OR DIE ("Unable to
connect to database! Please try again later.");
mysql_select_db($dbname);

//Fetching all data from your database table.
$query = "SELECT * FROM $usertable";
$result = mysql_query($query);

//loop through all rows in your database and print to screen
if ($result) {
    while($row = mysql_fetch_array($result)) {
        $name = $row["$yourfield"];
        echo "Name $name<br>";
    }
}
?>

//slightly changed one 
<!--<?php

//Variables for connecting to your database.
//Everyone shares these values.
$hostname = "cse3342smu.db.9430912.hostedresource.com";
$username = "cse3342smu";
$dbname = "cse3342smu";
$password = "FaPn0!dMn";

//These variable values need to be changed by you before deploying
$usertable = "bmcfarland49_users";

//Connecting to your database
mysql_connect($hostname, $username, $password) OR DIE ("Unable to
connect to database! Please try again later.");
mysql_select_db($dbname);

//Fetching all data from your database table.
$query = "SELECT * FROM $usertable";
$result = mysql_query($query);

//loop through all rows in your database and print to screen
if ($result) {
    while($row = mysql_fetch_array($result)) {
        $name = $row["$yourfield"];
        echo "Name $name<br>";
    }
}
?> -->