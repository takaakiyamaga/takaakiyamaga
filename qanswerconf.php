<?php
function db_connect(){
  //データベース接続
  $server = "localhost";
  $userName = "g031o153";
  $password = "a04073486";
  $dbName = "g031o153";

  $mysqli = new mysqli($server, $userName, $password,$dbName);

  if ($mysqli->connect_error){
    echo $mysqli->connect_error;
    exit();
  }else{
    $mysqli->set_charset("utf-8");
  }
  return $mysqli;
}

header("Content-type: text/html; charset=utf-8");

$mysqli = db_connect();

if(empty($_POST)) {
  echo "<a href='qanswer.php'>update1.php</a>←こちらのページからどうぞ";
  exit();
}else{
  if (!isset($_POST['id'])  || !is_numeric($_POST['id']) ){
    echo "IDエラー";
    exit();
  }else{
    //プリペアドステートメント
    $stmt = $mysqli->prepare("SELECT * FROM questionanswer WHERE id=?");
    if ($stmt) {
      //プレースホルダへ実際の値を設定する
      $stmt->bind_param('i', $id);
      $id = $_POST['id'];

      //クエリ実行
      $stmt->execute();

      //結果変数のバインド
      $stmt->bind_result($id,$questionanswer,$question_id,$user_id);
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
  <title>回答画面</title>
</head>
<body>
  <h1>回答画面</h1>

  <p>回答を入力して下さい。</p>
  <form action="qanswerrecord.php" method="POST">
    <input type="text" name="questionanswer" value="<?=htmlspecialchars($questionanswer, ENT_QUOTES, 'UTF-8')?>">
    <input type="hidden" name="id" value="<?=$id?>">
    <input type="submit" value="回答する">
  </form>

</body>
</html>
