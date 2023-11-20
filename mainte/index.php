<?php

require 'db_connection.php';

// // ユーザー入力なし query
// $sql = 'select * from contacts where id = 2'; // sql
// $stmt = $pdo->query($sql); // sql実行 ステートメント　

// $result = $stmt->fetchAll(); // 取得

// echo '<pre>';
// var_dump($result);
// echo '</pre>';

// ユーザー入力あり prepare bind execute(SQLインジェクション対策)
$sql = 'select * from contacts where id = :id'; // 名前付きプレースホルダー
$stmt = $pdo->prepare($sql); // プリペアードステートメント
$stmt->bindValue('id', 3, PDO::PARAM_INT); // 紐付け
$stmt->execute(); // 実行

$result = $stmt->fetchAll(); // 取得

echo '<pre>';
var_dump($result);
echo '</pre>';

// トランザクション（まとまった処理をするときに必要）beginTransaction commit rollback
// 銀行にて 残高を確認→Aさんから引き落とし→Bさんに振込。これを1セットで行う必要がある（邪魔が入ってはいけない）

$pdo->beginTransaction(); // 開始

// sql処理
$stmt = $pdo->prepare($sql); // プリペアードステートメント
$stmt->bindValue('id', 3, PDO::PARAM_INT); // 紐付け
$stmt->execute(); // 実行

try {
    $pdo->commit();
} catch (PDOException $e) {
    $pdo->rollback(); // 更新キャンセル
}
