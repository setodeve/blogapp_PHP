<?php

require_once('app/database.php') ;
require_once('app/config.php') ;

$pdo = setDB();

$action = filter_input(INPUT_GET, 'action');
if($action == 'update'){
  $id = filter_input(INPUT_POST, 'id');
  $title = filter_input(INPUT_POST, 'title');
  $body = filter_input(INPUT_POST, 'body');
  if (empty($title) || empty($body)) {
    return;
  }
  $stmt = $pdo->prepare("UPDATE articles SET title = :title, body = :body, updated_at = CURRENT_TIMESTAMP WHERE id = :id");
  $stmt->bindValue('id', $id, PDO::PARAM_INT);
  $stmt->bindValue('title', $title, PDO::PARAM_STR);
  $stmt->bindValue('body', $body, PDO::PARAM_STR);
  $stmt->execute();

  header('Location: index.php');  
}

if(!empty($_POST['id'])){
  $id = $_POST['id'] ;
  $stmt = $pdo->prepare('SELECT * FROM articles WHERE id = :id') ;
  $stmt->bindParam('id', $id);
  $stmt->execute();
  $article = $stmt->fetch() ;

  var_dump($article->body);
  
}

?>

<head>
  <meta charset="utf-8">
  <title>keiblog</title>
  <link rel="stylesheet" href="index.css">
</head>

<main>
  <form action="?action=update" method="post">
      <button class="create">更新</button>
      <input type="text" name="title" value="<?php echo htmlconvert($article->title)?>">
      <textarea name="body" cols="50" rows="5"><?php echo htmlconvert($article->body)?></textarea>
      <input type="hidden" name="id" value="<?= htmlconvert($article->id); ?>">
  </form>
</main>