<?php
header("Content-type: text/html; charset=utf-8");
require_once("p1.php");
$mysqli = db_connect();

if(empty($_POST)) {
  echo "<a href='update1.php'>update1.php</a>←こちらのページからどうぞ";
  exit();
}else{
  if (!isset($_POST['id'])  || !is_numeric($_POST['id']) ){
    echo "IDエラー";
    exit();
  }else{
    //プリペアドステートメント
    $stmt = $mysqli->prepare("SELECT * FROM name WHERE id=?");
    if ($stmt) {
      //プレースホルダへ実際の値を設定する
      $stmt->bind_param('i', $id);
      $id = $_POST['id'];

      //クエリ実行
      $stmt->execute();

      //結果変数のバインド
      $stmt->bind_result($id,$name);
      // 値の取得
      $stmt->fetch();

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
  <title>回答表示</title>
</head>
<body>
  <h1>回答表示</h1>
  <p>名前を変更して下さい。</p>
  <form action="panswerregister.php" method="post">
    <input type="text" name="rightorwrong" value="<?=htmlspecialchars($rightorwrong, ENT_QUOTES, 'UTF-8')?>">
    <input type="hidden" name="id" value="<?=$id?>">
    <input type="submit" value="変更する">
  </form>

</body>
</html>
