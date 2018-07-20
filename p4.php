<?php

header("Content-type: text/html; charset=utf-8");
require_once("p1.php");
$mysqli = db_connect();
ini_set('display_errors', 0);
if(empty($_POST)) {
  echo "<a href='update1.php'>update1.php</a>←こちらのページからどうぞ";
  exit();
}else{
  //名前入力チェック
  if (!isset($_POST['rightorwrong'])  || $_POST['rightorwrong'] === "" ){
    $errors['rightorwrong'] = "名前が入力されていません。";
  }

  if(count($errors) === 0){
    //プリペアドステートメント
    $stmt = $mysqli->prepare("UPDATE problemanswer SET rightorwrong=? WHERE id=?");
    if ($stmt) {
      //プレースホルダへ実際の値を設定する
      $stmt->bind_param('si', $rightorwrong, $id);
      $rightorwrong = $_POST['rightorwrong'];
      $id = $_POST['id'];

      //クエリ実行
      $stmt->execute();
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
  <title>変更画面</title>
</head>
<body>
  <h1>変更画面</h1>

  <?php if (count($errors) === 0): ?>
    <p>変更完了しました。</p>
  <?php elseif(count($errors) > 0): ?>
    <?php
    foreach($errors as $value){
      echo "<p>".$value."</p>";
    }
    ?>
  <?php endif; ?>
  <form action="home.php" method="POST">
    <input type="submit" value="戻る">
  </body>
  </html>
