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
    $mysqli->set_charset("utf8");
  }
  return $mysqli;
}
header("Content-type: text/html; charset=utf-8");

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
  <title>過去問一覧</title>
</head>
<body>
  <h1>過去問一覧</h1>

  <table border='1'>
    <tr><td>id</td><td>ジャンル・カテゴリ</td><td>問題</td><td>回答</td></tr>

    <?php
    foreach($rows as $row){
      ?>

      <tr>
        <form action="panswerconf.php" method="POST">
          <form action="panswerrecord.php" method="POST">
            <form action="panswerregister.php" method="POST">
              <td><?=$row['id']?></td>
              <td><?=htmlspecialchars($row['category'], ENT_QUOTES, 'UTF-8')?></td>
              <td><?=htmlspecialchars($row['problem'], ENT_QUOTES, 'UTF-8')?></td>
              <td><?=htmlspecialchars($row['realanswer'], ENT_QUOTES, 'UTF-8')?></td>
              <td><?=htmlspecialchars($row['detail'], ENT_QUOTES, 'UTF-8')?></td>
              <td>

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
  <form action="home.php" method="POST">
    <input type="submit" value="戻る">

  </body>
  </html>
