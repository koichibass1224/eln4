<?php
ini_set('display_errors',1);
//error check
?>

<?php

session_start();
$u_name=$_SESSION['u_name'];

//[FileUploadCheck--START--]
if (isset($_FILES["upfile"] ) && $_FILES["upfile"]["error"] ==0 ) {
    //ファイル名を取得
    $file_name = $_FILES["upfile"]["name"];
    //一時ファイル保存場所
    $tmp_path  = $_FILES["upfile"]["tmp_name"];
    //拡張子取得
    $extension = pathinfo($file_name, PATHINFO_EXTENSION);
    //新しいファイル名作成
    $file_name = date("YmdHis").md5(session_id()) . "." . $extension;//拡張子を追加し無理やりファイル名をつくっている。→ファイル名をユニークにする。
    //画像だけでなく、別の拡張子でもファイル保存できる！

    // FileUpload [--Start--]
    $img="";
    $file_dir_path = "upload_top/".$file_name;
    //ファイルパスはここで指定する。

    if ( is_uploaded_file( $tmp_path ) ) {
        if ( move_uploaded_file( $tmp_path, $file_dir_path ) ) {
            //自分が指定した階層に移動している。
            chmod( $file_dir_path, 0644 );
            $img = '<img src="'.$file_dir_path.'">';

            //2. DB接続します
            // require "../function/functions.php";
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
            $stmt = $pdo->prepare("INSERT INTO image_table (id,ad1,contributor) VALUES(NULL,:ad1,:ad2)");
            $stmt->bindValue(':ad1', $file_name, PDO::PARAM_STR);
            $stmt->bindValue(':ad2', $u_name, PDO::PARAM_STR);
            $status = $stmt->execute();

            //４．データ登録処理後
            if($status==false){
                // var_dump($status);
                var_dump($stmt);
                $stmt->debugDumpParams();
                // sql_error($stmt);
            }else{
              header("Location: index.php");
            }
        } else {
             echo "Error:アップロードできませんでした。";
        }
    }
 }else{
     $img = "画像が送信されていません";
 }
 //[FileUploadCheck--END--] 


?>