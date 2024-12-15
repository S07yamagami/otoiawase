<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>お問合せフォーム</title>
  <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>

  <div class="main">
    <div class="contact-form">
      <div class="form-title">お問い合わせ</div>
      <form method="post" action="sent.php">
        <div class="form-item">お名前</div>
        <input type="text" name="name" required>

        <div class="form-item">生年</div>
        <select name="age" required>
          <option value="未選択">選択してください</option>
          <?php 
          for ($i=1960; $i<=2010; $i++) {
            echo "<option value='{$i}'>{$i}</option>";
          }
          ?>
        </select>

        <div class="form-item">お問い合わせの種類</div>
        <?php 
          $types = array('料金', '使用方法', '保証内容', 'その他');
        ?>
        <select name="category" required>
          <option value="未選択">選択してください</option>
          <?php            
            foreach ($types as $type) {            
              echo "<option value='{$type}'>{$type}</option>";            
            }            
          ?>
        </select>
        
        <div class="form-item">お問合せ内容</div>
        <textarea name="body" required></textarea>

        <input type="submit" value="送信">
      </form>
    </div>
  </div>

</body>
</html>
