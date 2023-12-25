<?php

use Config\DB;

require __DIR__ . '/vendor/autoload.php';

$db = new DB();
$db->query('CREATE TABLE students (
    id int auto_increment primary key,
    name varchar(255) not null,
    age int not null
)');

$db->query('CREATE TABLE teachers (
    id int auto_increment primary key,
    name varchar(255) not null,
    age int not null,
    subject varchar(255)
)');