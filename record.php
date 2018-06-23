<?php




try {
$pdo = new PDO('mysql:host=localhost;dbname=g031o153;charset=utf8','test1','a04073486',
array(PDO::ATTR_EMULATE_PREPARES => false));
$category=$_POST["category"];
$Question2=$_POST["Question2"];
$detail=$_POST["detail"];
$answer2=$_POST["answer2"];
$answer3=$_POST["answer3"];

$stmt = $pdo -> prepare("INSERT INTO user (id, category, Question2, detail, answer2, answer3)
 VALUES (:id,:category,:Question2,:detail,:answer2,:answer3)");

$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->bindParam(':category', $category, PDO::PARAM_STR);
$stmt->bindParam(':Question2', $Question2, PDO::PARAM_STR);
$stmt->bindParam(':detail', $detail, PDO::PARAM_STR);
$stmt->bindParam(':answer2', $answer2, PDO::PARAM_STR);
$stmt->bindParam(':answer3', $answer3, PDO::PARAM_STR);
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
<!DOCTYPE html>

<html>
<head>
<title>PHP</title>
</head>
<body>
  <table>
    <tr><th>カテゴリー</th>
      <th>問題</th>
      <th>解説</th>
      <th>回答</th>
      <th>自分の回答</th></tr>

      <?php
      foreach($rows as $row){
        ?>
        <tr>
          <td><?php echo htmlspecialchars($row['category'],ENT_QUOTES,'UTF-8'); ?></td>
          <td><?php echo htmlspecialchars($row['Question2'],ENT_QUOTES,'UTF-8'); ?></td>
          <td><?php echo htmlspecialchars($row['detail'],ENT_QUOTES,'UTF-8'); ?></td>
          <td><?php echo htmlspecialchars($row['answer2'],ENT_QUOTES,'UTF-8'); ?></td>
          <td><?php echo htmlspecialchars($row['answer3'],ENT_QUOTES,'UTF-8'); ?></td>
        </tr>
        <?php
      }
      ?>

    </table>
    </body>

    </html>
