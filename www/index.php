<?php
require_once __DIR__ . '/../vendor/autoload.php';

$storage = new \Selaz\Helpmate\Storage('/app/data');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $storage->saveFile($_GET['name'],file_get_contents("php://input"),$_GET['session']);
} else {
    header('Content-type: application/json');
    echo $storage->getFile($_GET['name'],$_GET['session']);
}