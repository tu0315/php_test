<!DOCTYPE html>

<head>気軽に試せるPHPテスト環境</head>

<body>
    <h1>PHPテスト環境</h1>
    <?php

    // echo ('PHPです!');
    // echo ('<br>');
    // echo ('PHPです!!');
    // phpinfo();

    // $test_1 = 123;
    // $test_2 = 456;
    // $test_3 = $test_1 . $test_2;

    // 変数デバックはvar_dump()で
    // var_dump($test_3);

    // 定数constantは全て大文字
    // const MAX = 100;
    // echo MAX;

    // // 1行の配列
    // $array_1 = ['aaa', 2, 3];

    // // 2行の配列
    // $array_2 = [
    //     ['赤', '青', '黄'],
    //     ['緑', '紫', '黒']
    // ];

    // echo '<pre>';
    // var_dump($array_1);
    // echo '</pre>';

    // echo '<pre>';
    // var_dump($array_2);
    // echo '</pre>';

    // echo $array_2[1][1];

    // // 連想配列（文字列がキーになっている配列）
    // $array_member = [
    //     'name' => '本田',
    //     'height' => 170,
    //     'hobby' => 'サッカー'
    // ];

    // echo '<pre>';
    // var_dump($array_member);
    // echo '</pre>';

    // echo $array_member['hobby'];

    // $array_member_2 = [
    //     '本田' => [
    //         'height' => 170,
    //         'hobby' => 'サッカー'
    //     ],
    //     '香川' => [
    //         'height' => 165,
    //         'hobby' => 'ゲーム'
    //     ],
    // ];

    // echo '<pre>';
    // var_dump($array_member_2['本田']);
    // var_dump($array_member_2['香川']['hobby']);
    // echo '</pre>';

    // $array_member_3 = [
    //     '1組' => [
    //         '本田' => [
    //             'height' => 170,
    //             'hobby' => 'サッカー'
    //         ],
    //         '長友' => [
    //             'height' => 195,
    //             'hobby' => 'サッカー'
    //         ],
    //     ],
    //     '2組' => [
    //         '香川' => [
    //             'height' => 165,
    //             'hobby' => 'ゲーム'
    //         ],
    //     ],
    // ];

    // echo '<pre>';
    // var_dump($array_member_3['1組']);
    // var_dump($array_member_3['2組']['香川']);
    // var_dump($array_member_3['2組']['香川']['height']);
    // echo '</pre>';

    // // 演算子
    // $num_1 = 3;
    // $num_2 = 2;

    // $sum = $num_1 + $num_2;
    // $minus = $num_1 - $num_2;
    // $kake = $num_1 * $num_2;
    // $wari = $num_1 / $num_2;
    // $amari = $num_1 % $num_2;

    // echo '足し算は' . $sum;
    // echo ('<br>');
    // echo '引き算は' . $minus;
    // echo ('<br>');
    // echo 'かけ算は' . $kake;
    // echo ('<br>');
    // echo 'わり算は' . $wari;
    // echo ('<br>');
    // echo '余りは' . $amari;

    // // if分岐
    // $height = 90;

    // if ($height === 91) {
    //     echo ('身長は' . $height . 'cmです。');
    // } else {
    //     echo ('身長は' . $height . 'cmではありません。');
    // }

    // // == 一致
    // // === 型も比較

    // $signal = 'blue';

    // if ($signal === 'red') {
    //     echo ('止まれ');
    // } elseif ($signal === 'yellow') {
    //     echo ('一旦停止');
    // } else {
    //     echo ('進む');
    // }

    // echo ('<br>');

    // $speed = 60;

    // if ($signal === 'blue') {
    //     if ($speed >= 80) { // ネスト（ifの中にif、分かりにくくなるので非推奨）
    //         echo ('スピード違反。');
    //     } else {
    //         echo ('OK!');
    //     }
    // }

    // // データが含まれているかチェックする
    // // isset empty isnull
    // $test = 'hoge';

    // if (empty($test)) {
    //     echo ('$testは空です。');
    // } else {
    //     echo ('$testは' . $test . 'です。');
    // }

    // echo ('<br>');

    // // 否定のemptyでシンプルに判定する
    // if (!empty($test)) {
    //     echo ('変数は空ではありません。');
    // }

    // echo ('<br>');

    // // ANDとOR
    // $signal_1 = 'red';
    // $signal_2 = 'blue';

    // if ($signal_1 = 'red' && $signal_2 = 'blue') {
    //     echo ('赤と青です。');
    // }

    // echo ('<br>');

    // if ($signal_1 = 'red' || $signal_2 = 'blue') {
    //     echo ('赤または青です。');
    // }

    // // 三項演算子
    // // 条件 ? 真 : 偽
    // // 一行で判定できる!

    // $math = 80;
    // $comment = $math > 80 ? 'good' : 'not good';
    // echo $comment;

    // // 複数の値をforeachで表示する
    // $members = [
    //     'name' => '本田',
    //     'height' => 180,
    //     'hobby' => 'サッカー'
    // ];

    // // バリューのみ表示する
    // foreach ($members as $member) {
    //     echo ($member);
    //     echo ('<br>');
    // }

    // // キーとバリューを表示する
    // foreach ($members as $key => $value) {
    //     echo ($key . 'は、' . $value . 'です。');
    //     echo ('<br>');
    // }

    // // 連想配列をforeachで取得する
    // $members_2 = [
    //     '本田' => [
    //         'height' => 180,
    //         'hobby' => 'サッカー'
    //     ],
    //     '香川' => [
    //         'height' => 170,
    //         'hobby' => 'ゲーム'
    //     ],
    // ];

    // foreach ($members_2 as $member_1) {
    //     var_dump($member_1);
    //     echo ('<br>');
    //     foreach ($member_1 as $key => $value) {
    //         echo ($key . 'は、' . $value . 'です。');
    //         echo ('<br>');
    //     }
    // }

    // // for文（繰り返す数が決まっている）
    // for ($i = 0; $i < 10; $i++) {
    //     // 途中で止める
    //     if ($i === 5) {
    //         break;
    //     }

    //     // スキップする
    //     if ($i == 3) {
    //         continue;
    //     }

    //     echo $i;
    //     echo ('<br>');
    // }

    // // while文（繰り返す数が決まっていない）
    // $a = 0;
    // while ($a < 5) {
    //     echo $a;
    //     echo ('<br>');
    //     $a++;
    // }

    // // switch文(if文を推奨)
    // $num = 4;

    // switch ($num) {
    //     case 1:
    //         echo ('1です。');
    //         break;
    //     case 2:
    //         echo ('2です。');
    //         break;
    //     case 3:
    //         echo ('3です。');
    //         break;
    //     default:
    //         echo ('1〜3ではなく、' . $num . 'です。');
    //         break;
    // }

    // $num = "2";

    // // switchはそのままでは型判定ができないので、一工夫する。
    // switch ($num) {
    //     case 1:
    //         echo ('1です。');
    //         break;
    //     case $num === 2:
    //         echo ('2です。');
    //         break;
    //     case 3:
    //         echo ('3です。');
    //         break;
    //     default:
    //         echo ('1〜3ではなく、' . $num . 'です。<br>
    //         または文字列の1〜3です。');
    //         break;
    // }

    // // 基本的にswitch文は使用しない。

    // // ユーザー定義関数(メソッドのこと)を作ってみよう!

    // // ①インプット引数なし、アウトプット戻り値なしのパターン
    // function test()
    // {
    //     echo 'メソッドでtestを出力';
    // }

    // // 使ってみる
    // test();

    // // ②インプット引数あり、アウトプット戻り値なしのパターン
    // function getComment($string)
    // {
    //     echo $string;
    // }

    // // 引数を用意して使い回してみる
    // $comment_1 = 'コメント1';
    // $comment_2 = 'コメント2';

    // getComment($comment_1);
    // getComment($comment_2);

    // // ③インプット引数なし、アウトプット戻り値ありのパターン

    // function getNumberOfComment()
    // {
    //     return 4;
    // }

    // // echoで出力したり、変数に格納したりする
    // echo getNumberOfComment();
    // $numberComment = getNumberOfComment();
    // echo $numberComment;

    // // ④インプット引数あり、アウトプット戻り値ありのパターン
    // function getSum($num_1, $num_2)
    // {
    //     $sum = $num_1 + $num_2;
    //     return $sum;
    // }

    // // 引数を用意して使ってみる、または変数に格納して出力する
    // echo (getSum(3, 4));
    // $total = getSum(5, 4);
    // echo $total;

    // 組み込み関数(デフォで用意されてる関数)を使ってみる

    // // 文字列の長さ(マルチバイトには非対応)
    // echo strlen('abcdefg');
    // echo strlen('こんにちは');
    // // マルチバイトに対応
    // echo mb_strlen('こんにちは');

    // // 文字列の置換
    // $str = '文字列を置換します。';

    // echo str_replace('置換', 'ちかん', $str);

    // $phrase  = "You should eat fruits, vegetables, and fiber every day.";
    // echo $phrase . '<br>';
    // $healthy = array("fruits", "vegetables", "fiber");
    // $yummy   = array("pizza", "beer", "ice cream");
    // $newphrase = str_replace($healthy, $yummy, $phrase);
    // echo ($newphrase);

    // 指定文字列での分割
    // $str_2 = '指定文字列で、分割します';

    // echo ('<pre>');
    // var_dump(explode('、', $str_2));
    // echo ('</pre>');
    // $pizza  = "piece1,piece2,piece3,piece4,piece5,piece6";
    // $pieces = explode(",", $pizza);
    // var_dump($pieces);
    // echo $pieces[0]; // piece1
    // echo $pieces[2]; // piece3

    // // 正規表現(郵便番号やメールアドレスの確認で使用する)
    // $telephoneNumber_1 = '080-1234-5678';
    // $telephoneNumber_2 = '010-1234-5678';

    // // 正しい電話番号かチェックするメソッド
    // function checkTelephoneNumber($telephoneNumber)
    // {
    //     if (preg_match('/^0[7-9]0-[0-9]{4}-[0-9]{4}$/', $telephoneNumber)) {
    //         // 文字列が電話番号（ハイフンあり）である場合
    //         echo ('正しい電話番号です。');
    //     } else {
    //         // 文字列が電話番号（ハイフンあり）でない場合
    //         echo ('間違った電話番号です。');
    //     }
    // }
    // checkTelephoneNumber($telephoneNumber_1);
    // checkTelephoneNumber($telephoneNumber_2);

    // // 郵便番号も確認してみる
    // // https://qiita.com/maca12vel/items/5c37250bbc7f80bdd9b3
    // $address_1 = '0090ー1234';
    // $address_2 = '１２３−４５６７';

    // function checkAddress($address)
    // {
    //     $mb_address = mb_convert_kana($address, 'a', 'UTF-8');
    //     if (preg_match('/\A\d{3}[-]\d{4}\z/', $mb_address)) {
    //         // 文字列が郵便番号（ハイフンあり）である場合
    //         echo ('郵便番号：〒' . $mb_address);
    //     } else {
    //         // 文字列が郵便番号（ハイフンあり）でない場合
    //         echo ('〒' . $mb_address . 'は間違った郵便番号です。');
    //     }
    // }
    // checkAddress($address_1);
    // checkAddress($address_2);

    // $rest = substr("abcdef", -1);    // "f" を返す
    // echo $rest . '<br>';
    // $rest = substr("abcdef", -2);    // "ef" を返す
    // echo $rest . '<br>';
    // $rest = substr("abcdef", -3, 1); // "d" を返す
    // echo $rest . '<br>';

    // 図解でわかるPHP配列関数一覧 http://html2php.starrypages.net/php/array-funcs
    // $stack = array("orange", "banana");
    // array_push($stack, "apple", "raspberry"); // 配列に要素を追加する
    // print_r($stack);

    // // 外部ファイルから変数や関数を読み込む
    // require('common/common.php');
    // echo $commonVariable;
    // echo commonTest();

    // echo __DIR__;
    ?>
</body>