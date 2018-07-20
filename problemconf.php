<?php
try {
  $pdo = new PDO('mysql:host=localhost;dbname=g031o153;charset=utf8','g031o153','a04073486',
  array(PDO::ATTR_EMULATE_PREPARES => false));
  $problem=$_POST["problem"];
  $category=$_POST["category"];
  $realanswer=$_POST["realanswer"];
  $detail=$_POST["detail"];

} catch (PDOException $e) {
  exit('データベース接続失敗。'.$e->getMessage());
}
?>
<!DOCTYPE html>
<html lang = "ja">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" type="text/css"href="cssfil.css">
  <title>問題確認画面</title>
</head>
<body>
  <h1>
    <form action="problemrecord.php" method="POST">
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
      <input type="submit" value="送信" />
    </form>
    <form action="problem.php">
      <input type="submit" value="修正する" />
    </h1>
  </body>
  </html>
