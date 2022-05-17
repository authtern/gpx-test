<?php

$db = array(
  'host' => 'localhost',
  'name' => 'testserver',
  'user' => 'testserver',
  'pass' => 'testserver',
);

$age = array();

$pdo = new PDO("mysql:host=".$db['host'].";dbname=".$db['name'], $db['user'], $db['pass']);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->exec("set names utf8");

unset($db);

$STM = $pdo->query("SELECT COUNT(*) FROM gpx WHERE genre = 'Male'");
$row = $STM->fetch(); $GENRE_MALE_COUNT = $row[0];
$STM = $pdo->query("SELECT COUNT(*) FROM gpx WHERE genre = 'Female'");
$row = $STM->fetch(); $GENRE_FEMALE_COUNT = $row[0];
$STM_ageASC = $pdo->query("SELECT * FROM gpx ORDER BY age LIMIT 5");
$STM_ageDESC = $pdo->query("SELECT * FROM gpx ORDER BY age DESC LIMIT 5");
$STM_allList = $pdo->query("SELECT * FROM gpx ORDER BY CustomerID");
$STM_age = $pdo->query("SELECT age FROM gpx ORDER BY age DESC");
while ($row = $STM_age->fetch())
{
  $age[$row[0]]++;
}
