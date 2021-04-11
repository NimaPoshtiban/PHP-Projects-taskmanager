<?php
include "bootstrap/initialization.php";
if(isset($_GET['delete_folder']) && is_numeric($_GET['delete_folder'])){
  $deletedCount = deleteFolder($_GET['delete_folder']);
  echo "$deletedCount folders successfully";
}
$folders = getFolders();

include "./views/template.php";
