<?php 
function escape($string) {
  global $connection;
  return mysqli_real_escape_string($connection, trim($string));
}

function ifExists($item){
  global $connection;
  return $item != "" && $item != " " && $item != "  " && $item != "undefined" && $item != null ;
}

function getYTVideoId($videoLink){
  global $connection;

  $ytarray=explode("/", $videoLink);
  $ytendstring=end($ytarray);
  $ytendarray=explode("?v=", $ytendstring);
  $ytendstring=end($ytendarray);
  $ytendarray=explode("&", $ytendstring);
  $ytcode=$ytendarray[0];

  return $ytcode;
}

function uploadImage($inputName, $path, $dbClmnName){
  // Call example: uploadImage('image', '../img/', 'post_image');
  global $connection;

  $fileName = $_FILES[$inputName]['name'];
  $fileTmpName = $_FILES[$inputName]['tmp_name'];
  $fileSize = $_FILES[$inputName]['size'];
  $fileError = $_FILES[$inputName]['error'];
  $fileType = $_FILES[$inputName]['type'];
  $fileExt = explode('.', $fileName);
  $fileActualExt = strtolower(end($fileExt));
  $allowed = array('jpeg', 'jpg', 'png');

  if($fileName){
      if(in_array($fileActualExt, $allowed)){
          if($fileError == 0){
              if($fileSize < 5000000){
                  $fileNameNew = uniqid().rand().".".$fileActualExt;
                  $fileDestination = $path.$fileNameNew;
                  move_uploaded_file($fileTmpName, $fileDestination);
                  $GLOBALS[$dbClmnName] = $fileNameNew;
              }else{
                  echo "Your file is too big! ".$fileSize;
              }

          }else{
              echo "There was an error uploading your file";
          }
      }else{
          echo "You cannot upload files of this type";
      }

  }
}

function deleteItem($tableName, $delete_id){
  //Delete an already selected row frm the db
  global $connection;
  if(isset($_SESSION['username'])){
    $query = "DELETE FROM {$tableName} WHERE id = {$delete_id}";
    $delete_query = mysqli_query($connection, $query);
  }
}

function deleteBulk($tableName){
  // Delete selected rows from the db (mostly useful for rows without files)
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

function deleteFile($btnName, $tblName, $clmnName, $idName, $selectedId){
  // Delete a file where you need to provide an id
  global $connection;
  if(isset($_POST[$btnName])){    
    if (array_key_exists($btnName, $_POST)) {
         //delete from db
        $query = "UPDATE {$tblName} SET ";
        $query .= "{$clmnName} = '' ";
        $query .= "WHERE {$idName} = {$selectedId}";
        $update_post = mysqli_query($connection, $query);

        if(!$update_post) {
            die("QUERY FAILED" . mysqli_error($connection));
        }
        //delete actual file
        $filename = $_POST[$btnName];
        if (file_exists($filename)) {
            unlink($filename);
        } else {
            echo 'Could not delete '.$filename.', file does not exist';
        }
    }
  }
}

function deleteFileFromRow($tblName, $clmnName, $selectedId, $path){
  //When you delete an entire row from the db, CALL THIS TO ALSO REMOVE THE FILE
   // Call example: deleteFileFromRow("news", "post_image", $the_post_id, "../img/");
  global $connection;
  $query = "SELECT * FROM {$tblName} WHERE id = {$selectedId}";
  $result = mysqli_query($connection, $query);
  while ($row = mysqli_fetch_assoc($result)) {
      $fileName = $row[$clmnName]; 
      if(ifExists($fileName)){
        if (file_exists($path.$fileName)) {
             unlink($path.$fileName);
        }

      }    
  }
}


?>
