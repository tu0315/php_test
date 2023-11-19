<?php
// // パスワードを記録したファイルの場所
// echo __FILE__;
// // /Applications/MAMP/htdocs/php_test/mainte/test.php

// echo ('<br>');
// // パスワードを暗号化する
// echo (password_hash('password123', PASSWORD_BCRYPT));
// // $2y$10$yEh8ABBw0Zl7X.f.es7Iu..9eabv9zxh28C3qxZNjnv/VvGxmWwGC

// echo ('<br>');
// // ファイル操作
// // ①ファイルまるごと読み込み
$contactFile = '.contact.dat';

$fileContents = file_get_contents($contactFile);

// echo $fileContents;

// // ファイル書き込み(上書き)
// // file_put_contents($contactFile, 'テストです');

// $addText = 'テストです' . "\n";

// // ファイル書き込み(追記まで行う)
// file_put_contents($contactFile, $addText, FILE_APPEND);

// // 配列 file、区切る explode foreach
// $allData = file($contactFile);

// foreach ($allData as $lineData) {
//     $lines = explode(',', $lineData);
//     echo $lines[0] . '<br>';
//     echo $lines[1] . '<br>';
//     echo $lines[2] . '<br>';
// }

// 開く
$contents = fopen($contactFile, 'a+');

$addText = '1行追記' . "\n";

// 書き込む
fwrite($contents, $addText);

// 閉じる　
fclose($contents);
