<?php

header("Content-type: text/html; charset=utf-8");
require_once("p1.php");
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
    $stmt = $mysqli->prepare("SELECT * FROM problemanswer WHERE id=?");
    if ($stmt) {
      //プレースホルダへ実際の値を設定する
      $stmt->bind_param('i', $id);
      $id = $_POST['id'];

      //クエリ実行
      $stmt->execute();

      //結果変数のバインド
      $stmt->bind_result($id,$problemanswer,$rightrowrong,$problem_id,$user_id);
      // 値の取得
      $stmt->fetch();

      //ステートメント切断
      $stmt->close();}


      //プリペアドステートメント
      $stmt = $mysqli->prepare("SELECT * FROM problem WHERE id=?");
      if ($stmt) {
        //プレースホルダへ実際の値を設定する
        $stmt->bind_param('i', $id);
        $id = $_POST['id'];

        //クエリ実行
        $stmt->execute();

        //結果変数のバインド
        $stmt->bind_result($id,$problem,$category,$detail,$realanswer,$problemanswer_id,$user_id);
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
    <title>問題回答画面</title>
  </head>
  <body>
    <h1>問題回答画面</h1>
    <form action="panswerrecord.php" method="POST">
      <input type="hidden" name="ploblem" value="<?php echo $problem; ?>">
      <input type="hidden" name="id" value="<?php echo $id; ?>">
      問題内容：<br />
      <input type="hidden" name="realanswer" value="<?php echo $realanswer; ?>">
      <p><?php echo $problem; ?></p>
      <p>回答を入力して下さい。</p>
      <input type="text" name="problemanswer" value="<?=htmlspecialchars($problemanswer, ENT_QUOTES, 'UTF-8')?>">
      <input type="hidden" name="id" value="<?=$id?>">
      <input type="submit" value="回答する">
    </form>
  </from>
</body>
</html>
