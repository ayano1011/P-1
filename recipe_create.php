<?php
// var_dump($_POST);
// exit();

// DB接続
include('functions.php');
$pdo = connect_to_db();


if (
  !isset($_POST['recipe_title']) || $_POST['recipe_title']=='' ||
  !isset($_POST['ingredient']) || $_POST['ingredient']==''||
  !isset($_POST['quantity']) || $_POST['quantity']==''||
    !isset($_POST['process_text']) || $_POST['process_text']==''||
  !isset($_POST['process_kind']) || $_POST['process_kind']==''||
  !isset($_POST['process_time']) || $_POST['process_time']==''
) {
  exit('ParamError');
}

// データの受け取り
$recipe_title = $_POST["recipe_title"];
$ingredient = $_POST["ingredient"];
$quantity = $_POST["quantity"];
$process_text= $_POST["process_text"];
$process_kind= $_POST["process_kind"];
$process_time= $_POST["process_time"];


$sql = 'INSERT ALL 
2 INTO recipe_name (recipe_title) VALUES (:recipe_title);
3 INTO ingredients (id,ingredient,quantity) VALUES (:recipe_title,:ingredient,:quantity)';

$stmt = $pdo->prepare($sql);

// バインド変数を設定
$stmt->bindValue(':recipe_title', $recipe_title, PDO::PARAM_STR);
$stmt->bindValue(':ingredient', $ingredient, PDO::PARAM_STR);
$stmt->bindValue(':quantity', $quantity, PDO::PARAM_STR);

// $stmt->bindValue(':process_text', $process_text, PDO::PARAM_STR);
// $stmt->bindValue(':process_kind', $process_kind, PDO::PARAM_STR);
// $stmt->bindValue(':process_time', $process_time, PDO::PARAM_STR);




// SQL実行（実行に失敗すると `sql error ...` が出力される）
try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}


header('Location:input.php');
exit();


?>