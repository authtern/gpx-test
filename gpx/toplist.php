<?php
  require 'db.php';
?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>gpx test</title>

  <link rel="stylesheet" href="public/styles/styles.css">
</head>
<body>
  <header>
    <ol>
      <li><a href='index.php'>charts</a></li>
      <li><a href='toplist.php'>toplist</a></li>
      <li><a href='list.php'>list</a></li>
    </ol>
  </header>
  <main>
    <h1>Task 3</h1>
    <table>
      <thead>
              <tr>
                  <th>CustomerID</th>
                  <th>Age</th>
              </tr>
          </thead>
            <tbody>
              <?php
                while ($row = $STM_ageASC->fetch())
                {
                ?>
                  <tr>
                    <td><?=$row[0]?></td>
                    <td><?=$row[2]?></td>
                  </tr>
                <?php
                }
                ?>
            </tbody>
    </table>
    <h1>Task 4</h1>
    <table>
      <thead>
              <tr>
                  <th>CustomerID</th>
                  <th>Age</th>
              </tr>
          </thead>
            <tbody>
              <?php
                while ($row = $STM_ageDESC->fetch())
                {
                ?>
                  <tr>
                    <td><?=$row[0]?></td>
                    <td><?=$row[2]?></td>
                  </tr>
                <?php
                }
                ?>
            </tbody>
    </table>
  </main>
</body>
</html>
