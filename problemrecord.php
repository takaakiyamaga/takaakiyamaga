<?php
try {
$pdo = new PDO('mysql:host=localhost;dbname=g031o153;charset=utf8','g031o153','a04073486',
array(PDO::ATTR_EMULATE_PREPARES => false));

$question2=$_POST["question2"];
$category=$_POST["category"];
$answer2=$_POST["answer2"];
$detail=$_POST["detail"];

$stmt = $pdo -> prepare("INSERT INTO user (question2,category,answer2,detail)
 VALUES (:question2,:category,:answer2,:detail)");

$stmt->bindParam(':question2', $question2, PDO::PARAM_INT);
$stmt->bindParam(':category', $category, PDO::PARAM_INT);
$stmt->bindParam(':answer2', $answer2, PDO::PARAM_INT);
$stmt->bindParam(':detail', $detail, PDO::PARAM_INT);

$stmt->execute();

$statement = $pdo -> query("SELECT * FROM user");

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
  <input type="hidden" name="question2" value="<?php echo $question2; ?>">
問題内容：<br />
   <p><?php echo $question2; ?></p>
   <input type="hidden" name="answer2" value="<?php echo $answer2; ?>">
回答：<br />
    <p><?php echo $answer2; ?></p>
    <input type="hidden" name="detail" value="<?php echo $detail; ?>">
解説：<br />
     <p><?php echo $detail; ?></p>
    </body>

    </html>
