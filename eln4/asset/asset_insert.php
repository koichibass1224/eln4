<?php
session_start();
$u_name=$_SESSION['u_name'];

//session idのチェック
session_start();

include("../function/functions2.php");
loginCheck();

//入力チェック(受信確認処理追加)：入力空欄をNGに
//  if (
//   !isset($_POST["ad1"])|| $_POST["ad1"] ==""||
//    !isset($_POST["ad2"])|| $_POST["ad2"] ==""||
//    !isset($_POST["ad3"])|| $_POST["ad3"] ==""||
//    !isset($_POST["ad4"])|| $_POST["ad4"] ==""
//   ){
//      exit('ParamEroor');
//   }

//1. POSTデータ取得
$ad1 = $_POST["ad1"];
$ad2 = $_POST["ad2"];
$ad3 = $_POST["ad3"];
$ad4 = $_POST["ad4"];
$ad5 = $_POST["ad5"];
$ad6 = $_POST["ad6"];
$ad7 = $_POST["ad7"];
$ad8 = $_POST["ad8"];
$ad9 = $_POST["ad9"];

//2. DB接続
require "../function/functions.php";
$pdo = connectDB();

//３．データ登録SQL作成 
$stmt = $pdo->prepare("INSERT INTO asset_table(id,ad1,ad2,ad3,ad4,ad5,ad6,ad7,ad8,ad9,contributor,indate)VALUES(NULL,:ad1,:ad2,:ad3,:ad4,:ad5,:ad6,:ad7,:ad8,:ad9,:ad10,sysdate())");
$stmt->bindValue(':ad1', $ad1, PDO::PARAM_STR);
$stmt->bindValue(':ad2', $ad2, PDO::PARAM_STR);
$stmt->bindValue(':ad3', $ad3, PDO::PARAM_STR); 
$stmt->bindValue(':ad4', $ad4, PDO::PARAM_STR); 
$stmt->bindValue(':ad5', $ad5, PDO::PARAM_STR); 
$stmt->bindValue(':ad6', $ad6, PDO::PARAM_STR); 
$stmt->bindValue(':ad7', $ad7, PDO::PARAM_STR); 
$stmt->bindValue(':ad8', $ad8, PDO::PARAM_STR); 
$stmt->bindValue(':ad9', $ad9, PDO::PARAM_STR); 
$stmt->bindValue(':ad10', $u_name, PDO::PARAM_STR); 
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("ErrorMassage:".$error[2]); 
}else{

  //５．リダイレクト
header('Location: asset.php');
}
?>
