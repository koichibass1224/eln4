<?php
//1. GETでidを取得
 $id = $_GET["id"];

session_start();
include("../function/functions2.php"); 
loginCheck();
$u_name=$_SESSION['u_name'];//session変数

// DBに接続
require "functions.php";
$pdo = connectDB();

//3. データ削除SQLを準備
$delete = $pdo->prepare("DELETE FROM profile_table WHERE  contributor = '$u_name'");
$delete->bindvalue(":id",$id,PDO::PARAM_INT);

//4. SQL実行
$status = $delete->execute();

//5. 一覧ページへ戻す
if ($status == false) { 
    sql_error($delete);
  }else{
    header("Location: profile_select.php");
  }

?>