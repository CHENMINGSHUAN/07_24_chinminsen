<?php
// include('functions.php');
// session_start();
// if (!isset($_SESSION["username"]) || ($_SESSION["username"] == "")) {
//    echo"エラー";
// }
// if (isset($_POST["logout"]) && ($_POST["logout"] == "true")) {
//     session_destroy();
//     echo '登出中......';
//     header("Location:transform.php");
//     exit();
// }

$_SESSION[] =array();

if(isset($_COOKIE[session_name()])){
    setcookie(session_name(),"",time()-42000,"/");
}
session_destroy();
header("Location:transform.php");
exit();
?>
