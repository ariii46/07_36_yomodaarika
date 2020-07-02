<?php
// 送信データのチェック
// var_dump($_GET);
// exit();

// 関数ファイルの読み込み
include("functions.php");

// idの受け取り
$id = $_GET['id'];

// DB接続
$pdo = connect_to_db();

// データ取得SQL作成
$sql = 'SELECT * FROM evaluation_table WHERE id=:id';
// SQL準備&実行
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();




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
}

$shop_name = $record["shop_name"];
$ambiance = $record["ambiance"];
$facility = $record["facility"];
$convenience = $record["convenience"];
$comment = $record["comment"];



// var_dump($comment);
// exit();




?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>DB連携型todoリスト（編集画面）</title>
</head>

<body>
    <div class="question">
        <h1>編集</h1>
        <form action="todo_update.php" method="POST">
            <div class="question_text">



                <p>【どこに行った？】</p>
                <div class="question_box">
                    <label for="q1_one"><input type="radio" name="shop_name" id="q1_one" value="1" <?php if ($record["shop_name"] == 1) {
                                                                                                        $shop_name = "G's アカデミー"; {
                                                                                                            echo 'checked';
                                                                                                        }
                                                                                                    } ?>>G's アカデミー</label><br>
                    <label for="q1_two"><input type="radio" name="shop_name" id="q1_two" value="2" <?php if ($record["shop_name"] == 2) {
                                                                                                        $shop_name = "dot."; {
                                                                                                            echo 'checked';
                                                                                                        }
                                                                                                    } ?>>dot.</label><br>
                    <label for="q1_three"><input type="radio" name="shop_name" id="q1_three" value="3" <?php if ($record["shop_name"] == 3) {
                                                                                                            $shop_name = "スタートアップカフェ"; {
                                                                                                                echo 'checked';
                                                                                                            }
                                                                                                        } ?>>スタートアップカフェ</label><br>
                    <label for="q1_four"><input type="radio" name="shop_name" id="q1_four" value="4" <?php if ($record["shop_name"] == 4) {
                                                                                                            $shop_name = "エンジニアカフェ"; {
                                                                                                                echo 'checked';
                                                                                                            }
                                                                                                        } ?>>エンジニアカフェ</label><br>
                    <label for="q1_five"><input type="radio" name="shop_name" id="q1_five" value="5" <?php if ($record["shop_name"] == 5) {
                                                                                                            $shop_name = "フデバコ"; {
                                                                                                                echo 'checked';
                                                                                                            }
                                                                                                        } ?>>フデバコ</label><br>
                </div>




                <div>
                    <p>【雰囲気】</p>
                    <div class="question_star">
                        <label for="q1_one"><input type="radio" name="ambiance" id="q1_one" value="1" <?php if ($record["ambiance"] == 1) {
                                                                                                            $ambiance = "★☆☆☆☆"; {
                                                                                                                echo 'checked';
                                                                                                            }
                                                                                                        } ?>>★☆☆☆☆</label><br>
                        <label for="q1_two"><input type="radio" name="ambiance" id="q1_two" value="2" <?php if ($record["ambiance"] == 2) {
                                                                                                            $ambiance = "★★☆☆☆"; {
                                                                                                                echo 'checked';
                                                                                                            }
                                                                                                        } ?>>★★☆☆☆</label><br>
                        <label for="q1_three"><input type="radio" name="ambiance" id="q1_three" value="3" <?php if ($record["ambiance"] == 3) {
                                                                                                                $ambiance = "★★★☆☆"; {
                                                                                                                    echo 'checked';
                                                                                                                }
                                                                                                            } ?>>★★★☆☆</label><br>
                        <label for="q1_four"><input type="radio" name="ambiance" id="q1_four" value="4" <?php if ($record["ambiance"] == 4) {
                                                                                                            $ambiance = "★★★★☆"; {
                                                                                                                echo 'checked';
                                                                                                            }
                                                                                                        } ?>>★★★★☆</label><br>
                        <label for="q1_five"><input type="radio" name="ambiance" id="q1_five" value="5" <?php if ($record["ambiance"] == 5) {
                                                                                                            $ambiance = "★★★★★"; {
                                                                                                                echo 'checked';
                                                                                                            }
                                                                                                        } ?>>★★★★★</label><br>
                    </div>
                </div>
                <?php
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
                ?>

                <div>
                    <p>【設備】</p>
                    <div class="question_star">
                        <label for="q1_one"><input type="radio" name="facility" id="q1_one" value="1" <?php if ($record["facility"] == 1) {
                                                                                                            $facility = "★☆☆☆☆"; {
                                                                                                                echo 'checked';
                                                                                                            }
                                                                                                        } ?>>★☆☆☆☆</label><br>
                        <label for="q2_two"><input type="radio" name="facility" id="q2_two" value="2" <?php if ($record["facility"] == 2) {
                                                                                                            $facility = "★★☆☆☆"; {
                                                                                                                echo 'checked';
                                                                                                            }
                                                                                                        } ?>>★★☆☆☆</label><br>
                        <label for="q2_three"><input type="radio" name="facility" id="q2_three" value="3" <?php if ($record["facility"] == 3) {
                                                                                                                $facility = "★★★☆☆"; {
                                                                                                                    echo 'checked';
                                                                                                                }
                                                                                                            } ?>>★★★☆☆</label><br>
                        <label for="q2_four"><input type="radio" name="facility" id="q2_four" value="4" <?php if ($record["facility"] == 4) {
                                                                                                            $facility = "★★★★☆"; {
                                                                                                                echo 'checked';
                                                                                                            }
                                                                                                        } ?>>★★★★☆</label><br>
                        <label for="q2_five"><input type="radio" name="facility" id="q2_five" value="5" <?php if ($record["facility"] == 5) {
                                                                                                            $facility = "★★★★★"; {
                                                                                                                echo 'checked';
                                                                                                            }
                                                                                                        } ?>>★★★★★</label><br>
                    </div>
                </div>


                <div>
                    <p>【利便性】</p>
                    <div class="question_star">
                        <label for="q3_one"><input type="radio" name="convenience" id="q3_one" value="1" <?php if ($record["convenience"] == 1) {
                                                                                                                $convenience = "★☆☆☆☆"; {
                                                                                                                    echo 'checked';
                                                                                                                }
                                                                                                            } ?>>★☆☆☆☆</label><br>
                        <label for="q3_two"><input type="radio" name="convenience" id="q3_two" value="2" <?php if ($record["convenience"] == 2) {
                                                                                                                $convenience = "★★☆☆☆"; {
                                                                                                                    echo 'checked';
                                                                                                                }
                                                                                                            } ?>>★★☆☆☆</label><br>
                        <label for="q3_three"><input type="radio" name="convenience" id="q3_three" value="3" <?php if ($record["convenience"] == 3) {
                                                                                                                    $convenience = "★★★☆☆"; {
                                                                                                                        echo 'checked';
                                                                                                                    }
                                                                                                                } ?>>★★★☆☆</label><br>
                        <label for="q3_four"><input type="radio" name="convenience" id="q3_four" value="4" <?php if ($record["convenience"] == 4) {
                                                                                                                $convenience = "★★★★☆"; {
                                                                                                                    echo 'checked';
                                                                                                                }
                                                                                                            } ?>>★★★★☆</label><br>
                        <label for="q3_five"><input type="radio" name="convenience" id="q3_five" value="5" <?php if ($record["convenience"] == 5) {
                                                                                                                $convenience = "★★★★★"; {
                                                                                                                    echo 'checked';
                                                                                                                }
                                                                                                            } ?>>★★★★★</label><br>

                    </div>
                </div>


                <div class="btn_top">
                    <p>【レビュー】</p>
                    <!-- <input type="text" name="comment" style="width:200px; height:100px;" cols="40" rows="8"> -->
                    <textarea name="comment" id="" cols="30" rows="10" value="<?= $comment ?>"><?= $comment ?></textarea>
                </div>

                <!-- 送信ボタン -->
                <div>
                    <button class="btn">送信</button>
                </div>
                <input type="hidden" name="id" value="<?= $record['id'] ?>">


        </form>
    </div>
    </div>
    </div>