<?php

// var_dump($_POST);
// exit();
session_start();
include('functions.php');
$pdo = connect_to_db();

$username = $_POST['username'];
$password = $_POST['password'];

try {
    $sql = "SELECT * FROM member WHERE username = :username AND password = :password";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':username', $username, PDO::PARAM_STR);
    $stmt->bindValue(':password', $password, PDO::PARAM_STR);
    $status = $stmt->execute();
    $row =$stmt->fetch(PDO::FETCH_ASSOC);
//     var_dump($row);
// exit();
    if($row["id"] !=""){

    $_SESSION["chk_ssid"] = session_id();      
    $_SESSION['username'] = $row['username'];
    $_SESSION['name'] = $row['name'];
    $_SESSION['email'] = $row['email'];
    $_SESSION['password'] = $row['password'];
        
        header("Location:transform.php");
        
        exit();
    }else{
        echo "エラー";
    }
}catch(PDOException $e){
    echo json_encode(["db error" => "{$e->getMessage()}"]);
return false;
}



?>