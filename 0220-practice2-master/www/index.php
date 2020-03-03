<?php
include '../init.php';
include '../html/register.form.html';

$type = $_POST['reg_type'] ?? '';
if ($type) {
    try {
        $signup = SignupFactory::get($type);
        $signup->register($_POST);
    } catch (Exception $e) {
        echo '<pre>' . print_r($e->getTrace(), 1);
        die('cant register with error: ' . $e->getMessage());
    }
}

if (file_exists($_FILES['photo']['tmp_name'])) {
    move_uploaded_file($_FILES['photo']['tmp_name'], 'photos/' . $_FILES['photo']['name']);
}

