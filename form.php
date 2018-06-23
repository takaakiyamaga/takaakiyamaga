<!DOCTYPE html>
<html lang = "ja">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>問題追加画面</title>
    </head>
    <body>
        <form action="record.php" method="POST">
            カテゴリー：<br />
            <input type="text" name="category" size="50" value="" /><br />

            問題入力：<br />
            <textarea name="Question2" cols="50" rows="5"></textarea><br />

            解説入力：<br />
            <textarea name="detail" cols="50" rows="5"></textarea><br />

            回答：<br />
            <input type="text" name="answer2" size="50" value="" /><br />

            自分の回答：<br />
            <input type="text" name="answer3" size="50" value="" /><br />

            <br />

            <input type="submit" value="送信" />
        </form>
    </body>
</html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<?php
try {
$pdo = new PDO('mysql:host=localhost;dbname=g031o153;charset=utf8','test1','a04073486',
array(PDO::ATTR_EMULATE_PREPARES => false));
} catch (PDOException $e) {
      exit('データベース接続失敗。'.$e->getMessage());
    }
?>
</body>
</html>
