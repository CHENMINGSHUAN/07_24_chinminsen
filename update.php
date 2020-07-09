<?php

// 送信データのチェック
// var_dump($_POST);
// exit();

// 関数ファイルの読み込み
include('functions.php');
session_start();
check_session_id();
$pdo = connect_to_db();
// 送信データ受け取り
$id = $_POST["id"];
$username = $_POST["username"];
$name = $_POST["name"];
$email =$_POST["email"];




// データの追加
$sql =
    "UPDATE member SET 
username=:username,name=:name,email=:email,updated_at=sysdate() WHERE id=:id";

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':username', $username, PDO::PARAM_STR);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);

$status = $stmt->execute();

// セッションデータの破棄
// $_SESSION = array();
// $_SESSION["username"] = $username;
// $_SESSION["name"] = $name;
// $_SESSION["email"] = $email;
// session_destroy();

// データ登録処理後
if ($status == false) {
    // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
    $error = $stmt->errorInfo();
    exit('sqlError:' . $error[2]);
} else {
    // 正常にSQLが実行された場合は以下表示
    echo "正常に変更完了しました。";
    echo "<a href='member_read.php'>Memberpage</a>";
}

// // DB接続
// $pdo = connect_to_db();

// // UPDATE文を作成&実行
// $sql = "UPDATE member SET username=:username, name=:name, email=:email,
//  updated_at=sysdate() WHERE id=:id";

// $stmt = $pdo->prepare($sql);
// $stmt->bindValue(':id', $id, PDO::PARAM_INT);
// $stmt->bindValue(':username', $username, PDO::PARAM_STR);
// $stmt->bindValue(':name', $name, PDO::PARAM_STR);
// $stmt->bindValue(':email', $email, PDO::PARAM_STR);
// $status = $stmt->execute();



// var_dump($status);
// exit();
// // データ登録処理後
// if ($status == false) {
//     // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
//     $error = $stmt->errorInfo();
//     echo json_encode(["error_msg" => "{$error[2]}"]);
//     exit();
// } else {
//     // 正常にSQLが実行された場合は一覧ページファイルに移動し，一覧ページの処理を実行する
//     header("Location:member_read.php");
// }
