<?php

// 送信データのチェック
// var_dump($_POST);
// exit();

// 関数ファイルの読み込み
include("functions.php");


// 送信データ受け取り
$id = $_POST['id'];
$shop_name = $_POST['shop_name'];
$ambiance = $_POST['ambiance'];
$facility = $_POST['facility'];
$convenience = $_POST['convenience'];
$comment = $_POST['comment'];


// print_r($comment);
// exit();

// DB接続
$pdo = connect_to_db();


// UPDATE文を作成&実行
$sql = "";
$sql = "UPDATE evaluation_table SET shop_name=:shop_name, ambiance=:ambiance, facility=:facility, convenience=:convenience, comment=:comment WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->bindValue(':shop_name', $shop_name, PDO::PARAM_STR);
$stmt->bindValue(':ambiance', $ambiance, PDO::PARAM_INT);
$stmt->bindValue(':facility', $facility, PDO::PARAM_INT);
$stmt->bindValue(':convenience', $convenience, PDO::PARAM_INT);
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);
$status = $stmt->execute();
// var_dump($sql);
// print_r($id);
// print_r($shop_name);
// print_r($ambiance);
// print_r($facility);
// print_r($ambiance);
// exit();





// データ登録処理後
if ($status == false) {
    // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    // 正常にSQLが実行された場合は一覧ページファイルに移動し，一覧ページの処理を実行する
    header("Location:todo_input.php");
    exit();
}
