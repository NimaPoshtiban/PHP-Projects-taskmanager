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
        } else {
            redirect(site_url());
        }
    } elseif ($action == 'login') {
        $result = login($params['email'], $params['password']);
        if (!$result) {
            message("Error: Wrong Password or Email");
        } else {
            redirect(site_url());
        }
    }
}


include "./views/auth.php";
