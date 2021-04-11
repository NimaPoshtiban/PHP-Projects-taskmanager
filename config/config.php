<?php
# limiting user direct access to the file
defined('BASE_PATH') OR die("Permission Denied!");

list($host, $username, $password, $database)=["localhost","root","","taskmanager"];
$database_config = (object)[
  "host"=>$host,
  "username"=>$username,
  "password"=>$password,
  "database"=>$database
];
