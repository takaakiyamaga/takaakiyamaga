<?php
try {
  $pdo = new PDO('mysql:host=localhost;dbname=g031o153;charset=utf8','g031o153','a04073486',
  array(PDO::ATTR_EMULATE_PREPARES => false));
  $question=$_POST["question"];
} catch (PDOException $e) {
  exit('データベース接続失敗。'.$e->getMessage());
}
?>
<!DOCTYPE html>
<html lang = "ja">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" type="text/css"href="cssfil.css">
  <title>質問確認画面</title>
</head>
<body>
  <h1>
    <form action="questionrecord.php" method="POST">
      <input type="hidden" name="question" value="<?php echo $question; ?>">
      質問内容：<br />
      <p><?php echo $question; ?></p>
      <input type="submit" value="送信" />
    </form>
    <form action="question.php">
      <input type="submit" value="修正する" />
    </h1>
  </body>
  </html>
