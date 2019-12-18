<?php
session_start();
$config = array(
    'host' => 'mysql',
    'user' => 'root',
    'pass' => 'root',
    'db' => 'test'
);
$db = new mysqli($config['host'], $config['user'], $config['pass'], $config['db']);
if (mysqli_connect_error()) {
    die(mysqli_connect_error());
}
