<?php

require_once('app/database.php') ;
require_once('app/config.php') ;
require_once('app/articles.php') ;

$pdo = setDB();

$articles = getALL($pdo);

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>keiblog</title>
  <link rel="stylesheet" href="index.css">
</head>
  <body>
    <main>
      <h1>Kei Blog</h1>
      <form action="?action=create" method="post">
        <button class="create">新規作成</button>
        <input type="text" name="title" placeholder="Type new title">
        <textarea name="body" placeholder="Type new body" cols="50" rows="5"></textarea>
      </form>
    <ul>
      <?php foreach($articles as $article) :?>
        <li>
          <div class="article">
            <div>title : <?php echo htmlconvert($article->title)?></div>
            <div>body : <?php echo htmlconvert($article->body)?></div>
          </div>
          <div class="btns">
            <form action="?action=delete" method="post">
              <button class="dele">削除</button>
              <input type="hidden" name="id" value="<?= htmlconvert($article->id); ?>">
            </form>
            <form action="update.php" method="post">
              <button class="edit">編集</button>
              <input type="hidden" name="id" value="<?= htmlconvert($article->id); ?>">
            </form>
          </div>
        </li>
      <?php endforeach?>
    </ul>
    </main>
  </body>
</html>