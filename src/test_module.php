<?php

try {
    $dsn = 'pgsql:host=172.18.0.10;port=5432;dbname=test_db';
    $username = 'postgres';
    $password = 'postgres';

    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // サンプルクエリ
    $query = $pdo->query('SELECT name FROM test_table WHERE age = 30 LIMIT 1');
    $result = $query->fetch(PDO::FETCH_ASSOC);

    if ($result && $result['name'] === 'Bob') {
        echo "Test module executed successfully!\n";
        print_r($result);
        exit(0); // 成功時の終了コード
    } else {
        echo "Test module failed: Unexpected result.\n";
        exit(1); // 失敗時の終了コード
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
    exit(1); // 例外発生時の終了コード
}