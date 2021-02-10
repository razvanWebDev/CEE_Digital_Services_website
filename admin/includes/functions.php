<?php 
function escape($string) {
  global $connection;
  return mysqli_real_escape_string($connection, trim($string));
}

function ifExists($item){
  global $connection;
  return $item != "" && $item != " " && $item != "  ";
}

function deleteItem($tableName){
  global $connection;
  if(isset($_GET['delete'])) {
      if(isset($_SESSION['username'])){
        $delete_id = mysqli_real_escape_string($connection, $_GET['delete']);
        $query = "DELETE FROM {$tableName} WHERE id = {$delete_id}";
        $delete_query = mysqli_query($connection, $query);
    }
  }
}

function deleteBulk($tableName){
  global $connection;
  if(isset($_POST['checkBoxArray'])){
    if(isset($_SESSION['username'])){
        foreach($_POST['checkBoxArray'] as $delete_id){
            $query = "DELETE FROM {$tableName} WHERE id = {$delete_id}";
            $delete_query = mysqli_query($connection, $query);
        }
    }
 }
}

?>
