<?PHP
     
    session_start();
    if(isset($_SESSION['pr_key'])){
            echo $private_id;
            //         unset($_SESSION['account_info']);
    }

    if(isset($_SESSION['account_info'])){
        foreach ($_SESSION['account_info'] as $arr){
            echo $arr;
            unset($_SESSION['account_info']);
        }
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

 <div class="container-fluid" id="divDaddy">
	<?php echo '<p>Welcome, </p>' ?>

	
	<button> Deposit </button> <button> Withdraw </button> <button> Transfer </button>
	<br>
	<h1> Savings Account </h1>
	<button> Deposit </button> <button> Withdraw </button>
	<br>
	<button type="button" data-toggle="modal" data-target="#transferModal"> Transfer </button>
</div>

    <!-- Bootstrap Core JavaScript -->
    <script src="/bootstrap.min.js"></script>

 </body>

</html>