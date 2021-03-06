<?php
// 送信データのチェック
// var_dump($_GET);
// exit();

// 関数ファイルの読み込み
include('functions.php');
session_start();
check_session_id();
// idの受け取り
$id = $_SESSION["id"];
$username = $_SESSION["username"];
$name = $_SESSION["name"];
$email = $_SESSION["email"];


// DB接続
$pdo = connect_to_db();

// データ取得SQL作成
$sql = 'SELECT * FROM member WHERE id=:id';

// SQL準備&実行
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();


// データ登録処理後
if ($status == false) {
    // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    // 正常にSQLが実行された場合は指定の11レコードを取得
    // fetch()関数でSQLで取得したレコードを取得できる
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>

    </style>
</head>


<body>
    <div class="edit">
        <form action="update.php" method="POST">


            <a href="member_read.php">Go back to the last page</a>
            <div>
                Username: <input type="name" name="username" value="<?= $username ?>">
            </div>
            <div>
                Name: <input type="name" name="name" value="<?=$name ?>">
            </div>
            <div>

                Email: <input type="email" name="email" value="<?= $email ?>">

            </div>
            <div>
                <button>submit</button>
            </div>
            <input type="hidden" name='id' value="<?= $id?>">

        </form>
    </div>
</body>

</html>