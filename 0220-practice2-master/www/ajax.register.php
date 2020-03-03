<?php
include '../init.php';

//header('Content-type: application/json');

$type = $_POST['reg_type'] ?? '';
if ($type) {
    try {
        $signup = SignupFactory::get($type);
        $signup->register($_POST);
        echo json_encode(['result' => 'ok']);
    } catch (Exception $e) {
        echo json_encode(['result' => 'error', 'error' => 'cant register with error: ' . $e->getMessage()]);
    }
}
