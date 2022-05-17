<?php
  require_once 'db.php';

  if(isset($_POST['remove_id'])) {
    $STM = $pdo->prepare("DELETE FROM gpx WHERE CustomerID = ?");
    $STM->execute([$_POST['remove_id']]);
  }

  if(isset($_POST['genre']) && isset($_POST['age']) && isset($_POST['annual']) && isset($_POST['score'])) {
    $STM = $pdo->prepare("INSERT INTO gpx (Genre, Age, Annual_Income_k, Spending_Score_1100) VALUES (?, ?, ?, ?)");
    $STM->execute([$_POST['genre'], $_POST['age'], $_POST['annual'], $_POST['score']]);
  }
