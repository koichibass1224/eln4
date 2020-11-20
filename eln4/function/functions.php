<?php
// データベースに接続
function connectDB() {

        try {
          // return new PDO('mysql:dbname=end_db;charset=utf8;host=localhost','root','root');
          return new PDO('mysql:dbname=end2_db;charset=utf8;host=localhost','root','root');
        } catch (PDOException $e) {
          exit('DBConnectError:'.$e->getMessage());
        }     
      }
?>