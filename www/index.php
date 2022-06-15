<?php
require_once __DIR__ . '/../vendor/autoload.php';

$storage = new \Selaz\Helpmate\Storage('/app/data');

header('Content-type: application/json');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo $storage->saveFile($_GET['name'],file_get_contents("php://input"),$_GET['session']);
} else {
    echo $storage->getFile($_GET['name'] ?? '',$_GET['session'] ?? '');
}