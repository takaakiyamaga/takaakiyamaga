<?php
header("Content-type: text/html; charset=utf-8");
require_once("p1.php");
$mysqli = db_connect();

$sql = "SELECT * FROM problem";

$result = $mysqli -> query($sql);

//クエリ失敗
if(!$result) {
  echo $mysqli->error;
  exit();
}

//連想配列で取得
while($row = $result->fetch_array(MYSQLI_ASSOC)){
  $rows[] = $row;
}

//結果セットを解放
$result->free();

// データベース切断
$mysqli->close();

?>

<!DOCTYPE html>
<html>
<head>
  <title>問題一覧</title>
</head>
<body>
  <h1>問題一覧</h1>

  <table border='1'>
    <tr><td>id</td><td>ジャンル・カテゴリ</td><td>問題</td><td>回答</td></tr>

    <?php
    foreach($rows as $row){
      ?>

      <tr>
        <td><?=$row['id']?></td>
        <td><?=htmlspecialchars($row['category'], ENT_QUOTES, 'UTF-8')?></td>
        <td><?=htmlspecialchars($row['problem'], ENT_QUOTES, 'UTF-8')?></td>
        <td>
          <form action="panswerconf.php" method="POST">
            <input type="submit" value="問題を解く">
            <input type="hidden" name="id" value="<?=$row['id']?>">
          </form>
        </form>
      </form>
    </td>
  </tr>

  <?php
}
?>

</table>

</body>
</html>
