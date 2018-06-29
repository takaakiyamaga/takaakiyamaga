<?php
try {
$pdo = new PDO('mysql:host=localhost;dbname=g031o153;charset=utf8','g031o153','a04073486',
array(PDO::ATTR_EMULATE_PREPARES => false));

$question=$_POST["question"];

$stmt = $pdo -> prepare("INSERT INTO question (question)
 VALUES (:question)");

$stmt->bindParam(':question', $question, PDO::PARAM_INT);
$stmt->execute();

$statement = $pdo -> query("SELECT * FROM question");

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
    <tr><th>質問</th></tr>
        <input type="hidden" name="question" value="<?php echo $question; ?>">
        <tr>
           <p><?php echo $question; ?></p>
        </tr>
    </body>

    </html>
