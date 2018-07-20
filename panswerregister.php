<?php
header("Content-type: text/html; charset=utf-8");
require_once("p1.php");
$mysqli = db_connect();

if(empty($_POST)) {
  echo "<a href='qanswer.php'>qanswer.php</a>←こちらのページからどうぞ";
  exit();
}else{

  //名前入力チェック
  if (!isset($_POST['rightorwrong'])  || $_POST['rightorwrong'] === "" ){
    $errors['rightorwrong'] = "正誤状況が選択されていません";

    if(count($errors) === 0){

      //プリペアドステートメント
      $stmt = $this->pdo->prepare("UPDATE problemanswer SET rightorwrong=:rightorwrong WHERE id=:id");
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
}
// データベース切断
$mysqli->close();

?>

<!DOCTYPE html>
<html>
<head>
  <title>正誤登録完了画面</title>
</head>
<body>
  <h1>正誤登録完了画面</h1>
  <form action="panswer.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    id：<br />
    <p><?php echo $id; ?></p>
    <input type="hidden" name="rightorwrong" value="<?php echo $rightorwrong; ?>">
    正誤状況：<br />
    <p><?php echo $rightorwrong; ?></p>
    <input type="submit" value="戻る">
  </form>
</body>
</html>
