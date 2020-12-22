<?php
  
  $server = 'localhost';
  $username = 'fdipolan_ceedigi';
  $password = 'WarsawP2';
  $dbname = 'fdipolan_cee_digital_services_db';  

  $connection = new mysqli($server, $username, $password, $dbname);

if ($connection-> connect_errno) {
  echo "Failed to connect to MySQL: " . $connection -> connect_error;
  exit();
}
?>