<?php
try {
  $pdo = new PDO('mysql:host=localhost;dbname=g031o153;charset=utf8','g031o153','a04073486',
  array(PDO::ATTR_EMULATE_PREPARES => false));

  $username=$_POST["username"];
  $password=$_POST["password"];

  $stmt = $pdo -> prepare("INSERT INTO users(username,password)
  VALUES (:username,:password)");

  $stmt->bindParam(':username', $username, PDO::PARAM_INT);
  $stmt->bindParam(':password', $password, PDO::PARAM_STR);
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
