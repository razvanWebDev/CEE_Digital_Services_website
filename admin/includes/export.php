<?php session_start(); ?>
<?php include "../../PHP/db.php" ?>

<?php
$sqlQuery = "SELECT * FROM reserve_tickets";
$resultSet = mysqli_query($connection, $sqlQuery) or die("database error:". mysqli_error($connection));
$developersData = array();
while( $developer = mysqli_fetch_assoc($resultSet) ) {
	$developersData[] = $developer;
}	
if(isset($_POST["dataExport"])) {	
	$fileName = "tickets_reservations_".date('d-m-Y') . ".xls";			
    header("Content-Type: application/x-www-form-urlencoded");
    header("Content-Transfer-Encoding: Binary");
    header("Content-Disposition: attachment; filename=\"$fileName\"");	
    header("Pragma: no-cache");
    header("Expires: 0");
	$showColoumn = false;
	if(!empty($developersData)) {
	  foreach($developersData as $developerInfo) {
		if(!$showColoumn) {		 
		  echo implode("\t", array_keys($developerInfo)) . "\n";
		  $showColoumn = true;
		}
		echo implode("\t", array_values($developerInfo)) . "\n";
	  }
	}
	exit;  
}
?>