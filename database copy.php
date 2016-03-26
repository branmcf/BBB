<?php

    class Db_Functions {
        function DepositFunds(string session_id, int account_id, float amount) {
            $accountID = account_id;
            $SQL = "SELECT ACCOUNT_AMOUNT FROM $account_table WHERE ACCOUNT_ID = $accountID";
            $result = mysql_query($SQL) or die('A Db Error Occured: ' . mysql_error() );
            $new_balance = float($result) + amount;
            $SQL = "UPDATE ACCOUNT_AMOUNT SET ACCOUNT_AMOUNT = $new_balance WHERE ACCOUNT_ID = $accountID";
            $result = mysql_query($SQL) or die('A Db Error Occured: ' . mysql_error() );
            $SQL = "SELECT ACCOUNT_AMOUNT FROM $account_table WHERE ACCOUNT_ID = $accountID";
            $result = mysql_query($SQL) or die('A Db Error Occured: ' . mysql_error() );
            return float($result);
            
        }
        
        function WithdrawFunds(string session_id, int account_id, float amount){
            $SQL = "SELECT ACCOUNT_AMOUNT FROM $account_table WHERE ACCOUNT_ID = $accountID";
            $result = mysql_query($SQL) or die('A Db Error Occured: ' . mysql_error() );
            $new_balance = float($result) - amount;
            if(float($new_balance) < 0)
            {
                return $new_balance;
            } else {
            $SQL = "UPDATE ACCOUNT_AMOUNT SET ACCOUNT_AMOUNT = $new_balance WHERE ACCOUNT_ID = $accountID";
            $result = mysql_query($SQL) or die('A Db Error Occured: ' . mysql_error() );

            }
            

            
        }
        
        function TransferFunds(string session_id, int from_account, int to_account, float amount){
            
        }
        function AccountBalance(string session_id, int account_id){
            $SQL = "SELECT ACCOUNT_AMOUNT FROM $account_table WHERE ACCOUNT_ID = $accountID";
            return;
        }
        
                
        
    }
?> -->