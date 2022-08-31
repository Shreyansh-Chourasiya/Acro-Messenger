<?php

define("DB_HOST", "localhost");
define("DB_NAME", "html_form");
define("DB_CHARSET", "utf8");
define("DB_USER", "Farm");
define("DB_PASSWORD", "t9pUSarBsEhs6G3F");

$error = NULL;
try {
  $pdo = new PDO(
    "mysql:host=" . DB_HOST . ";charset=" . DB_CHARSET . ";dbname=" . DB_NAME,
    DB_USER, DB_PASSWORD, [ 
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]
  );
} catch (Exception $ex) { $error = $ex->getMessage(); }

$msg = $_POST['msg'];
$username = $_POST['username'];
$time = $_POST['time'];
$room = $_POST['room'];
echo $msg;



if (is_null($error)) {
    try {
      $stmt = $pdo->prepare("INSERT INTO `data` (`from`, `message`, `Channel-No`,`time`) VALUES (?, ?, ?,?)");
      $stmt->execute([$username,$msg,$room,$time]);
    } catch (Exception $ex) { $error = $ex->getMessage(); }
  }