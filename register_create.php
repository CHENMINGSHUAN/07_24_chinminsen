<?php
include('functions.php');

// 送信確認
// var_dump($_POST);
// exit();

// 項目入力のチェック
// 値が存在しないor空で送信されてきた場合はNGにする
// if (
//     !isset($_POST['username']) || $_POST['username'] == '' ||
//     !isset($_POST['name']) || $_POST['name'] == '' ||
//     !isset($_POST['email']) || $_POST['email'] == '' ||
//     !isset($_POST['password']) || $_POST['password'] == '' 
// ) {
//     // 項目が入力されていない場合はここでエラーを出力し，以降の処理を中止する
//     echo json_encode(["error_msg" => "no input"]);
//     exit();
// }

// 受け取ったデータを変数に入れる
$username = $_POST['username'];
$name = $_POST['name'];
$email = $_POST['email'];
// $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$password = $_POST['password'];
$assertpassword =$_POST['assertpassword'];


if (!ctype_alnum($username)) { // 判斷是否為英文數字
die('只能是英文數字<br>' . '<a href="./register_input.php">回到上層重新登入</a>');
}else if ($password !== $assertpassword) {
    die('兩次輸入的密碼不同<br>' . '<a href="./register_input.php">回到上層繼續註冊</a>');
} else if (empty($username) || empty($name) || empty($email) || empty($password) || empty($assertpassword)) {
    die('請檢查資料');}


// DB接続の設定
$pdo = connect_to_db();
   

// ユーザ存在有無確認
$sql = 'SELECT COUNT(*) FROM member WHERE username=:username';
   
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':username', $username, PDO::PARAM_STR);
$status = $stmt->execute();

    
if ($status == false) {
    // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
}

if ($stmt->fetchColumn() > 0) {
    // user_idが1件以上該当した場合はエラーを表示して元のページに戻る
    // $count = $stmt->fetchColumn();
    echo "<p>すでに登録されているユーザです．</p>";
    echo '<a href="register_input.php">login</a>';
    exit();
}


// `created_at`と`updated_at`には実行時の`sysdate()`関数を用いて実行時の日時を入力する
$sql = 'INSERT INTO member(id,username, name, email,password,assertpassword,is_admin, is_deleted, created_at, updated_at) VALUES(NULL,:username, :name, :email,:password,0, 0, 0, sysdate(), sysdate())';

// SQL準備&実行
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':username', $username, PDO::PARAM_STR);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->bindValue(':password', $password, PDO::PARAM_STR);
// $stmt->bindValue(':assertpassword', $assertpassword, PDO::PARAM_STR);
$status = $stmt->execute();

// データ登録処理後
if ($status == false) {
    // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    // 正常にSQLが実行された場合は入力ページファイルに移動し，入力ページの処理を実行する
    header("Location:transform.php");
    exit();
}


