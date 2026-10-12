<?php
$host = '127.0.0.1';
$db   = 'tubeswebpro';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (Exception $e) {
    echo "DB connect error: " . $e->getMessage() . "\n";
    exit(1);
}
$stmt = $pdo->query('SELECT id, name, email, role, password FROM users');
$rows = $stmt->fetchAll();
if (!$rows) {
    echo "No users found\n";
    exit(0);
}
foreach ($rows as $r) {
    echo "id: {$r['id']} | name: {$r['name']} | email: {$r['email']} | role: {$r['role']} | password_hash: {$r['password']}\n";
}
