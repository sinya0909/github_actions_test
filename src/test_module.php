<?php

try {
    $dsn = 'pgsql:host=172.18.0.10;port=5432;dbname=test_db';
    $username = 'postgres';
    $password = 'postgres';

    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // サンプルクエリ
    $query = $pdo->query('SELECT name FROM test_table WHERE age = 25 LIMIT 1');
    $result = $query->fetch(PDO::FETCH_ASSOC);

    if ($result && $result['name'] === 'Bob') {
        echo "Test module executed successfully!\n";
        print_r($result);
    } else {
        echo "Test module failed: Unexpected result.\n";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}