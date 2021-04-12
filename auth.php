<?php
include "bootstrap/initialization.php";
# checking if form is submitted
$home_url = site_url();

if ($_SERVER['REQUEST_METHOD']=="POST") {
    $action = $_GET['action'];
    $params = $_POST;
    if ($action =='register') {
        $result = register($params);
        if (!$result) {
            message("Error: something went wrong");
        }else{
          echo "Registration was SuccessFull <br> <a href='$home_url'>Navigate to homePage</a>";
        }
    } elseif ($action == 'login') {
        $result = login($params['email'], $params['password']);
        if (!$result) {
            message("Error: Wrong Password or Email");
        }else{
            echo "<a href='$home_url'>Navigate to homePage</a>";
        }
    }
}


include "./views/auth.php";
