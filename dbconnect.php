<?php
  // mysql:host=ホスト名;dbname=データベース名;charset=文字エンコード
$dsn = '';

  // データベースのユーザー名
$user = '';

  // データベースのパスワード
$password = '';

// tryにPDOの処理を記述
try {
  // PDOインスタンスを生成
  $dbh = new PDO($dsn, $user, $password);
// エラー（例外）が発生した時の処理を記述
} catch (PDOException $e) {
              // エラーメッセージを表示させる
  echo 'データベースにアクセスできません！' . $e->getMessage();
  // 強制終了
  exit;
}
?>
