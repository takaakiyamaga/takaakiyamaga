<?php
try {
  $pdo = new PDO('mysql:host=localhost;dbname=g031o153;charset=utf8','g031o153','a04073486',
  array(PDO::ATTR_EMULATE_PREPARES => false));

  $realanswer=$_POST["realanswer"];
  $id=$_POST["id"];
  $problemanswer=$_POST["problemanswer"];

  $stmt = $pdo -> prepare("INSERT INTO problemanswer (problemanswer)
  VALUES (:problemanswer)");
  $stmt->bindParam(':problemanswer', $problemanswer, PDO::PARAM_INT);

  $stmt->execute();

  $statement = $pdo -> query("SELECT * FROM problem INNER JOIN problemanswer
    ON problem.id = problemanswer.problem_id");

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
    <title>正誤入力画面</title>
  </head>
  <body>
    <h1>正誤入力画面</h1>
    <form action="p2.php" method="POST">
      <input type="hidden" name="realanswer" value="<?php echo $realanswer; ?>">
      正解：<br />
      <p><?php echo $realanswer; ?></p>
      <input type="hidden" name="problemanswer" value="<?php echo $problemanswer; ?>">
      あなたの回答：<br />
      <p><?php echo $problemanswer; ?></p>
      <input type="hidden" name="id" value="<?php echo $id; ?>">
      <input type="submit" value="登録する">
    </form>
  </body>
  </html>
