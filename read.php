<?php

// DB接続
include('functions.php');
$pdo = connect_to_db();


$sql = 'SELECT * FROM recipe_name,ingredients';
$stmt = $pdo->prepare($sql);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
$output = "";
foreach ($result as $record) {
  $output .= "
    <tr>
      <td>{$record["recipe_title"]}</td>
      <td>{$record["ingredient"]}</td>
    </tr>
  ";
}

// $dateArray = array_column($result, "date");
// $weightArray = array_column($result, "weight");

// print_r($weightArray);

//  print_r ($record);
// echo $record["date"];

// //javascriptに渡す
// $jx = json_encode($dateArray);
// $jy = json_encode($weightArray);

?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Growth Chart</title>
  <link rel="stylesheet" href="read.css" />
</head>
<body>
   <?= $output ?>
  <div class="container">
  <div class="profile-area">
    <div class="profile-image">
    </div>
    <div class="profile-text">
    <div class="name-text">ひなた</div>
    <div class="age-text">１歳３ヶ月</div>
    </div>
          <a href="input.php">体重を記録</a>

  </div>
</div>
  <!-- 🔽 に<tr><td>deadline</td><td>todo</td><tr>の形でデータが入る -->
  <!-- <?= $output ?>  -->
  <canvas id="myLineChart" width="200" height="100"></canvas>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
 
<script>
//phpから値を受け取る
// let x = JSON.parse('<?php echo $jx; ?>');
// let y = JSON.parse('<?php echo $jy; ?>');
 
// //以下，グラフを表示
// var ctx = document.getElementById("myLineChart");
//   var myLineChart = new Chart(ctx, {
//     type: 'line',
//     data: {
//       labels: x,
//       datasets: [
//         {
//            label: '体重',
//           data: y,
//           borderColor: "rgba(255,0,0,1)",
//           backgroundColor: "rgba(0,0,0,0)"
//         },
//       ],
//     },
//     options: {
//       title: {
//         display: true,
//         // text: 'ひなちゃん'
//       },
//       scales: {
//         yAxes: [{
//           ticks: {
//             suggestedMax: 1600,
//             suggestedMin: 1000,
//             stepSize: 50,
//             callback: function(value, index, values){
//               return  value +  'g'
//             }
//           }
//         }]
//       },
//     }
//   });
  </script>
</body>
</html>

