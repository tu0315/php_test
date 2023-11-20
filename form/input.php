<?php
// if (!empty($_POST)) {
//     echo ('<pre>');
//     var_dump($_POST);
//     echo ('</pre>');
// }

// sessionの開始。sessionはGETやPOSTと違い、残しておける
session_start();

// バリデーション用ファイルを用意する
require 'validation.php';

// フレームオプションを無効化
header('X-FRAME-OPTIONS: DENY');

// XSS(JS対策)クリックジャッキング
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

// CSRF(SQLインジェクション)

// 入力・確認・完了 input confirm submit
$pageFlag = 0;

// 読み込ませたファイルのメソッドを使用する
$errors = validation($_POST);

if (!empty($_POST['btn_confirm']) && empty($errors)) {
    $pageFlag = 1;
}
if (!empty($_POST['btn_submit'])) {
    $pageFlag = 2;
}
?>

<!doctype html>
<html lang="ja">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>

    <?php if ($pageFlag === 0) : ?>
        <?php
        // csrfで使用するトークンを設定
        if (!isset($_SESSION['csrfToken'])) {
            echo 'csrfTokenセットされてません';
            $csrfToken = bin2hex(random_bytes(32));
            $_SESSION['csrfToken'] = $csrfToken;
        }
        $token = $_SESSION['csrfToken'];
        ?>

        <?php if (!empty($errors) && !empty($_POST['btn_confirm'])) : ?>
            <?php echo '<ul>'; ?>
            <?php foreach ($errors as $error) {
                echo '<li>' . $error . '</li>';
            } ?>
            <?php echo '</ ul>'; ?>
        <?php endif; ?>

        <div class="container">
            <div class="row">
                <div class="col_md_6">
                    <form method="POST" action="input.php">
                        <div class="form-group">
                            <label for="your_name">■氏名</label>
                            <input type="text" class="form_control" id="your_name" name="your_name" value="<?php if (!empty($_POST['your_name'])) {
                                                                                                                echo h($_POST['your_name']);
                                                                                                            } ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="email">■メールアドレス</label>
                            <input type="email" class="form_control" id="email" name="email" value="<?php if (!empty($_POST['email'])) {
                                                                                                        echo h($_POST['email']);
                                                                                                    } ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="url">■ホームページ</label>
                            <input type="url" class="form_control" id="url" name="url" value="<?php if (!empty($_POST['url'])) {
                                                                                                    echo h($_POST['url']);
                                                                                                } ?>">
                        </div>
                        ■性別
                        <div class="form_check form_check_inline">
                            <input type="radio" class="form_check_input" id="gender1" name="gender" value="0" <?php if (isset($_POST['gender']) && $_POST['gender'] === '0') {
                                                                                                                    echo 'checked';
                                                                                                                } ?>><label class="form_check_label" for="gender1">男性</label>
                            <input type="radio" class="form_check_input" id="gender2" name="gender" value="0" <?php if (isset($_POST['gender']) && $_POST['gender'] === '1') {
                                                                                                                    echo 'checked';
                                                                                                                } ?>><label class="form_check_label" for="gender2">女性</label>
                        </div>

                        <div class="form-group">
                            <label for="age">■年齢</label>
                            <select class="form_control" id="age" name="age">
                                <option value="">選択してください</option>
                                <option value="1" selected>〜19歳</option>
                                <option value="2">20歳〜29歳</option>
                                <option value="3">30歳〜39歳</option>
                                <option value="4">40歳〜49歳</option>
                                <option value="5">50歳〜59歳</option>
                                <option value="6">60歳〜</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="age">■お問い合わせ内容</label>
                            <textarea class="form_control" id="contact" rows="3" name="contact"><?php if (!empty($_POST['contact'])) {
                                                                                                    echo h($_POST['contact']);
                                                                                                } ?></textarea>
                        </div>

                        <div class="form_check">
                            <input class="form_check_input" id="caution" type="checkbox" name="caution" value="1">
                            <label class="form_check_input" for="caution">注意事項にチェックする</label>
                        </div>

                        <input class="btn btn_info" type="submit" name="btn_confirm" value="確認する">
                        <input type="hidden" name="csrf" value="<?php echo $token; ?>">

                    </form>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if ($pageFlag === 1) : ?>
        <?php if ($_POST['csrf'] === $_SESSION['csrfToken']) :  ?>
            <form method="POST" action="input.php">
                ■氏名
                <?php echo h($_POST['your_name']); ?>
                <br>

                ■メールアドレス
                <?php echo h($_POST['email']); ?>
                <br>

                ■ホームページ
                <?php echo h($_POST['url']); ?>
                <br>

                ■性別
                <?php if ($_POST['gender'] === "0") {
                    echo '男性';
                } ?>
                <?php if ($_POST['gender'] === "1") {
                    echo '女性';
                } ?>
                <br>

                ■年齢
                <?php if ($_POST['age'] === "1") {
                    echo '〜19歳';
                } ?>
                <?php if ($_POST['age'] === "2") {
                    echo '20歳〜29歳';
                } ?>
                <?php if ($_POST['age'] === "3") {
                    echo '30歳〜39歳';
                } ?>
                <?php if ($_POST['age'] === "4") {
                    echo '40歳〜49歳';
                } ?>
                <?php if ($_POST['age'] === "5") {
                    echo '50歳〜59歳';
                } ?>
                <?php if ($_POST['age'] === "6") {
                    echo '60歳〜';
                } ?>
                <br>

                ■お問い合わせ内容
                <?php echo h($_POST['contact']); ?>
                <br>

                <input type="submit" name="back" value="戻る">
                <input type="submit" name="btn_submit" value="送信する">
                <input type="hidden" name="your_name" value="<?php echo h($_POST['your_name']); ?>">
                <input type="hidden" name="email" value="<?php echo h($_POST['email']); ?>">
                <input type="hidden" name="url" value="<?php echo h($_POST['url']); ?>">
                <input type="hidden" name="gender" value="<?php echo h($_POST['gender']); ?>">
                <input type="hidden" name="age" value="<?php echo h($_POST['age']); ?>">
                <input type="hidden" name="contact" value="<?php echo h($_POST['contact']); ?>">
                <input type="hidden" name="csrf" value="<?php echo h($_POST['csrf']); ?>">
            </form>
        <?php endif; ?>
    <?php endif; ?>

    <?php if ($pageFlag === 2) : ?>
        <?php if ($_POST['csrf'] === $_SESSION['csrfToken']) :  ?>
            <?php
            require '../mainte/insert.php';
            insertContact($_POST);
            ?>
            送信が完了しました。
            <?php unset($_SESSION['csrfToken']); ?>
        <?php endif; ?>
    <?php endif; ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>