<!DOCTYPE php>
 <?php
// Start the session
session_start();

$host = '10.28.49.11:3306';
$db_name = 'phs';
$username = 'phs';
$password = 'D3oQ2b8vwhbD';
try {
     $con = new mysqli($host,$username,$password, $db_name);
}   
catch(Exception $exception){
          echo "Connection error: " . $exception->getMessage();
         }
?>