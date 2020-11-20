
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

include("../function/functions2.php"); //同じ階層
loginCheck();

//session変数 ページを跨いで同じ値を使える変数
$u_name=$_SESSION['u_name'];

//1.  DB接続
 require "../function/functions.php";
 $pdo = connectDB();

//２．データ取得SQL作成 (login中のユーザーが登録したdataのみ表示)
$stmt = $pdo->prepare("SELECT * FROM profile_test_table WHERE contributor = '$u_name'");
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

    // $view .='<div class="uix-timeline__item">';
    // $view .='<div class="uix-timeline__item__img uix-border--circle uix-border--circle-only-img"> ';
    // $view .='<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mM8Z2X3HwAFawJH9fA6+AAAAABJRU5ErkJggg==" alt=""> ';
    // $view .='</div>';
    // $view .='<div class="uix-timeline__item__info">';
    // $view .='<h3>'.$result["ad1"].'</h3>';

    // $view .='<p>'.$result["ad2"].'</p> ';
    // $view .='<span class="uix-timeline__item__date">'.$result["ad3"].'</span> '.'</div>'.'<div class="uix-timeline__line">'.'</div>'.'</div>';
  }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>profile_info_test2</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <!--bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/uix-kit.min.css"/>
    <link rel="stylesheet" href="../css/index.css"/>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="../js/wp-jquery/jquery.min.js"></script>
	  <script src="../js/wp-jquery/jquery.migrate.min.js"></script>
    <style>
    </style>
</head>
<body>

<div class="col-md-12">
      <table class="table">
        <thead>
            <tr>
              <th>できごと</th>
              <th>ないよう</th>
              <th>にちじ</th>
            </tr>
        </thead>
        <tbody>
          <tr>
            <form action="profile_insert_test.php" method="post">
              <td><input type="text" name="ad1"></td>
              <td><input type="text" name="ad2"></td>
              <td><input type="text" name="ad3"></td>
          </tr>
        </tbody>
      </table>
               <button type="submit" class="btn btn-primary">保存</button>
            </form>
    </div>



    		   <!-- Content 
			====================================================== -->
<section class="uix-spacing--s">

<div class="uix-timeline__container-wrapper is-horizontal uix-timeline__container-wrapper--classic js-uix-timeline">

  <h2 class="uix-t-c" id="timeline-number-show2">Jan 14</h2>

  <div class="uix-timeline__container">

    <div class="uix-timeline uix-timeline--to-center" data-show-ele="#timeline-number-show2">


      <div class="uix-timeline__item is-active">
        <div class="uix-timeline__item__img uix-border--circle uix-border--circle-only-img"> 
          <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mM8Z2X3HwAFawJH9fA6+AAAAABJRU5ErkJggg==" alt=""> 
          <span class="uix-timeline__item__date">Jan 14</span> 
        </div>

        <div class="uix-timeline__item__info">
          <h3>Timeline Title Here 1</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis qui ut.</p> 


        </div>

        <div class="uix-timeline__line"></div>

      </div><!-- /.uix-timeline__item -->



      <div class="uix-timeline__item">
        <div class="uix-timeline__item__img uix-border--circle uix-border--circle-only-img"> 
          <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mM8Z2X3HwAFawJH9fA6+AAAAABJRU5ErkJggg==" alt=""> 
          <span class="uix-timeline__item__date">Jan 13</span> 
        </div>

        <div class="uix-timeline__item__info">
          <h3>Timeline Title Here 2</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p> 


        </div>

        <div class="uix-timeline__line"></div>

      </div><!-- /.uix-timeline__item -->


      <div class="uix-timeline__item">
        <div class="uix-timeline__item__img uix-border--circle uix-border--circle-only-img"> 
          <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mM8Z2X3HwAFawJH9fA6+AAAAABJRU5ErkJggg==" alt=""> 
          <span class="uix-timeline__item__date">Jan 12</span> 
        </div>

        <div class="uix-timeline__item__info">
          <h3>Timeline Title Here 3</h3>
          <p>Lorem ipsum dolor sit amet</p> 


        </div>

        <div class="uix-timeline__line"></div>

      </div><!-- /.uix-timeline__item -->



      <div class="uix-timeline__item">
        <div class="uix-timeline__item__img uix-border--circle uix-border--circle-only-img"> 
          <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mM8Z2X3HwAFawJH9fA6+AAAAABJRU5ErkJggg==" alt=""> 
          <span class="uix-timeline__item__date">Jan 11</span> 
        </div>

        <div class="uix-timeline__item__info">
          <h3>Timeline Title Here 4</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora.</p> 


        </div>

        <div class="uix-timeline__line"></div>

      </div><!-- /.uix-timeline__item -->


      <div class="uix-timeline__item">
        <div class="uix-timeline__item__img uix-border--circle uix-border--circle-only-img"> 
          <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mM8Z2X3HwAFawJH9fA6+AAAAABJRU5ErkJggg==" alt=""> 
          <span class="uix-timeline__item__date">Jan 10</span> 
        </div>

        <div class="uix-timeline__item__info">
          <h3>Timeline Title Here 5</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde?</p> 


        </div>

        <div class="uix-timeline__line"></div>

      </div><!-- /.uix-timeline__item -->


      <div class="uix-timeline__item">
        <div class="uix-timeline__item__img uix-border--circle uix-border--circle-only-img"> 
          <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mM8Z2X3HwAFawJH9fA6+AAAAABJRU5ErkJggg==" alt=""> 
          <span class="uix-timeline__item__date">Jan 9</span> 
        </div>

        <div class="uix-timeline__item__info">
          <h3>Timeline Title Here 6</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p> 


        </div>

        <div class="uix-timeline__line"></div>

      </div><!-- /.uix-timeline__item -->


      <div class="uix-timeline__item">
        <div class="uix-timeline__item__img uix-border--circle uix-border--circle-only-img"> 
          <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mM8Z2X3HwAFawJH9fA6+AAAAABJRU5ErkJggg==" alt=""> 
          <span class="uix-timeline__item__date">Jan 2</span> 
        </div>

        <div class="uix-timeline__item__info">
          <h3>Timeline Title Here 7</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde?</p> 

        </div>

        <div class="uix-timeline__line"></div>

      </div><!-- /.uix-timeline__item -->




    </div>
    <!-- .uix-timeline end -->  

  </div><!-- /.uix-timeline__container -->



  <a href="javascript:" class="uix-timeline__btn uix-timeline__btn--prev"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
  <a href="javascript:" class="uix-timeline__btn uix-timeline__btn--next"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>

</div><!-- /.uix-timeline__container-wrapper -->

</section>
            

<!-- Your Plugins & Theme Scripts  end -->
<script src="../js/uix-kit.min.js"></script>

<script src="../js/axios.min.js"></script>
<script src="../js/jquery.waitforimages.min.js"></script>
<script src="../js/TweenMax.min.js"></script>
  <script src="../js/video.min.js"></script>
  <script src="../js/template7.min.js"></script>
  <script src="../js/pixi.min.js"></script>
  <script src="../js/three.min.js"></script>
  <script src="../js/modernizr.min.js"></script>
</body>
</html>