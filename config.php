<?php
$config['db']['dsn']='mysql:host=localhost;dbname=bicycle;charset=utf8';
$config['db']['user'] = 'root';
$config['db']['password'] = '';

$db = new PDO(
    $config['db']['dsn'],
    $config['db']['user'],
    $config['db']['password'],
    array(
        PDO::ATTR_EMULATE_PREPARES=>false,
        PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION
    )
);
?>