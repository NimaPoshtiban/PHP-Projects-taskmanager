<?php
# limiting user direct access to the file
defined('BASE_PATH') or die("Permission Denied!");



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
    $statement->execute([":name"=>"$folderName","user_id"=>$currentUserId]);
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
function deleteTask(string $task_id)
{
    global $pdo;
    $sql = "DELETE FROM taskmanager.tasks WHERE id = $task_id";
    $statement = $pdo->prepare($sql);
    $statement->execute();
    return $statement->rowCount();
}
function addTask(string $taskName, $folderId)
{
    global $pdo;
    $currentUserId = getCurrentUserId();
    $sql = "INSERT INTO taskmanager.tasks (title,user_id,folder_id) VALUES (:title,:user_id,:folder_id)";
    $statement=$pdo->prepare($sql);
    $statement->execute([":title"=>"$taskName",":user_id"=>$currentUserId,":folder_id"=>$folderId]);
    return $statement->rowCount();
}

function getTasks():array
{
    global $pdo;
    $folder = $_GET['folder_id'] ?? null;
    $folderCondition = '';
    if (isset($folder) and is_numeric($folder)) {
        $folderCondition = "AND folder_id = $folder";
    }
    $currentUserId = getCurrentUserId();
    $sql = "SELECT * FROM taskmanager.tasks WHERE user_id = $currentUserId $folderCondition";
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $records = $statement->fetchAll(PDO::FETCH_OBJ);
    return $records;
}
/**
 * toggle checkbox 
 *
 * @param string $taskId
 * @return void
 */
function doneSwitch(string $taskId){
    global $pdo;
    $currentUserId = getCurrentUserId();
    $sql = "UPDATE taskmanager.tasks SET is_done = 1 - is_done  WHERE user_id = $currentUserId AND Id = $taskId";
    $statement = $pdo->prepare($sql);
    $statement->execute();
}