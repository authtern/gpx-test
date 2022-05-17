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
    <h1>Task 5</h1>
    <div class='table__overflow'>
      <table id='table'>
        <thead>
                <tr>
                    <th></th>
                    <th>CustomerID</th>
                    <th>Genre</th>
                    <th>Age</th>
                    <th>Annual_Income_k</th>
                    <th>Spending_Score_1100</th>
                </tr>
            </thead>
              <tbody>
                <?php
                  while ($row = $STM_allList->fetch())
                  {
                  ?>
                    <tr id='<?=$row[0]?>'>
                      <th><a id='<?=$row[0]?>' class='btn btn__delete'>delete</a></th>
                      <td><?=$row[0]?></td>
                      <td><?=$row[1]?></td>
                      <td><?=$row[2]?></td>
                      <td><?=$row[3]?></td>
                      <td><?=$row[4]?></td>
                    </tr>
                  <?php
                  }
                  ?>
              </tbody>
      </table>
    </div>

    <h3>Enter to add</h3>
      <form>
        <select id="genre">
          <option value="Male">Male</option>
          <option value="Female">Female</option>
        </select>
        <input type="text" placeholder="Age" id="age">
        <input type="text" placeholder="Annual_Income_k" id="annual">
        <input type="text" placeholder="Spending_Score_1100" id="score">
        <input type="submit" class='btn btn__add' value="Add">
      </form>

  </main>
</body>
</html>

<script>

document.querySelectorAll('.btn__delete').forEach(rem => {
  rem.addEventListener('click', function () {
    document.getElementById(rem.id).remove();

    const request = new XMLHttpRequest();
    const url = "actions.php";
    const params = "remove_id=" + rem.id;
    request.open("POST", url, true);
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.send(params);
  });
});

document.querySelector(".btn__add").onclick = function(){
  let genre =  document.getElementById("genre").value,
  age =  document.getElementById("age").value,
  annual =  document.getElementById("annual").value,
  score =  document.getElementById("score").value;

  if(genre && age && annual && score) {
    const request = new XMLHttpRequest();
    const url = "actions.php";
    const params = "genre=" + genre + "&age=" + age + "&annual=" + annual + "&score=" + score;
    request.open("POST", url, true);
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.send(params);

    var tableRef = document.getElementById('table').getElementsByTagName('tbody')[0];
    var newRow = tableRef.insertRow(tableRef.rows.length);
    newRow.innerHTML = "<tr><td></td><td></td><td>"+genre+"</td><td>"+age+"</td><td>"+annual+"</td><td>"+score+"</td></tr>";
  }
  return false;
}

</script>
