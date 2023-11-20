<?php

// MySQL接続ホスト8889のためlocalhostと記述
const DB_HOST = 'mysql:dbname=udemy_php;host=localhost;charset=utf8';
const DB_USER = 'php_user';
const DB_PASSWORD = 'password123';

// 例外処理
try {
    // DB接続
    $pdo = new PDO(DB_HOST, DB_USER, DB_PASSWORD, [
        // オプションを記述する
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // 連想配列で取得する
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // 例外
        PDO::ATTR_EMULATE_PREPARES => false, // 例外
        PDO::ATTR_EMULATE_PREPARES => false, // SQLインジェクション対策
    ]);
    echo '接続成功';
} catch (PDOException $e) {
    echo '接続失敗' . $e->getMessage() . "\n";
}
