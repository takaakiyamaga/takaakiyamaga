<?php
try {
  $pdo = new PDO('mysql:host=localhost;dbname=g031o153;charset=utf8','g031o153','a04073486',
  array(PDO::ATTR_EMULATE_PREPARES => false));

  $id=$_POST["id"];
  $questionanswer=$_POST["questionanswer"];

  $stmt = $pdo -> prepare("INSERT INTO questionanswer (questionanswer)
  VALUES (:questionanswer)");
  $stmt->bindParam(':questionanswer', $questionanswer, PDO::PARAM_INT);

  $stmt->execute();

  $statement = $pdo -> query("SELECT * FROM questionanswer");

  $row_count = $statement->rowCount();

  foreach ($statement as $row) {
    $rows[] = $row;
  }
} catch (PDOException $e) {
  exit('データベース接続失敗。'.$e->getMessage());
}

?>
<!DOCTYPE html>
<html>
<head>
  <title>回答追加画面</title>
</head>
<body>
  <h1>回答返信画面</h1>
  <input type="hidden" name="questionanswer" value="<?php echo $questionanswer; ?>">
  回答：<br />
  <p><?php echo $questionanswer; ?></p>
  <p>回答を返信しました。</p>

  <form action="qanswer.php" method="POST">
    <input type="submit" value="戻る">
  </form>
</body>
</html>
