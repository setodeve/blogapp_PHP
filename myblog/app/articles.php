<?php

function getALL($pdo){
  $sth = $pdo->query('SELECT * FROM articles ORDER BY id ') ;
  $articles = $sth->fetchall() ;
  return $articles ;
}

function create($pdo){
  $title = trim(filter_input(INPUT_POST, 'title'));
  $body = trim(filter_input(INPUT_POST, 'body'));
  if (($title === '')||($body === '')) {
    return;
  }

  $stmt = $pdo->prepare("INSERT INTO articles (title, body) VALUES (:title, :body)");
  $stmt->bindParam('title', $title, PDO::PARAM_STR);
  $stmt->bindParam('body', $body, PDO::PARAM_STR);
  $stmt->execute();
}

function delete($pdo)
{
  $id = filter_input(INPUT_POST, 'id');
  if (empty($id)) {
    return;
  }

  $stmt = $pdo->prepare("DELETE FROM articles WHERE id = :id");
  $stmt->bindValue('id', $id, PDO::PARAM_INT);
  $stmt->execute();
}


function edit($pdo){
  $id = filter_input(INPUT_POST, 'id');
  if (empty($id)) {
    return;
  }

  header('Location: update.php');  
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $action = filter_input(INPUT_GET, 'action');

  switch ($action) {
    case 'create':
      create($pdo);      
      break;
    case 'edit':
      edit($pdo);
      //header('Location: update.php');
      break;
    case 'delete':
      delete($pdo);
      break;
    default:
      exit;
  }

  if($action!=='edit') header('Location: index.php');
}

?>