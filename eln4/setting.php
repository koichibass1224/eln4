<?php
session_start();
$u_name=$_SESSION['u_name'];

//1.  DB接続
 require "function/functions.php";
 $pdo = connectDB();

//２．データ取得SQL作成 (login中のユーザーが登録したdataのみ表示)
$stmt = $pdo->prepare("SELECT * FROM image_table WHERE contributor = '$u_name'");
$status = $stmt->execute();


//３．データ表示
$view="";
if($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){ 

    $view ='<img style=" overflow:hidden;" src="upload_top/'.$result["ad1"].'">';
  }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>setting</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <section>
        <form method="post" action="fileupload.php" enctype="multipart/form-data">
            <input type="file" name="upfile" accept="image/*" capture="camera">
            <input type="submit" class="" value="Fileアップロード">
        </form>
    </section>
    <!-- ヘッダー -->
    <div style="width:100%; height:50%;">
    <?=$view?>
    </div>
</main>
</body>
</html>