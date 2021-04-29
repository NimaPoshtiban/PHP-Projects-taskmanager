<?php
# limiting user direct access to the file
defined('BASE_PATH') or die("Permission Denied!");

function getCurrentUserId()
{
    return getLoggedInUser()->id ?? 0;
}

function isLoggedIn():bool
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

function logout(){
  unset($_SESSION['login']);
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
    $grav_url = "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $user->email ) ) ) ;
    $user->image = $grav_url;
    $_SESSION['login'] = $user;
    return true;
  }
  return false;
}

