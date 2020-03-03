<?php
include 'config.php';
include 'classes/adapter/interface.adapter.php';
include 'classes/adapter/password.php';
include 'classes/adapter/vk.php';
include 'classes/adapter/google.php';
include 'classes/class.signup.factory.php';
include 'classes/class.signup.php';
include 'classes/class.db.php';

ini_set('display_errors', 'on');
error_reporting(E_ALL | E_NOTICE);