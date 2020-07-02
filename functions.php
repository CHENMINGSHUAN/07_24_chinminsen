<?php

function loginCheck(){
    if(!isset($_SESSION["chk_ssid"]) ||
    $_SESSION["chk_ssid"] !=session_id()
    ){
        echo "エラー";
        exit();
    }else{
        session_regenerate_id(true);
         $_SESSION["chk_ssid"] !=session_id();
         
    }
}
function connect_to_db()
{
    $dbn = 'mysql:dbname=07_24;charset=utf8;port=3306;host=localhost';
    $user = 'root';
    $pwd = '';

    try{
        return new PDO($dbn, $user, $pwd);
    }catch(PDOException $e){
        echo json_encode(["db error"=> "{$e->getMessage()}"]);
        exit();
    }
}


?>