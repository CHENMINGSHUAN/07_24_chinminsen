<?php
// DB接続の設定
// DB名は`gsacf_x00_00`にする

include('functions.php');
session_start();
check_session_id();
$id = $_SESSION["id"];
$pdo = connect_to_db();

$sql = "SELECT * FROM member WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();
// $result = $stmt->fetchAll(PDO::FETCH_ASSOC);  // データの出力用変数（初期値は空文字）を設定
// $output = "";
// $output .= "<a href='edit.php?id={$_SESSION["id"]}'>edit</a>";
if ($status == false) {
    // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    // 正常にSQLが実行された場合は入力ページファイルに移動し，入力ページの処理を実行する
    // fetchAll()関数でSQLで取得したレコードを配列で取得できる
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $output = "";
    // <tr><td>deadline</td><td>todo</td><tr>の形になるようにforeachで順番に$outputへデータを追加
    // `.=`は後ろに文字列を追加する，の意味
    foreach ($result as $record) {
        $output .= "<div>{$record["username"]}</div>";
        $output .= "<div>{$record["name"]}</div>";
        $output .= "<div>{$record["email"]}</div>";
    }
    // $valueの参照を解除する．解除しないと，再度foreachした場合に最初からループしない
    // 今回は以降foreachしないので影響なし
    unset($value);
}



?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
        .con {
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
        <p>Change your Information.</p>

        <!-- <div>Username:<?php echo $_SESSION['username'] ?> </div>
        <div>Name:<?php echo $_SESSION['name'] ?></div>
        <div>Email:<?php echo $_SESSION['email'] ?></div> -->
        <?= $output ?>
        <a href="edit.php">Edit</a>
        <div>

            <a href="memberhomepage.php">Homepage</a>
        </div>
    </div>
</body>

</html>