<!-- PHPSpreadsheet istalation:
		https://www.youtube.com/watch?v=4ULDJ5LfdwU
 -->

<?php session_start(); ?>
<?php include "../../PHP/db.php" ?>

<?php
include '../../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
if(isset($_POST['dataExport'])){



$sql = "SELECT * FROM reserve_tickets";
$result = $connection->query($sql);
$write_array = array();
$fileName = "excel.xlsx";
$write_array[] = array("id","name","address");

if($result->num_rows > 0) 
{
    while($row = $result->fetch_assoc()) 
    {
        $write_array[] = array($row["company_name"],$row["matchmacking_options"],$row["participant_name"]);
    }
}
$connection->close();
$spreadsheet = new Spreadsheet();
$spreadsheet->setActiveSheetIndex(0);
$spreadsheet->getActiveSheet()->fromArray($write_array,NULL,'A1');

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="'.$fileName.'"');
header('Cache-Control: max-age=0');
header('Cache-Control: max-age=1');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
header('Cache-Control: cache, must-revalidate');
header('Pragma: public');

ob_end_clean();
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
var_dump($writer);
exit();
}
?>