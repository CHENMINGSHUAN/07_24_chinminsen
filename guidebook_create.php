<?php

// 送信確認
// var_dump($_POST);
// exit();
session_start();
include("functions.php");
check_session_id();
$pdo = connect_to_db();
// 項目入力のチェック
// 値が存在しないor空で送信されてきた場合はNGにする
if (
    !isset($_POST['title']) || $_POST['title'] == '' ||
    !isset($_POST['date']) || $_POST['date'] == '' ||
    !isset($_POST['schedule']) || $_POST['schedule'] == '' ||
    !isset($_POST['text']) || $_POST['text'] == '' 
   
) {
    // 項目が入力されていない場合はここでエラーを出力し，以降の処理を中止する
    echo json_encode(["error_msg" => "no input"]);
    exit();
}




// 受け取ったデータを変数に入れる
$user_id = $_POST['user_id'];
$title = $_POST['title'];
$date = $_POST['date'];
$schedule = $_POST['schedule'];
$text = $_POST['text'];
// $img = $_POST['img'];
function file_upload()
{
    // POSTではないとき何もしない
    if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') !== 'POST') {
        return;
    }
    // フォームからデータ受取
    $user_id = $_POST['user_id'];
    $title = $_POST['title'];
    $date = $_POST['date'];
    $schedule = $_POST['schedule'];
    $text = $_POST['text'];

    // 画像アップロードファイル
    $img = $_FILES['img'];
    //参照 森さんのgithub

    if ($img['error'] > 0) {
        throw new Exception('failed');
    }

    $tmp_name = $img['tmp_name'];

    // ファイル拡張子をチェック
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mimetype = finfo_file($finfo, $tmp_name); //ファイルについての情報を返す

    // 許可するMIMETYPE
    $allowed_types = [
        'jpg' => 'image/jpeg', 'png' => 'image/png', 'gif' => 'image/gif'
    ];
    if (!in_array($mimetype, $allowed_types)) {
        throw new Exception(' The format of this document is not understood.');
    }

    // アップロード後のファイル名の処理
    //（ハッシュ値でファイル名を決定するため、同一ファイルは同名で上書き）
    $filename = sha1_file($tmp_name);

    // 拡張子
    $ext = array_search($mimetype, $allowed_types);

    // 画像保存先のパス
    $destination = sprintf(
        '%s/%s.%s',
        'upload',
        $filename,
        $ext
    );

    // アップロード後、ファイルを指定ディレクトリに移動
    if (!move_uploaded_file($tmp_name, $destination)) {
        throw new Exception('failed for saved');
    }

    // データベースに登録する処理
    $sql = 'INSERT INTO guidebook(id,user_id, title, date,schedule,img,text,admit, created_at, updated_at) VALUES(NULL,:user_id, :title, :date,:schedule,:img,:text,0, sysdate(), sysdate())';
    //配列の中身を空にする
    $arr = [];

    $arr[':user_id'] = $user_id;
    $arr[':title'] = $title;
    $arr[':date'] = $date;
    $arr[':schedule'] = $schedule;
    $arr[':img'] =$destination;
    $arr[':text'] = $text;

    //最終行に挿入
    $
    $lastInsertId = insert($sql, $arr);

    // 成功時にページを移動する
    header("Location:success.php");
}

try {
    // ファイルアップロード
    file_upload();
} catch (Exception $e) {
    $error = $e->getMessage();}
// https://www.zhihu.com/question/23310462/answer/378730293

// function file_upload()
// {
// $img = $_FILES['img'];//得到传输的数据//得到文件名称
// $name = $img['name'];$type = strtolower(substr($name,strrpos($name,'.')+1)); 
// //得到文件类型，并且都转化成小写
// $allow_type = array('jpg','jpeg','gif','png','pjpeg','bmp'); 
// //定义允许上传的类型//判断文件类型是否被允许上传
// if(!in_array($type, $allow_type)){ //如果不被允许，则直接停止程序运行 
// return ;}//判断是否是通过HTTP POST上传的
// if(!is_uploaded_file($img['tmp_name'])){  //如果不是通过HTTP POST上传的  
// return ;}
// $upload_path = "upload"; 
// //上传文件的存放路径//开始移动文件到相应的文件夹
// if(move_uploaded_file($img['tmp_name'],$upload_path.$img['name'])){echo "Successfully!";
// }else{  echo "Failed!";}
// }
// // DB接続


// // データ登録SQL作成
// // `created_at`と`updated_at`には実行時の`sysdate()`関数を用いて実行時の日時を入力する
// $sql = 'INSERT INTO guidebook(id,user_id, title, date,schedule,img,text,admit, created_at, updated_at) VALUES(NULL,:user_id, :title, :date,:schedule,:img,:text,0, sysdate(), sysdate())';

// // SQL準備&実行
// // $stmt = $pdo->prepare($sql);
// // $stmt->bindValue(':user_id', $user_id, PDO::PARAM_STR);
// // $stmt->bindValue(':title', $title, PDO::PARAM_STR);
// // $stmt->bindValue(':date', $date, PDO::PARAM_STR);
// // $stmt->bindValue(':schedule', $schedule, PDO::PARAM_STR);
// // // $stmt->bindValue(':img', $img, PDO::PARAM_STR);
// // $stmt->bindValue(':text', $text, PDO::PARAM_STR);
// // $status = $stmt->execute();
// $arr = [];

// $arr[':user_id'] = $user_id;
// $arr[':title'] = $title;
// $arr[':date'] = $date;
// $arr[':schedule'] = $schedule;
// $arr[':img'] = $img;
// $arr[':text'] = $text;
// //最終行に挿入
// $lastInsertId = insert($sql, $arr);

// // 成功時にページを移動する
// header("Location:mypage.php");

   



// // データ登録処理後
// if ($status == false) {
//     // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
//     $error = $stmt->errorInfo();
//     echo json_encode(["error_msg" => "{$error[2]}"]);
//     exit();
// } else {
//     // 正常にSQLが実行された場合は入力ページファイルに移動し，入力ページの処理を実行する
//     header("Location:success.php");
//     exit();
// };
