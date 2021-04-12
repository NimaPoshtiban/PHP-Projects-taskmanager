<?php
# limiting user direct access to the file
defined('BASE_PATH') OR die("Permission Denied!");

function isLoggedIn(){
  return false;
}
