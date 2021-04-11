<?php
# limiting user direct access to the file
defined('BASE_PATH') OR die("Permission Denied!");


function getCurrentUserId()
{
    return 1;
}
# folder functions
/**
 * delete a folder
 *
 * @param string $folder_id
 * @return integer
 */

function deleteFolder(string $folder_id):int
{
    global $pdo;
    $sql = "DELETE FROM taskmanager.folders WHERE id = $folder_id";
    $statement = $pdo->prepare($sql);
    $statement->execute();
    return $statement->rowCount();
}


function addFolder(string $folderName)
{
    global $pdo;
    $currentUserId = getCurrentUserId();
    $sql = "INSERT INTO taskmanager.folders (name,user_id) VALUES (:name,:user_id)";
    $statement = $pdo->prepare($sql);
    $statement->execute(["name"=>"$folderName","user_id"=>"$currentUserId"]);
    return $statement->rowCount();
}



/**
 * fetch all existing folders for the user
 *
 * @return array
 */
function getFolders():array
{
    global $pdo;
    $currentUserId = getCurrentUserId();
    $sql = "SELECT * FROM taskmanager.folders WHERE user_id = $currentUserId";
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $records =  $statement->fetchAll(PDO::FETCH_OBJ);
    return $records;
}

# tasks functions
