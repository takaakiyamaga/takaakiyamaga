<?php

header("Content-type: text/html; charset=utf-8");

require_once("p1.php");
$mysqli = db_connect();

if(empty($_POST)) {
  echo "<a href='delete1.php'>delete1.php</a>←こちらのページからどうぞ";
  exit();
}else{
  if (!isset($_POST['id'])  || !is_numeric($_POST['id']) ){
    echo "IDエラー";
    exit();
  }else{
    //プリペアドステートメント
    $stmt = $mysqli->prepare("DELETE FROM problemanswer WHERE id=?");

    if($stmt){
      //プレースホルダへ実際の値を設定する
      $stmt->bind_param('i', $id);
      $id = $_POST['id'];

      $stmt->execute();

      //変更された行の数が1かどうか
      if($stmt->affected_rows == 1){
        echo "削除いたしました。";
      }else{
        echo "削除失敗です";
      }

      //ステートメント切断
      $stmt->close();
    }else{
      echo $mysqli->errno . $mysqli->error;
    }
  }
}

// データベース切断
$mysqli->close();

?>
<!DOCTYPE html>
<html>
<head>
  <title>削除画面</title>
</head>
<body>
  <h1>削除完了画面</h1>
  <form action="home.php" method="POST">
    <input type="submit" value="戻る">
  </body>
  </html>
