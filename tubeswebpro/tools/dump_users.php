<?php
$db = new PDO('sqlite:' . __DIR__ . '/../database/database.sqlite');
$stmt = $db->query('SELECT id, name, email, role, password FROM users');
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
if (!$rows) {
    echo "No users found\n";
    exit(0);
}
foreach ($rows as $r) {
    echo "id: {$r['id']} | name: {$r['name']} | email: {$r['email']} | role: {$r['role']} | password_hash: {$r['password']}\n";
}
