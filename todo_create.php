<?php

// 送信確認
// var_dump($_POST);
// exit();

// 項目入力のチェック


// 値が存在しないor空で送信されてきた場合はNGにする

if (
  !isset($_POST['shop_name']) || $_POST['shop_name'] == '' ||
  !isset($_POST['ambiance']) || $_POST['ambiance'] == '' ||
  !isset($_POST['facility']) || $_POST['facility'] == '' ||
  !isset($_POST['convenience']) || $_POST['convenience'] == '' ||
  !isset($_POST['comment']) || $_POST['comment'] == ''
) {
  exit('ParamError');
}



// 受け取ったデータを変数に入れる
$id = $_POST['id'];
$shop_name = $_POST['shop_name'];
$ambiance = $_POST['ambiance'];
$facility = $_POST['facility'];
$convenience = $_POST['convenience'];
$comment = $_POST['comment'];



// DB接続の設定
// DB名は`gsacf_x00_00`にする
include('functions.php');
$pdo = connect_to_db();



// データ登録SQL作成
// `created_at`と`updated_at`には実行時の`sysdate()`関数を用いて実行時の日時を入力する

// SQL準備&実行
// SQL作成&実行
// 登録の処理
$sql = 'INSERT INTO evaluation_table(id,shop_name, ambiance, facility, convenience, comment)
          VALUES( :id, :shop_name, :ambiance, :facility, :convenience, :comment)';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->bindValue(':shop_name', $shop_name, PDO::PARAM_STR);
$stmt->bindValue(':ambiance', $ambiance, PDO::PARAM_STR);
$stmt->bindValue(':facility', $facility, PDO::PARAM_STR);
$stmt->bindValue(':convenience', $convenience, PDO::PARAM_STR);
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);

$status = $stmt->execute(); // SQLを実


// データ登録処理後

if ($status == false) {
  // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
  $error = $stmt->errorInfo();
  exit('sqlError:' . $error[2]);
} else {
  // 正常にSQLが実行された場合は入力ページファイルに移動し，入力ページの処理を実行する
  header('Location:todo_input.php');
}
