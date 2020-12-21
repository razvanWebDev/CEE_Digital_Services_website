<?php
  // $server = 'localhost';
  // $username = 'root';
  // $password = '';
  // $dbname = 'cee_digital_services_db';  
  
  $server = '';
  $username = '';
  $password = '';
  $dbname = '';  


  $connection = mysqli_connect($server, $username, $password, $dbname);

  if(!$connection) {
      die("Data-base connection failed");
  }
?>