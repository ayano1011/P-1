<?php
include('functions.php');
$pdo = connect_to_db();

$sql = 'SELECT * FROM recipe_name';

if ($age_data = $new_mysqli->query($sql)) {
 
// ②テーブルのデータをoptionタグに整形
foreach($age_data as $age_data_val){
    $age_data .= "<option value='". $age_data_val['age_val'];
    $age_data .= "'>". $age_data_val['age_data']. "</option>";
}
}


?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
</head>

<body>
  <form action="process_create.php" method="POST">
     <select name="process_kind">
      <option value="焼く">焼く</option>
      <option value="煮る">煮る</option>
      <option value="切る">切る</option>
    </select>

     <select name="process_kind">
      <option value="焼く">焼く</option>
      <option value="煮る">煮る</option>
      <option value="切る">切る</option>
    </select>
  <button class="submit">決定</button>

  </form>

</body>

</html>