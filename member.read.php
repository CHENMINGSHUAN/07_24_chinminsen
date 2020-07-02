<?php
// DB接続の設定
// DB名は`gsacf_x00_00`にする

include('functions.php');
session_start();
$pdo = connect_to_db();

$sql = "SELECT * FROM member WHERE id=:id";
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);  // データの出力用変数（初期値は空文字）を設定
$output = "";
$output .= "<a href='edit.php?id={$_SESSION["chk_ssid"]}'>edit</a>";



?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
        .con{
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }
    </style>
</head>

<body>
    <div class="con">
        <h1>Setting</h1>
        <p>Chage your Information.</p>

        <div>Username:<?php echo $_SESSION['username'] ?> </div>
        <div>Name:<?php echo $_SESSION['name'] ?></div>
        <div>Email:<?php echo $_SESSION['email'] ?></div>
        <?= $output ?>
        <div>

        <a href="transform.php">Homepage</a>
        </div>
    </div>
</body>

</html>