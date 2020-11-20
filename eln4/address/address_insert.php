<?php
ini_set('display_errors',1);
//error check
?>

<?php
session_start();
$u_name=$_SESSION['u_name'];

//session idのチェック
// session_start();
// include("../function/functions2.php");
// loginCheck();

//1. POSTデータ取得
$ad1 = $_POST["ad1"];
$ad2 = $_POST["ad2"];
$ad3 = $_POST["ad3"];

//2. DB接続します
// require "../funciton/functions.php";
// $pdo = connectDB();

function connectDB() {
  try {
    return new PDO('mysql:dbname=end2_db;charset=utf8;host=localhost','root','root');
  } catch (PDOException $e) {
    exit('DBConnectError:'.$e->getMessage());
  }     
}
$pdo = connectDB();

//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO address_table (id,ad1,ad2,ad3,contributor,indate)VALUES(NULL,:ad1,:ad2,:ad3,:ad4,sysdate())");
$stmt->bindValue(':ad1', $ad1, PDO::PARAM_STR);
$stmt->bindValue(':ad2', $ad2, PDO::PARAM_STR);
$stmt->bindValue(':ad3', $ad3, PDO::PARAM_STR);
$stmt->bindValue(':ad4', $u_name, PDO::PARAM_STR); 
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  $error = $stmt->errorInfo();
  exit("ErrorMassage:".$error[2]);
}else{

//５．リダイレクト
   header("Location: address.php");
  //  header("Location: ../top.php");
}
?>
