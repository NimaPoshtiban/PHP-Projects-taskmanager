<?php
include_once "../bootstrap/initialization.php";

if (!isAjaxRequest()) {
    diePage("Invalid Request!");
}
if (!isset($_POST['action'])) {
    diePage('Invalid Action!');
}

switch ($_POST['action']) {
  case 'addFolder':
    if (!isset($_POST['folderName'])||strlen($_POST['folderName'] < 2)) {
        echo "Filename is too short!";
        die();
    }
   echo addFolder($_POST['folderName']);
    break;
  case 'addTask':
    //
  default:
  diePage('Invalid Action!');
    break;
}

var_dump($_POST);