<?php
//session_check
session_start();
if(!isset($_SESSION["chk_ssid"]) || $_SESSION["chk_ssid"]!=session_id()){
  echo"LOGIN Error";
  exit();
}else{
  session_regenerate_id(true);
  $_SESSION["chk_ssid"] = session_id();
}
?>

<?php
session_start();

include("../function/functions2.php");
loginCheck();

//session変数 ページを跨いで同じ値を使える変数
$u_name=$_SESSION['u_name'];

//1.  DB接続
 require "../function/functions.php";
 $pdo = connectDB();

//２．データ取得SQL作成 (login中のユーザーが登録したdataのみ表示)
$stmt = $pdo->prepare("SELECT * FROM asset_table WHERE contributor = '$u_name'");
$status = $stmt->execute();


//３．データ表示
$view="";
if($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{
  // .=は、上書きしないという処理。ドットがないと最後のデータのみしか表示されない
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){ 
     $ad1 = $result["ad1"];
     $ad2 = $result["ad2"];
     $ad3 = $result["ad3"];
     $ad4 = $result["ad4"];
     $ad5 = $result["ad5"];
     $ad6 = $result["ad6"];
     $ad7 = $result["ad7"];
     $ad8 = $result["ad8"];
     $ad9 = $result["ad9"];
     $date = $result["indate"];
  }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>asset_2</title>

 <!-- <link rel="stylesheet" href="../css/index.css"> -->
   <!-- Bootstrap CSS -->
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<script src="../js/modernizr.min.js"></script>
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<!-- Theme  -->
  <script src="../js/wp-jquery/jquery.min.js"></script>
	<script src="../js/wp-jquery/jquery.migrate.min.js"></script>
<link rel="stylesheet" href="../css/uix-kit.min.css"/>
<link rel="stylesheet" href="../css/index.css"/>

<!-- font awesome  -->
<link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
<style>
.logo{width:300px;}
h4{margin-top:60px;}
</style>
</head>


<body>

<div class="uix-breadcrumbs is-fullwidth uix-t-c">
							<ul>
								<li class="is-active" style="width:25%;"><a style="overflow: hidden;" href="../index.php">Page top : トップページ</a></li>
								<li class="is-active" style="width:25%;"><a style="overflow: hidden;"href="asset.php">Asset1 : アセット1</a></li>
								<li  class="is-active" style="width:25%;"><a style="overflow: hidden;" href="asset_detail.php"><span>Asset2 : アセット2</span></a></li>  
								<li  style="width:25%;"><a style="overflow: hidden;" href="asset_info.php">Asset3 : アセット3</a></li>  
							</ul>
						</div>

<section>
<div class="enter" style="display:none;">
<img src="../img/logo.000.png" alt="">
<a href="">遺産分割協議書を確認してみます。</a></div>
</section>


<section class="uix-spacing--s">
				<div class="container">
						<div class="row">
							<div class="col-12">

<div class="contents">
<h4 style="text-align:center;">遺産分割協議書</h4>
<p>本籍　<?=$ad1?></p>
<p>最後の住所　<?=$ad2?></p>
<p>被相続人　<?=$ad3?></p>

<p>　　</p>
</br>

<p>上記の相続人全員は、被相続人の相続財産について協議を行った結果、次の通り分割することに合意した。</p>

<p>　　</p>
</br>
<p>１.相続人<?=$ad4?>は次の遺産を取得する。</p>

<p>　　</p>
</br>
<p>【土地】</p><br>
<p><?=$ad5?></p>

<p>　　</p>
</br>
<p>【貯預金】</p><br>
<p><?=$ad6?></p>

<p>　　</p>
</br>
<p>【保険】</p><br>
<p><?=$ad7?></p>

<p>　　</p>
</br>
<p>２.本協議書に記載のない遺産および後日判明した遺産については、相続人<?=$ad4?>がこれを取得する。</p>

<p>　　</p>
</br>
<p>上記のとおり、相続人全員による遺産分割協議の成立により、本協議書を２通作成し、署名押印のうえ、各自１通ずつ所持することにする。</p>

<p>　　</p>
</br>
<?=$ad8?>

<p>　　</p>
</br>
<p>住所：<?=$ad9?>　　　<?=$ad3?></p>

</div>
</section>

<div class="pagetop">
    <a href="../index.php">▲ page to TOP </a>
</div>

<!-- Your Plugins & Theme Scripts  end -->
<script src="../js/jquery.waitforimages.min.js"></script>
<script src="../js/TweenMax.min.js"></script>
<script src="../js/uix-kit.min.js"></script>
<script src="../js/video.min.js"></script>
<script src="../js/template7.min.js"></script>
<script src="../js/pixi.min.js"></script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>