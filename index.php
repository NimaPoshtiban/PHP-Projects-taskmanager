<?php
include "bootstrap/initialization.php";

if(isset($_GET['logout'])){
    logout();
}


if(!isLoggedIn()){
    // redirect to auth from
    redirect(site_url('auth.php'));
}
# user is LoggedIn
$user = getLoggedInUser();

if (isset($_GET['delete_folder']) && is_numeric($_GET['delete_folder'])) {
    deleteFolder($_GET['delete_folder']);
}


if (isset($_GET['delete_task'])&& is_numeric($_GET['delete_task'])) {
    $deletedCount = deleteTask($_GET['delete_task']);
    echo "$deletedCount task successfully deleted";
}
$folders = getFolders();
$tasks = getTasks();

include "./views/template.php";
