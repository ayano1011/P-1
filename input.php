


<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>入力画面</title>
    <link rel="stylesheet" href="input.css" />

</head>

<body>
  <div class="container">
  <form action="recipe_create.php" method="POST">
   <div>
      <div class="title">タイトル</div>
      <div>
      <input type="text" name="recipe_title">
      </div>
      <div class="ingredients">材料</div>
      <div id="ingredients-area" >
              <div id="ing-area" >

      <input type="text" name="ingredient" placeholder="玉ねぎ">
     
      <input type="text" name="quantity" placeholder="2個"><br>
     </div>
     </div>
      <input type="button" value="フォーム追加" onclick="addForm()">
      
      <div class="title">作り方</div>
      <div id="how-to-cook-area">
      1<input type="text" name="process_text">

      <div class="weight_input">
     <select name="process_kind">
      <option value="焼く">焼く</option>
      <option value="煮る">煮る</option>
      <option value="切る">切る</option>
    </select>
          <input type="number" name="process_time">分

    </div>
          </div>

    <input type="button" value="フォーム追加" onclick="addRecipe()">

      <div class="submit_area">
        <button class="submit">入力する</button>
      </div>
        <a href="read.php">グラフに戻る</a>
</div>
  </form>
</div>
<script>
  var i = 1 ;
function addForm() {
  var input_data = document.createElement('input');
  input_data.type = 'text';
  input_data.name = 'ingredient';
  var parent = document.getElementById('ingredients-area');
  parent.appendChild(input_data);
  var input_data2 = document.createElement('input');
  input_data2.type = 'text';
  input_data.name = 'quantity';
  var parent = document.getElementById('ingredients-area');
  parent.appendChild(input_data2);
    var br_data = document.createElement('br');
  var parent = document.getElementById('ingredients-area');
  parent.appendChild(br_data);

  i++ ;
}


  var x = 2 ;
function addRecipe() {
    var number_element = document.createElement('div');
    number_element.innerHTML = x;
var parent = document.getElementById('how-to-cook-area');
    parent.appendChild(number_element)

  var input_data3 = document.createElement('input');
  input_data3.type = 'text';
  var parent = document.getElementById('how-to-cook-area');
  parent.appendChild(input_data3);

    var select_data = document.createElement('select');
    const optS = document.createElement("option");
      //optionの属性を設定text value
      optS.text = "焼く";
      optS.value = "1";
            const optT = document.createElement("option");
      optT.text = "煮る";
      optT.value = "2";

      const optU = document.createElement("option");
      optU.text = "切る";
      optU.value = "3";
      //option子ノードを追加
      select_data.appendChild(optS);
      select_data.appendChild(optT);
      select_data.appendChild(optU);

  var parent = document.getElementById('how-to-cook-area');
  parent.appendChild(select_data);

  var input_data4 = document.createElement('input');
  input_data4.type = 'number';
  var parent = document.getElementById('how-to-cook-area');
  parent.appendChild(input_data4);
      var minutes_element = document.createElement('div');
    minutes_element.innerHTML = '分';
var parent = document.getElementById('how-to-cook-area');
    parent.appendChild(minutes_element)

    var br_data2 = document.createElement('br');
  var parent = document.getElementById('how-to-cook-area');
  parent.appendChild(br_data2);
  x++ ;
}



  </script>
</body>

</html>