<?php


function check_session_id()
{
    if (
        !isset($_SESSION['session_id']) ||
        $_SESSION['session_id'] != session_id()
    ) {
        header('Location:transform.php');
    } else {
        session_regenerate_id(true);
        $_SESSION["session_id"] = session_id();
        
        // $username_header = htmlspecialchars($username, \ENT_QUOTES, 'UTF-8');
        // $link_header = '<a href="logout_create.php">Log out</a>';
    }
}

function insert($sql, $arr = [])
{
    $pdo = connect_to_db();
    $stmt = $pdo->prepare($sql);
    $stmt->execute($arr);
    return $pdo->lastInsertId(); //最終行のIDを取得
}

function connect_to_db()
{
    $dbn = 'mysql:dbname=07_24;charset=utf8;port=3306;host=localhost';
    $user = 'root';
    $pwd = '';

    try {
        return new PDO($dbn, $user, $pwd);
    } catch (PDOException $e) {
        echo json_encode(["db error" => "{$e->getMessage()}"]);
        exit();
    }
}


?>
