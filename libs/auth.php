<?php
# limiting user direct access to the file
defined('BASE_PATH') or die("Permission Denied!");

function isLoggedIn()
{
    return isset($_SESSION['login']) ? true : false;
}

function getLoggedInUser(){
  return $_SESSION['login'] ?? null;
}


function getUserByEmail($email){
  global $pdo;
  $sql = "SELECT * FROM taskmanager.users WHERE email = ?";
  $statement=$pdo->prepare($sql);
  $statement->execute([$email]);
  $records = $statement->fetchAll(PDO::FETCH_OBJ);
  return $records[0] ?? null;
}

function register($userData):bool
{
    global $pdo;
    $sql = "INSERT INTO taskmanager.users (name,email,password) VALUES(:name,:email,:password)";
    $passwordHash = password_hash($userData['password'], PASSWORD_BCRYPT);
    $statement = $pdo->prepare($sql);
    $statement->execute([":name"=>$userData['username'],":email"=>$userData['email'],":password"=>$passwordHash]);
    return $statement->rowCount() ? true : false;
}

function login(string $email,string $password):bool
{
  $user = getUserByEmail($email);
  if(is_null($user)){
    return false;
  }
  # checking password
  if(password_verify($password,$user->password)){
    #login is successful
    $_SESSION['login'] = $user;
    return true;
  }
  return false;
}
var_dump($_SESSION);
