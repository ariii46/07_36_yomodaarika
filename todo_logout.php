<?php
// セッション使うので必ず記述
session_start(); // セッションの開始


// SESSIONを初期化（空にする）
$_SESSION = array(); // セッション変数を空の配列で上書き

// Cookieに保存してある"SessionIDの保存期間を過去にして破棄
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() - 42000, '/');
} // クッキーの保持期限を過去にする 

// サーバ側での、セッションIDの破棄
session_destroy();


// 処理後、index.phpへリダイレクト
header('Location:todo_login.php'); // ログインページヘ移動
exit();
