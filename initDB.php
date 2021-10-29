<?php

$host = "localhost";
$user = "root";
$pw = "";

$con = new mysqli($host, $user, $pw);

if ($con->connect_error) {
    die();
}

$all_sql = [
"DROP DATABASE IF EXISTS `forum`",
"CREATE DATABASE `forum` COLLATE utf8mb4_general_ci",
"CREATE TABLE `forum`.`users` ( `ID` INT UNSIGNED NOT NULL AUTO_INCREMENT , `username` VARCHAR(255) NOT NULL , `email` VARCHAR(255) NOT NULL , `pwd_hash` TEXT NOT NULL , PRIMARY KEY (`ID`)) ENGINE = InnoDB",
"CREATE TABLE `forum`.`entries` ( `ID` INT UNSIGNED NOT NULL AUTO_INCREMENT , `user_id` INT UNSIGNED NOT NULL , `date` DATE NOT NULL , `topic` TEXT NOT NULL , `content` TEXT NOT NULL , PRIMARY KEY (`ID`)) ENGINE = InnoDB",
"CREATE TABLE `forum`.`replies` ( `entry_id` INT UNSIGNED NOT NULL , `user_id` INT UNSIGNED NOT NULL , `date` DATE NOT NULL , `content` TEXT NOT NULL ) ENGINE = InnoDB"
];

for ($i = 0; $i < sizeof($all_sql); $i++) {
    $sql = $all_sql[$i];
    $res = $con->query($sql);
}

$con->close();

?>