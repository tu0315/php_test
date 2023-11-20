<?php

function insertContact($request)
{
    // DB接続 PDO
    require 'db_connection.php';

    // 入力してDB保存 prepare execute（配列（全て文字列））
    $params = [
        'id' => null, // オートインクリメントなのでNULLでOK
        'your_name' => $request['your_name'],
        'email' => $request['email'],
        'url' => $request['url'],
        'gender' => $request['gender'],
        'age' => $request['age'],
        'contact' => $request['contact'],
        'created_at' => null
    ];
    $count = 0;
    $columns = '';
    $values = '';

    foreach (array_keys($params) as $key) {
        if ($count > 0) {
            $columns .= ',';
            $values .= ',';
        }
        $columns .= $key;
        $values .= ':' .  $key;
        $count++;
    }

    $sql = 'insert into contacts (' . $columns . ')values(' . $values . ')'; // 名前付きプレースホルダー

    $stmt = $pdo->prepare($sql); // プリペアードステートメント
    $stmt->execute($params); // 実行

}
