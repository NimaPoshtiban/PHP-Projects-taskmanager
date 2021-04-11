<?php
# initialization
include "vendor/autoload.php";
include "bootstrap/constants.php";
include "config/config.php";
include "libs/helpers.php";

$dsn = "mysql:{$database_config->database};host={$database_config->host}";

try {
    $pdo = new PDO($dsn, $database_config->username, $database_config->password);
} catch (PDOException $error) {
    diePage("Connection failed: " . $error->getMessage() . PHP_EOL);
}
    

include "libs/tasks.php";
