<?php
try {
$pdo = new PDO('mysql:host=localhost;dbname=g031o153;charset=utf8','g031o153','a04073486',
array(PDO::ATTR_EMULATE_PREPARES => false));
$username=$_POST["username"];
$password=$_POST["password"];

$stmt = $pdo -> prepare("INSERT INTO user (id, category, Question2, detail, answer2, answer3)
 VALUES (:id,:category,:Question2,:detail,:answer2,:answer3)");

$stmt->bindParam(':username', $id, PDO::PARAM_INT);
$stmt->bindParam(':password', $category, PDO::PARAM_STR);
$stmt->execute();

$statement = $pdo -> query("SELECT * FROM login");

$row_count = $statement->rowCount();

foreach ($statement as $row) {
  $rows[] = $row;
}
  } catch (PDOException $e) {
    exit('データベース接続失敗。'.$e->getMessage());
 }

?>
