


<?php
session_start();
include("functions.php");
check_session_id();

// ユーザ名取得
$user_id = $_SESSION["id"];
$username = $_SESSION["username"];
// DB接続
$pdo = connect_to_db();


?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="../08_24_chinminsen/css/all.css">
    <style>
        .box {
            width: 300px;
            padding: 10px;
            border: black 0.5px solid;
        }

        .ellipsis {
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            white-space: normal;
        }
    </style>

</head>

<body>
    <strong>Welcome,<?= $_SESSION["username"] ?></strong>



    <h1>My Guidebook</h1>
    
    <a href="memberhomepage.php">Homepage</a>
    <a href="logout_create.php">logout</a>

</body>

</html>