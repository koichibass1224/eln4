
<?php
session_start();

  include("../function/functions2.php"); 
  loginCheck();
$u_name=$_SESSION['u_name'];

require "../function/functions.php";
$pdo = connectDB();

$stmt = $pdo->prepare("SELECT * FROM address_table WHERE contributor = '$u_name';");
$status = $stmt->execute();

if($status==false) {
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    
    $view .='<div class="uix-core-grid__col-3">'.'<div class="uix-team--grid__item">'.'<div class="uix-team--grid__img uix-border--circle">';
    $view .='<img src="../img/avator.png" alt="">';
		$view .='</div>'.'<h3>'.$result['ad1'].'</h3>';

		// $view .='<h4>'.$result['ad2'].'</h4>';
		
		$view .='<div class="uix-team--grid__detail uix-team--grid__detail--toggle">'.'<div class="uix-v-align--table">'.'<div>'.'<h3>'.$result['ad1'].'</h3>'.'<h4>'.$result['ad2'].'</h4>'.'<hr>'.$result['ad3'].'<br>';

		$view .= '<a href="address_delete.php?id='.$result["id"].'">'."[ 削除 ]"."</a>";
		$view .='</div>'.'</div>'.'</div>'.'</div>'.'</div>';

}
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>address</title>

   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<!-- <script src="../js/modernizr.min.js"></script>
<meta http-equiv="X-UA-Compatible" content="IE=edge"> -->

<!-- Theme  -->
  <!-- <script src="../js/wp-jquery/jquery.min.js"></script>
	<script src="../js/wp-jquery/jquery.migrate.min.js"></script> -->
<link rel="stylesheet" href="../css/uix-kit.min.css"/>
<link rel="stylesheet" href="../css/index.css"/>

<!-- font awesome  -->
<!-- <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet"> -->
</head>

<body>
<div class="uix-breadcrumbs is-fullwidth uix-t-c">
							<ul>
								<li class="is-active" style="width:25%;"><a style="overflow: hidden;" href="../index.php">Page top : トップページ</a></li>
								<li class="is-active" style="width:25%;"><a style="overflow: hidden;"href="#">Address1 : アドレス1</a></li>
								<li  style="width:25%;"><a style="overflow: hidden;" href="#"><span>Address2 : アドレス2</span></a></li>  
								<li  style="width:25%;"><a style="overflow: hidden;" href="#">Address3 : アドレス3</a></li>  
							</ul>
            </div>

<div style="margin-left:10%;">
	<img src="../img/logo.000.png" style="width:20%;" alt="">
		<h3 class="to_user"><?=$u_name?>'s contact list</h3>
			<p>ご家族・ご友人のコンタクトリストを記入しましょう。</p></div>

<div class="container mt-5">
  <div class="row">
    <div class="col-md-12">
      <table class="table">
        <thead>
            <tr>
              <th>名前</th>
              <th>関係性</th>
              <th>コンタクト</th>
            </tr>
        </thead>
        <tbody>
          <tr>
           <form action="address_insert.php" method="post"> 
              <!-- <td><input type="text" name="ad1" id="ad1"></td>
              <td><input type="text" name="ad2" id="ad2"></td>
              <td><input type="text" name="ad3" id="ad3"></td> -->
							<td><textarea name="ad1" id="ad1" cols="30" rows="1"></textarea></td>
							<td><textarea name="ad2" id="ad2" cols="30" rows="1"></textarea></td>
							<td><textarea name="ad3" id="ad3" cols="30" rows="1"></textarea></td> 
          </tr>
        </tbody>
      </table>
               <input type="submit" id="submit"value="save" class="uix-btn uix-btn__border--thin uix-btn__size--s">
            </form> 
    </div>
  </div>
</div>
  

<section class="uix-spacing--s">
				<div class="container uix-t-c">
						<div class="row">
							<div class="col-12">

								<div class="uix-team--grid">
									<div class="uix-core-grid">

											<div class="uix-core-grid__col-3">
												<div class="uix-team--grid__item">
													<div class="uix-team--grid__img uix-border--circle"> <img src="../img/avator.png" alt="">
													</div>
													<h3>name</h3>
													<!-- <h4></h4> -->
													<div class="uix-team--grid__detail uix-team--grid__detail--toggle">
														<div class="uix-v-align--table">
															<div>
																<h3>name</h3>
																<h4>She or he is a person of my family who has mostly closed relationship.</h4>
																<hr>aaaa@email.com						
															<br><a href="">削除</a>
															</div>
														</div>
													</div>
												</div>

											</div>
											<!-- Item End -->

                      <?=$view?>

										</div>
										<!-- .uix-core-grid  end -->
									</div>
									<!-- /.uix-core-grid -->	
								</div>
								<!-- /.uix-team--grid -->

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
<!-- <script src="../js/jquery.waitforimages.min.js"></script> -->
<script src="../js/TweenMax.min.js"></script>
<script src="../js/uix-kit.min.js"></script>
<script src="../js/video.min.js"></script>
<script src="../js/template7.min.js"></script>
<script src="../js/pixi.min.js"></script>
<!--  -->
<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->


<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script> 

<!-- <script>
	        $("#submit").on("click",function() {
            //Ajax送信開始
            $.ajax({
                type: "post",
                url: "address_insert.php",
                data: {
                    ad1:$("#ad1").val() ,
                    ad2:$("#ad2").val() ,
                    ad3:$("#ad3").val() ,
                },
                dataType: "html",
                //通信成功時にsuccess内が実行される！
                success: function(data) {
                  if(data=="false"){
                    alert("エラー");
                  }else{
                      alert("Already inputted!");
                    // // $("#ad1").val("");
                    // // $("#ad2").val("");
                    // // $("#ad3").val("");
                  }
                }
            });
        });
	</script>  -->

</body>
</html>