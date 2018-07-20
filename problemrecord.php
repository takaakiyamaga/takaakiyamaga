<?php
try {
  $pdo = new PDO('mysql:host=localhost;dbname=g031o153;charset=utf8','g031o153','a04073486',
  array(PDO::ATTR_EMULATE_PREPARES => false));

  $problem=$_POST["problem"];
  $category=$_POST["category"];
  $realanswer=$_POST["realanswer"];
  $detail=$_POST["detail"];

  $stmt = $pdo -> prepare("INSERT INTO problem (problem,category,realanswer,detail)
  VALUES (:problem,:category,:realanswer,:detail)");

  $stmt->bindParam(':problem', $problem, PDO::PARAM_INT);
  $stmt->bindParam(':category', $category, PDO::PARAM_INT);
  $stmt->bindParam(':realanswer', $realanswer, PDO::PARAM_INT);
  $stmt->bindParam(':detail', $detail, PDO::PARAM_INT);

  $stmt->execute();

  $statement = $pdo -> query("SELECT * FROM problem");

  $row_count = $statement->rowCount();

  foreach ($statement as $row) {
    $rows[] = $row;
  }
} catch (PDOException $e) {
  exit('データベース接続失敗。'.$e->getMessage());
}

?>

<html>
<head>
  <title>PHP</title>
</head>
<body>
  <input type="hidden" name="category" value="<?php echo $category; ?>">
  ジャンル・カテゴリ：<br />
  <p><?php echo $category; ?></p>
  <input type="hidden" name="problem" value="<?php echo $problem; ?>">
  問題内容：<br />
  <p><?php echo $problem; ?></p>
  <input type="hidden" name="realanswer" value="<?php echo $realanswer; ?>">
  回答：<br />
  <p><?php echo $realanswer; ?></p>
  <input type="hidden" name="detail" value="<?php echo $detail; ?>">
  解説：<br />
  <p><?php echo $detail; ?></p>
  <form action="home.php">
    <input type="submit" value="戻る" />
  </body>

  </html>
