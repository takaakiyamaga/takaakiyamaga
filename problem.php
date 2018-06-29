<?php
$arr = array(
    0 => '選択してください'
    , '関係代名詞' => '関係代名詞'
    , '五文型' => '五文型'
    , '関係副詞' => '関係副詞'
    , '受動態' => '受動態'
);
?>
<!DOCTYPE html>
<html lang = "ja">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css"href="cssfil.css">
        <title>問題作成画面</title>
    </head>
    <body>
      <h1>
        <form action="problemconf.php" method="POST">
          　ジャンル・カテゴリ:<br />
          <select name="category">
            <?php
     foreach($arr as $a=>$b){
     echo "<option value = \"{$a}\">{$b}</option>";
 } ?>
         </select>
            問題内容：<br />
            <input type="text" style="width:45em;height:20em" name="question2" size="90" value="" /><br />
            回答：<br />
            <input type="text" style="width:45em;height:5em" name="answer2" size="90" value="" /><br />
            解説：<br />
            <input type="text" style="width:45em;height:20em" name="detail" size="90" value="" /><br />
            <input type="submit" value="送信" />
        </form>
      </h1>
    </body>
</html>
