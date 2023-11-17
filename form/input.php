<?php
if (!empty($_SESSION)) {
    echo ('<pre>');
    var_dump($_SESSION);
    echo ('</pre>');
}

session_start();

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

if (!empty($_POST['btn_confirm'])) {
    $pageFlag = 1;
}
if (!empty($_POST['btn_submit'])) {
    $pageFlag = 2;
}
?>

<!DOCTYPE html>
<meta charset="utf-8">

<head></head>

<body>

    <?php if ($pageFlag === 0) : ?>
        <?php
        // csrfで使用するトークンを設定
        if (!isset($_SESSION['csrfToken'])) {
            $csrfToken = bin2hex(random_bytes(32));
            $_SESSION['csrfToken'] = $csrfToken;
        }
        $token = $_SESSION['csrfToken'];
        ?>
        <form method="POST" action="input.php">
            ■氏名
            <input type="text" name="your_name" value="<?php if (!empty($_POST['your_name'])) {
                                                            echo h($_POST['your_name']);
                                                        } ?>">
            <br>
            ■メールアドレス
            <input type="email" name="email" value="<?php if (!empty($_POST['email'])) {
                                                        echo h($_POST['email']);
                                                    } ?>">
            <br>
            <input type="submit" name="btn_confirm" value="確認する">
            <input type="hidden" name="token" value="<?php echo $token; ?>">
            <!-- ■好きなスポーツ(複数選択可)
            <input type="checkbox" name="sports[]" value="野球">野球
            <input type="checkbox" name="sports[]" value="サッカー">サッカー
            <input type="checkbox" name="sports[]" value="テニス">テニス -->
        </form>
    <?php endif; ?>

    <?php if ($pageFlag === 1) : ?>
        <?php if ($_POST['token'] === $_SESSION['csrfToken']) :  ?>
            <form method="POST" action="input.php">
                ■氏名
                <?php echo h($_POST['your_name']); ?>
                <br>
                ■メールアドレス
                <?php echo h($_POST['email']); ?>
                <br>
                <input type="submit" name="back" value="戻る">
                <input type="submit" name="btn_submit" value="送信する">
                <input type="hidden" name="your_name" value="<?php echo h($_POST['your_name']); ?>">
                <input type="hidden" name="email" value="<?php echo h($_POST['email']); ?>">
                <input type="hidden" name="token" value="<?php echo $_POST['csrf']; ?>">
            </form>
        <?php endif; ?>
    <?php endif; ?>

    <?php if ($pageFlag === 2) : ?>
        <?php if ($_POST['token'] === $_SESSION['csrfToken']) :  ?>
            送信が完了しました。
            <?php unset($_SESSION['csrfToken']); ?>
        <?php endif; ?>
    <?php endif; ?>

</body>

</html>