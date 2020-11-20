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
  }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>asset_1</title>

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
								<li  style="width:25%;"><a style="overflow: hidden;" href="asset_detail.php"><span>Asset2 : アセット2</span></a></li>  
								<li  style="width:25%;"><a style="overflow: hidden;" href="asset_info.php">Asset3 : アセット3</a></li>  
							</ul>
						</div>

	<section class="uix-spacing--s">
				<div class="container">
						<div class="row">
							<div class="col-12">


									<div class="uix-form-progress">
										<div class="uix-form-progress__indicator"><span>Step 1</span></div>
										<div class="uix-form-progress__indicator"><span>Step 2</span></div>
										<div class="uix-form-progress__indicator"><span>Step 3</span></div>
										<div class="uix-form-progress__indicator"><span>Step 4</span></div>
										<div class="uix-form-progress__line"><span></span></div>
									</div>
									<!-- /.uix-form-progress -->
									<img class="logo"src="../img/logo.000.png" alt="">
									<h3 class="to_user"><?=$u_name?>'s Data list</h3><br>
									<p>遺産分与の為の遺産分割協議書を書きましょう。各設問から答えていってください。</p>
									<div class="uix-form-progress__target" data-anime-speed="0.2s">
									<!-- form for post -->
										<!-- <form method="post" action="asset_insert.php"> -->

											<!-- Step -->
											<div class="uix-form-progress__target__step">
												<div class="uix-form-progress__content">

													<!-- ////////////  content begin  ////////////-->
													<h4>Step 1</h4>
													<p>本籍・最後の住所</p>
													<p>Your permanent residence.</p>
													<div class="uix-controls is-fullwidth">
													  <!-- <input type="text" class="js-uix-float-label" name="ad1">
													  <label><　?=$ad1?></label> -->
														<textarea name="ad1" id="ad1" cols="width:100%;" rows="1"><?=$ad1?></textarea>
													</div>

													<h4>Step 2</h4>
													<p>最後の住所</p>
													<p>Your last living address.</p>
													<div class="uix-controls is-fullwidth">
														<textarea name="ad2" id="ad2" cols="width:100%;" rows="1"><?=$ad2?></textarea>
													</div>

													<h4>Step 3</h4>
													<p>被相続人</p>
													<p>an ancestor.</p>
													<div class="uix-controls is-fullwidth">
													<textarea name="ad3" id="ad3" cols="width:100%;" rows="1"><?=$ad3?></textarea>
													</div>

													<div class="uix-controls">
													  <a href="javascript:void(0);" class="uix-btn uix-btn__border--thin uix-btn__size--s uix-btn__bg--primary go-step">Next</a>
													</div>  
													<div><input type="submit" id="submit" value="Save"class="uix-btn uix-btn__border--thin uix-btn__size--s"></div>

													<!-- ////////////  content end  ////////////-->
												</div>
												<!-- /.uix-form-progress__content -->
											</div>


											<!-- Step -->
											<div class="uix-form-progress__target__step">
												<div class="uix-form-progress__content">

													<!-- ////////////  content begin  ////////////-->
													<h4>Step 4</h4>
													<p>相続人</p>
													<p>a legal heir</p>
													<div class="uix-controls is-fullwidth">
													<textarea name="ad4" id="ad4" cols="width:100%;" rows="1"><?=$ad4?></textarea>
													</div>

													<h4>Step 5</h4>
													<p>【土地】</p>
													<p>Property</p>
													<div class="uix-controls is-fullwidth">
													  <!-- <input type="text" class="js-uix-float-label" name="ad5" placeholder="例：所在　新宿区白銀町　地番　○番○　不動産番号　01160000000">
													  <label><　?=$ad5?></label> -->
														<textarea name="ad5" id="ad5" cols="width:100%;" rows="1" placeholder="例：所在　新宿区白銀町　地番　○番○　不動産番号　01160000000"><?=$ad5?></textarea>
													</div>
													

													<div class="uix-controls">
													  <a href="javascript:void(0);" class="uix-btn uix-btn__border--thin uix-btn__size--s uix-btn__bg--primary go-step">Next</a>
													</div>     
													<div class="uix-controls">
													  <a href="javascript:void(0);" class="go-reset">Reset</a>
													</div> 
													<div><input type="submit" id="submit"  value="Save"class="uix-btn uix-btn__border--thin uix-btn__size--s"></div>

													<!-- ////////////  content end  ////////////-->
												</div>
												<!-- /.uix-form-progress__content -->
											</div>


											<!-- Step -->
											<div class="uix-form-progress__target__step">

												<div class="uix-form-progress__content">
													<!-- ////////////  content begin  ////////////-->
													
													<h4>Step 6</h4>
													<p>【貯預金】</p>
													<p>Deposits</p>
													<div class="uix-controls is-fullwidth">
														<textarea name="ad6" id="ad6" cols="width:100%;" rows="1" placeholder="例：みずほ銀行　新宿支店　普通預金　1010000"><?=$ad6?></textarea>
													</div>
													
													<h4>Step 7</h4>
													<p>【保険】</p>
													<p>Insuarance</p>
													<div class="uix-controls is-fullwidth">
														<textarea name="ad7" id="ad7" cols="width:100%;" rows="1" placeholder="例：日本生命　証券番号　第9876543号"><?=$ad7?></textarea>
													</div>
													
													<div class="uix-controls">
													  <a href="javascript:void(0);" class="uix-btn uix-btn__border--thin uix-btn__size--s uix-btn__bg--primary go-step">Next</a>
													</div>  
													<div class="uix-controls">
													  <a href="javascript:void(0);" class="go-reset">Reset</a>
													</div> 
													<div><input type="submit" id="submit"   value="Save"class="uix-btn uix-btn__border--thin uix-btn__size--s"></div>

													<!-- ////////////  content end  ////////////-->
												</div>
												<!-- /.uix-form-progress__content -->
											</div>

											<!-- Step -->
											<div class="uix-form-progress__target__step">

												<div class="uix-form-progress__content">

													<!-- ////////////  content begin  ////////////-->
													<h4>Step 8</h4>
													<p>締結日</p>
													<div class="uix-controls is-fullwidth">
													<textarea name="ad8" id="ad8" cols="width:100%;" rows="1"><?=$ad8?></textarea>
													</div>

													<h4>Step 9</h4>
													<p>相続人：住所</p>
													<div class="uix-controls is-fullwidth">
													<textarea name="ad9" id="ad9" cols="width:100%;" rows="1"><?=$ad9?></textarea>
													</div>

													<div class="uix-controls">
													  <button type="submit" class="uix-btn uix-btn__border--thin uix-btn__margin--r uix-btn__size--s uix-btn__bg--primary">Submit</button>
													  <a href="javascript:void(0);" class="go-reset">Reset</a>
													</div>  
													<div><input type="submit" id="submit"  value="Save"class="uix-btn uix-btn__border--thin uix-btn__size--s"></div>

													<!-- ////////////  content end  ////////////-->
												</div>
												<!-- /.uix-form-progress__content -->
											</div>

										<!-- </form>	 -->

									</div>
									<!-- /.uix-form-progress__target -->
							</div>
						</div>
						<!-- .row end -->
				</div>
				<!-- .container end -->

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

<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script> 

  <script>
	        $("#submit").on("click",function() {
            //Ajax送信開始
            $.ajax({
                type: "post",
                url: "asset_insert.php",
                data: {
                    ad1:$("#ad1").val() ,
                    ad2:$("#ad2").val() ,
                    ad3:$("#ad3").val() ,
                    ad4:$("#ad4").val() ,
                    ad5:$("#ad5").val() ,
                    ad6:$("#ad6").val() ,
                    ad7:$("#ad7").val() ,
                    ad8:$("#ad8").val() ,
                    ad9:$("#ad9").val() ,
                },
                dataType: "html",
                //通信成功時にsuccess内が実行される！
                success: function(data) {
                  if(data=="false"){
                    alert("エラー");
                  }else{
                    //  alert("Already inputted!");
                    // // $("#ad1").val("");
                    // // $("#ad2").val("");
                    // // $("#ad3").val("");
                  }
                }
            });
        });
	</script> 

</body>
</html>