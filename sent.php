<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // フォームからのデータを取得
    $name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
    $age = htmlspecialchars($_POST['age'], ENT_QUOTES, 'UTF-8');
    $category = htmlspecialchars($_POST['category'], ENT_QUOTES, 'UTF-8');
    $body = htmlspecialchars($_POST['body'], ENT_QUOTES, 'UTF-8');
    
    // 現在の日付と時刻を取得
    $today = date('Y/m/d H:i');

    // 書き込む内容を整形
    $content = "お名前: $name\n生年: $age\nお問い合わせの種類: $category\nお問合せ内容:\n$body\n送信日時: $today\n\n";

    // data.txtファイルに書き込む
    file_put_contents('data.txt', $content, FILE_APPEND | LOCK_EX);

    // 入力内容を表示
    ?>
    <!DOCTYPE html>
    <html>
    <head>
      <meta charset="utf-8">
      <title>お問合せ内容</title>
      <link rel="stylesheet" type="text/css" href="stylesheet.css">
    </head>
    <body>
      <div class="main">
        <div class="display-contact">
          <div class="form-title">入力内容</div>

          <div class="form-item">■ お名前</div>
          <?php echo $name; ?>

          <div class="form-item">■ 生年</div>
          <?php echo $age; ?>

          <div class="form-item">■ お問い合わせの種類</div>
          <?php echo $category; ?>

          <div class="form-item">■ お問合せ内容</div>
          <?php echo nl2br($body); ?>

          <div class="form-item">■ 送信日時</div>
          <?php echo $today; ?>

        </div>
      </div>
    </body>
    </html>
    <?php
} else {
    echo "不正なリクエストです。";
}
?>
