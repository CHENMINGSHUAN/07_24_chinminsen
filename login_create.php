<?php

// var_dump($_POST);
// exit();
session_start();
include('functions.php');
$pdo = connect_to_db();

$username = $_POST['username'];
$password = $_POST['password'];


    $sql = "SELECT * FROM member WHERE username = :username AND password = :password" ;
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':username', $username, PDO::PARAM_STR);
    $stmt->bindValue(':password', $password, PDO::PARAM_STR);
    $status = $stmt->execute();

if ($status == false) {
    $error = $stmt->errorInfo();
    exit("QueryError:" . $error[2]);
}

// $error_message = "";
    $val = $stmt->fetch();
    //     var_dump($row);
    // exit();
//     if (!$val) {
//         echo "<p>ログイン情報に誤りがあります．</p>";
//         echo '<a href="transform.php">login</a>';
//         exit();
//     } else {
//     $_SESSION = array();
//     $_SESSION['session_id'] = session_id();      
//     $_SESSION['username'] = $val['username'];
//     $_SESSION['name'] = $val['name'];
//     $_SESSION['email'] = $val['email'];
//     $_SESSION['password'] = $val['password'];
//     $_SESSION['is_admin'] = $val["is_admin"];
//     header("Location:transform.php");

//     exit();

// }

if ($username == "muro331" && $password == "mush3131") {
    $_SESSION["session_id"] = session_id();
    $_SESSION["username"] = $val['username'];
    //  $_SESSION["is_admin"]="1";
    // 認証オケの時
    header("Location:masterpage.php");
} else if ($val['id'] != "") {
   
    $_SESSION["session_id"] = session_id();
    $_SESSION['username'] = $val['username'];
    $_SESSION["name"] = $val['name'];
    $_SESSION['email'] = $val['email'];
    $_SESSION["id"] = $val['id'];
//    $_SESSION["is_admin"] = $val['is_admin'];
    // $_SESSION["is_admin"] = "2";


    // 認証オケの時
    header("Location:memberhomepage.php");
} else {
    // 該当idがなかった場合
    echo "<p>ログイン情報に誤りがあります．</p>";
    header("Location:transform.php");

    // echo $error_message = "*ID、もしくはパスワードが間違っています。<br>もう一度入力して下さい。";
    exit();
}

?>