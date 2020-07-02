<?php
// 送信データのチェック
// var_dump($_GET);
// $seibetu = $_POST["seibetu"];
// var_dump($seibetu);
// 関数ファイルの読み込み
include("functions.php");
// idの受け取り
$id = $_GET['id'];
// $seibetu = $_GET["seibetu"];
// exit();
// DB接続
$pdo = connect_to_db();
// データ取得SQL作成
$sql = 'SELECT * FROM customer_table WHERE id=:id';
// $sql = 'SELECT * FROM customer_table WHERE id=:id and seibetu="女"';
// var_dump($sql);
// exit();
// $seibetu = $_POST["seibetu"];
// $radioVal = 'SELECT * FROM customer_table WHERE id=:id and seibetu="女"';
// var_dump($radioVal);
// SQL準備&実行
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
// $stmt->bindValue(':seibetu', $seibetu, PDO::PARAM_INT);
$status = $stmt->execute();
// $seibetu = $_GET["seibetu"];
// var_dump($seibetu);
// データ登録処理後
if ($status == false) {
    // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    // 正常にSQLが実行された場合は指定の11レコードを取得
    // fetch()関数でSQLで取得したレコードを取得できる
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
    // var_dump($_GET);
    // exit();
}
$seibetu = $record["seibetu"];
var_dump($seibetu);
// exit();
// if (isset($_POST["seibetu"])) {
//   if ($_POST['seibetu'] === "男") {
//   echo '男';
//   } else {
//   echo '女';
//   }
//   var_dump($_POST["seibetu"]);
//   }
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>エステカウンセリングシート（編集画面）</title>
</head>

<body>
    <form action="todo_update_cus.php" method="POST">
        <fieldset>
            <legend>エステカウンセリングシート（編集画面）</legend>
            <a href="todo_read_cus.php">一覧画面</a>
            <h3>お客様情報</h3>
            <p>
                <div>カウンセリング日:<input type="date" name="date" value="<?= $record["date"] ?>"></div>
            </p>
            <!-- <p><div>お客様番号：<input type="text" name="id"></div></p> -->
            <p>
                <div>名前: <input type="text" name="namae" value="<?= $record["namae"] ?>"></div>
            </p>
            <p>
                <div>生年月日: <input type="text" name="birthday" value="<?= $record["birthday"] ?>"></div>
            </p>
            <p>
                <div>性別: <laber><input id="male" type="radio" name="seibetu" value="男" <?php if (!empty($seibetu) && $seibetu === "男") {
                                                                                            echo 'checked';
                                                                                        } ?>>男</laber>
                    <laber><input id="female" type="radio" name="seibetu" value="女" <?php if (!empty($seibetu) && $seibetu === "女") {
                                                                                        echo 'checked';
                                                                                    } ?>>女</laber>
                    <p>
                        <div>年齢: <input type="text" name="age" value="<?= $record["age"] ?>"></div>
                    </p>
                    <p>
                        <div>血液型: <input type="text" name="bloodtype" value="<?= $record["bloodtype"] ?>"></div>
                    </p>
                    <p>
                        <div>住所: <input type="text" name="jyusho" value="<?= $record["jyusho"] ?>"></div>
                    </p>
                    <p>
                        <div>電話番号: <input type="text" name="tel" value="<?= $record["tel"] ?>"></div>
                    </p>
                    <div class="formA">
                        <h3>お肌の悩み</h3>
                        <li><input type="checkbox" name="Choice[]" id="checkbox1" value="<?= $record["trb1"] ?>">
                            <label class="label1" for="checkbox1">肌荒れ</label>
                        </li>
                        <li><input type="checkbox" name="Choice[]" id="checkbox2" value="しわ">
                            <label class="label2" for="checkbox2">しわ</label>
                        </li>
                        <li><input type="checkbox" name="Choice[]" id="checkbox3" value="くすみ">
                            <label class="label3" for="checkbox3">くすみ</label>
                        </li>
                        <li><input type="checkbox" name="Choice[]" id="checkbox4" value="しみ">
                            <label class="label4" for="checkbox4">しみ</label>
                        </li>
                        <li><input type="checkbox" name="Choice[]" id="checkbox5" value="にきび">
                            <label class="label5" for="checkbox5">にきび</label>
                        </li>
                        <li><input type="checkbox" name="Choice[]" id="checkbox6" value="たるみ">
                            <label class="label6" for="checkbox6">たるみ</label>
                        </li>
                        <li><input type="checkbox" name="Choice[]" id="checkbox7" value="アトピー">
                            <label class="label7" for="checkbox7">アトピー</label>
                        </li>
                        <li><input type="checkbox" name="Choice[]" id="checkbox8" value="メイク崩れ">
                            <label class="label8" for="checkbox8">メイク崩れ</label>
                        </li>
                        <li><input type="checkbox" name="Choice[]" id="checkbox9" value="毛穴の開き">
                            <label class="label9" for="checkbox9">毛穴の開き</label>
                        </li>
                        <li><input type="checkbox" name="Choice[]" id="checkbox10" value="黒ずみ">
                            <label class="label10" for="checkbox10">黒ずみ</label>
                        </li>
                        <li><input type="checkbox" name="Choice[]" id="checkbox11" value="乾燥">
                            <label class="label12" for="checkbox11">乾燥</label>
                        </li>
                    </div>
                    <div class="formA">
                        <h3>自宅でのお手入れ</h3>
                        <p>朝🌞</p>
                        <li><input type="checkbox" name="Choice1[]" id="checkbox1" value="洗顔">
                            <label class="label1" for="checkbox1">洗顔</label>
                        </li>
                        <li><input type="checkbox" name="Choice1[]" id="checkbox2" value="化粧水">
                            <label class="label2" for="checkbox2">化粧水</label>
                        </li>
                        <li><input type="checkbox" name="Choice1[]" id="checkbox3" value="乳液">
                            <label class="label3" for="checkbox3">乳液</label>
                        </li>
                        <li><input type="checkbox" name="Choice1[]" id="checkbox4" value="美容液">
                            <label class="label4" for="checkbox4">美容液</label>
                        </li>
                        <li><input type="checkbox" name="Choice1[]" id="checkbox5" value="日焼け止め">
                            <label class="label5" for="checkbox5">日焼け止め</label>
                        </li>
                        <p>メイク💄</p>
                        <li><input type="checkbox" name="Choice2[]" id="checkbox6" value="ベース">
                            <label class="label6" for="checkbox6">ベース</label>
                        </li>
                        <li><input type="checkbox" name="Choice2[]" id="checkbox7" value="リキッドファンデ">
                            <label class="label7" for="checkbox7">リキッドファンデ</label>
                        </li>
                        <li><input type="checkbox" name="Choice2[]" id="checkbox8" value="固形ファンデ">
                            <label class="label8" for="checkbox8">固形ファンデ</label>
                        </li>
                        <li><input type="checkbox" name="Choice2[]" id="checkbox9" value="クッションファンデ">
                            <label class="label9" for="checkbox9">クッションファンデ</label>
                        </li>
                        <li><input type="checkbox" name="Choice2[]" id="checkbox10" value="パウダー">
                            <label class="label10" for="checkbox10">パウダー</label>
                        </li>
                        <li><input type="checkbox" name="Choice2[]" id="checkbox11" value="パウダー">
                            <label class="label10" for="checkbox11">ノーメイク</label>
                        </li>
                        <p>夜🌜</p>
                        <li><input type="checkbox" name="Choice3[]" id="checkbox12" value="クレンジング">
                            <label class="label12" for="checkbox12">クレンジング</label>
                        </li>
                        <li><input type="checkbox" name="Choice3[]" id="checkbox13" value="洗顔">
                            <label class="label1" for="checkbox13">洗顔</label>
                        </li>
                        <li><input type="checkbox" name="Choice3[]" id="checkbox14" value="化粧水">
                            <label class="label2" for="checkbox14">化粧水</label>
                        </li>
                        <li><input type="checkbox" name="Choice3[]" id="checkbox15" value="乳液">
                            <label class="label3" for="checkbox15">乳液</label>
                        </li>
                        <li><input type="checkbox" name="Choice3[]" id="checkbox16" value="美容液">
                            <label class="label4" for="checkbox16">美容液</label>
                        </li>
                        <li><input type="checkbox" name="Choice3[]" id="checkbox17" value="クリーム">
                            <label class="label5" for="checkbox17">クリーム</label>
                        </li>
                        <li><input type="checkbox" name="Choice3[]" id="checkbox18" value="パックなど">
                            <label class="label5" for="checkbox18">パックなど</label>
                        </li>
                    </div>
                    <div>
                        <h3>その他 </h3>
                        <div>エステティック経験:
                            <p><input type="radio" name="experience" value="ない">ない
                                <input type="radio" name="experience" value="あり">ある</p>
                        </div>
                        <div>アレルギー:
                            <p><input type="radio" name="experience1" value="ない">ない
                                <input type="radio" name="experience1" value="あり">ある</p>
                        </div>
                        <div>
                            <p>備考: <br>
                                <textarea type="textbox" name="detail" value=""></textarea></p>
                        </div>
                    </div>
                    <div>
                        <button>submit</button>
                    </div>
                    <input type="hidden" name="id" value="<?= $record["id"] ?>">
                    <!-- <input type="hidden" name="seibetu" value="<?php echo $_POST['seibetu']; ?>"> -->
        </fieldset>
    </form>
</body>

</html>