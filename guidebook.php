<?php
session_start();
include("functions.php");
check_session_id();

// ユーザ名取得
$user_id = $_SESSION["id"];

// DB接続
$pdo = connect_to_db();


// データ取得SQL作成
$sql = "SELECT * FROM guidebook LEFT OUTER JOIN (SELECT book_id,COUNT(id) AS cnt FROM like_table GROUP BY book_id) AS likes
ON guidebook.id = likes.book_id";

// SQL準備&実行
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

// データ登録処理後
if ($status == false) {
    // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    // 正常にSQLが実行された場合は入力ページファイルに移動し，入力ページの処理を実行する
    // fetchAll()関数でSQLで取得したレコードを配列で取得できる
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC); // データの出力用変数（初期値は空文字）を設定
    // $output = "";
    // foreach ($result as $record) {
    //     $output .= "<td><a href='like_create.php?user_id={$user_id}&todo_id={$record["id"]}'>like{$record["cnt"]}</a></td>";
    // }
}



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
            width: 600px;
            padding: 10px;
            border-bottom: black 0.5px solid;
        }
    </style>
</head>

<body>

    <h1>The Guidebook</h1>
    <?php foreach ($result as $record) : ?>
        <!-- <a href=""> -->

        <h2><?= $record["title"] ?></h2>
        <p><?= $record["date"] ?></p>
        <p><?= $record["schedule"] ?></p>

      



        <img src="<?= $record['img'] ?>" width="530px" height="300px">
        <div class="box">
            <p class="ellipsis"><?= $record["text"] ?></p>
            <!-- </a> -->


            <div><a href='like_create.php?user_id=<?= $user_id ?>&book_id=<?= $record["id"] ?> '>like<?= $record["cnt"] ?></a></div>
        </div>
    <?php endforeach ?>
    <a href="memberhomepage.php">Homepage</a>
    <a href="logout.php">logout</a>

</body>

</html>