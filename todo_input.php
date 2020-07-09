<!-- 入力項目 -->
<!-- ここに情報を飛ばす -->
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <!-- <script src='./js/style.js'></script> -->
  <script src="./js/jquery-3.5.1.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=M+PLUS+Rounded+1c" rel="stylesheet">
  <title>workspece</title>
</head>

<body>
  <header class="sp_header">
    <div class="logo"><img src="img/logo2.png" height="60px" alt="workspace"></div>


    <!-- ハンバーガーボタン -->
    <div class="drawr_btn"><span></span><span></span><span></span></div>
    <!-- ハンバーガーボタン中身 -->
    <div class="drawr_content">
      <p class="drawr_content_text">- レビュー</p>
      <a href="">new review</a>
      <p class="drawr_content_text">- コワーキングスペース紹介</p>
      <a href="">coworking space</a>
      <p class="drawr_content_text">- アンケート</p>
      <a href="">questionary</a>
      <p class="drawr_content_text">- お問い合わせ</p>
      <a href="">contact</a>
      <p class="drawr_content_text">- ログアウト</p>
      <a href="todo_logout.php">logout</a>
    </div>

  </header>

  <div class="mainvisual">
    <div class="logo"><img src="img/mainvisual.jpg" width="100%" alt="workspace"></div>
    <div class="main_copy"></div>
  </div>

  <!-- <div class="space"></div> -->
  <div class="question">
    <form action="todo_create.php" method="POST">
      <div class="question_text">
        <p>【どこに行った？】</p>
        <div class="question_box">
          <input type="radio" name="shop_name" id="q1_one" value="1">
          <label for="q1_one"> G's アカデミー </label><br>
          <input type="radio" name="shop_name" id="q1_two" value="2">
          <label for="q1_two"> dot. </label><br>
          <input type="radio" name="shop_name" id="q1_three" value="3">
          <label for="q1_three"> スタートアップカフェ </label><br>
          <input type="radio" name="shop_name" id="q1_four" value="4">
          <label for="q1_four"> エンジニアカフェ </label><br>
          <input type="radio" name="shop_name" id="q1_five" value="5">
          <label for="q1_five"> フデバコ </label>
        </div>


        <div>
          <p>【雰囲気】</p>
          <div class="question_star">
            <input type="radio" name="ambiance" id="q1_one" value="1">
            <label for="q1_one"> ★☆☆☆☆ </label><br>
            <input type="radio" name="ambiance" id="q1_two" value="2">
            <label for="q1_two"> ★★☆☆☆ </label><br>
            <input type="radio" name="ambiance" id="q1_three" value="3">
            <label for="q1_three"> ★★★☆☆ </label><br>
            <input type="radio" name="ambiance" id="q1_four" value="4">
            <label for="q1_four"> ★★★★☆ </label><br>
            <input type="radio" name="ambiance" id="q1_five" value="5">
            <label for="q1_five"> ★★★★★ </label>
          </div>
        </div>

        <div>
          <p>【設備】</p>
          <div class="question_star">
            <input type="radio" name="facility" id="q2_one" value="1">
            <label for="q2_one"> ★☆☆☆☆ </label><br>
            <input type="radio" name="facility" id="q2_two" value="2">
            <label for="q2_two"> ★★☆☆☆ </label><br>
            <input type="radio" name="facility" id="q2_three" value="3">
            <label for="q2_three"> ★★★☆☆ </label><br>
            <input type="radio" name="facility" id="q2_four" value="4">
            <label for="q2_four"> ★★★★☆ </label><br>
            <input type="radio" name="facility" id="q2_five" value="5">
            <label for="q2_five"> ★★★★★ </label>
          </div>
        </div>


        <div>
          <p>【利便性】</p>
          <div class="question_star">

            <input type="radio" name="convenience" id="q3_one" value="1">
            <label for="q3_one"> ★☆☆☆☆ </label><br>
            <input type="radio" name="convenience" id="q3_two" value="2">
            <label for="q3_two"> ★★☆☆☆ </label><br>
            <input type="radio" name="convenience" id="q3_three" value="3">
            <label for="q3_three"> ★★★☆☆ </label><br>
            <input type="radio" name="convenience" id="q3_four" value="4">
            <label for="q3_four"> ★★★★☆ </label><br>
            <input type="radio" name="convenience" id="q3_five" value="5">
            <label for="q3_five"> ★★★★★ </label>
          </div>
        </div>


        <div class="btn_top">
          <p>【レビュー】</p>
          <!-- <input type="text" name="comment" style="width:200px; height:100px;" cols="40" rows="8"> -->
          <textarea name="comment" id="" cols="30" rows="10"></textarea>
        </div>

        <!-- 送信ボタン -->
        <div>
          <button class="btn">送信</button>
        </div>
    </form>
  </div>
  </div>



  <script>
    //ハンバーガー
    $('.drawr_btn').on('click', function() {
      $('.drawr_content').toggleClass('active');
      $('.drawr_btn').toggleClass('active');
    });
  </script>
</body>

</html>





<?php
include('functions.php');
$pdo = connect_to_db();


// 全部のカラムを取ってくる
$sql = 'SELECT * FROM evaluation_table';
// よくわかんないやつ SQLの準備
$stmt = $pdo->prepare($sql);

// sqlのじっこう
$status = $stmt->execute();


// 失敗時にエラーを出力
if ($status == false) {
  $error = $stmt->errorInfo();
  exit('sqlError:' . $error[2]);
} else {
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $output = "";
}

foreach ($result as $record) {
  // $output .= "レビュー";

  if ($record["shop_name"] == 1) {
    $shop_name = "G's アカデミー";
  } elseif ($record["shop_name"] == 2) {
    $shop_name = "dot.";
  } elseif ($record["shop_name"] == 3) {
    $shop_name = "スタートアップカフェ";
  } elseif ($record["shop_name"] == 4) {
    $shop_name = "エンジニアカフェ";
  } elseif ($record["shop_name"] == 5) {
    $shop_name = "フデバコ";
  }


  if ($record["ambiance"] == 1) {
    $ambiance = "★☆☆☆☆";
  } elseif ($record["ambiance"] == 2) {
    $ambiance = "★★☆☆☆";
  } elseif ($record["ambiance"] == 3) {
    $ambiance = "★★★☆☆";
  } elseif ($record["ambiance"] == 4) {
    $ambiance = "★★★★☆";
  } elseif ($record["ambiance"] == 5) {
    $ambiance = "★★★★★";
  }


  if ($record["facility"] == 1) {
    $facility = "★☆☆☆☆";
  } elseif ($record["facility"] == 2) {
    $facility = "★★☆☆☆";
  } elseif ($record["facility"] == 3) {
    $facility = "★★★☆☆";
  } elseif ($record["facility"] == 4) {
    $facility = "★★★★☆";
  } elseif ($record["facility"] == 5) {
    $facility = "★★★★★";
  }

  if ($record["convenience"] == 1) {
    $convenience = "★☆☆☆☆";
  } elseif ($record["convenience"] == 2) {
    $convenience = "★★☆☆☆";
  } elseif ($record["convenience"] == 3) {
    $convenience = "★★★☆☆";
  } elseif ($record["convenience"] == 4) {
    $convenience = "★★★★☆";
  } elseif ($record["convenience"] == 5) {
    $convenience = "★★★★★";
  }



  $output .= "<div class='item'>
  <div class='name'><span>{$shop_name}</span></div>
  <div><a href='todo_edit.php?id={$record["id"]}'>修正</a></div>
  <div><a href='todo_delete.php?id={$record["id"]}'>削除</a></div>
  <ul>
    <li>雰囲気:<span>{$ambiance}</span></li>
    <li>設備:<span>{$facility}</span></li>
    <li>利便性:<span>{$convenience}</span></li>
  </ul>
  <div class='txt_box'>{$record['comment']} </div>
</div>";
}
?>



<div class="display">
  <div>【一覧はこちら】</div>
  <?= $output ?>
</div>

<div class="footer">
  <a href="#">TOP</a>
</div>



<style>
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    list-style: none;
  }

  .display {
    max-width: 500px;
    margin: auto;
    padding: 10px;
  }

  .display .item {
    border: solid 1px #aaa;
    padding: 20px;
    border-radius: 10px;
    margin-bottom: 20px;
  }

  .display .item .name {
    font-size: 14px;
    margin-bottom: 5px;
  }

  .display .item .name span {
    font-size: 16px;
    font-weight: bold;
  }

  .display .item ul {
    display: flex;
    flex-wrap: wrap;
    border-bottom: solid 1px #aaa;
    padding-bottom: 10px;
    margin-bottom: 10px;
  }

  .display .item ul li {
    font-size: 14px;
    color: #555;
    margin-right: 10px;
  }

  .display .item ul li span {
    font-size: 18px;
    color: #f7ae05;
    padding-left: 5px;
  }

  .display .item .txt_box .title {
    font-size: 14px;
    color: #555;
  }

  .display .item .txt_box {
    line-height: 2;
    white-space: pre-wrap;
  }

  .footer {
    text-align: center;
    text-decoration: none;
    font-size: 18px;
    padding: 20px;
  }
</style>