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
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
    <h1>Task 1</h1>
    <div class="chart">
      <canvas id="chart__task1"></canvas>
    </div>

    <h1>Task 2</h1>
    <div class="chart chart__pie">
      <canvas id="chart__task2"></canvas>
    </div>
  </main>
</body>
</html>

<script>
  const chart__task1_data = {
  labels: [
    'Male',
    'Female'
  ],
  datasets: [{
    label: 'Dataset Male/FeMale',
    data: [<?=$GENRE_MALE_COUNT?>, <?=$GENRE_FEMALE_COUNT?>],
    backgroundColor: [
      'rgb(255, 99, 132)',
      'rgb(54, 162, 235)',
      'rgb(255, 205, 86)'
    ],
    hoverOffset: 4
  }]
  };

  const chart__task1_config = {
    type: 'doughnut',
    data: chart__task1_data,
  };


  const myChart = new Chart(
    document.getElementById('chart__task1'),
    chart__task1_config
  );

  //-------


  let arr_age = <?php echo json_encode($age) ?>;
  let arr1 = [], arr2 = [];
  for (let key in arr_age) {
      arr1.push(key);
      arr2.push(arr_age[key]);
  }

  const chart__task2_data = {
    labels: arr1,
    datasets: [{
      label: 'Age sort',
      data: arr2,
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(255, 159, 64, 0.2)',
        'rgba(255, 205, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(201, 203, 207, 0.2)'
      ],
      borderColor: [
        'rgb(255, 99, 132)',
        'rgb(255, 159, 64)',
        'rgb(255, 205, 86)',
        'rgb(75, 192, 192)',
        'rgb(54, 162, 235)',
        'rgb(153, 102, 255)',
        'rgb(201, 203, 207)'
      ],
      borderWidth: 1
    }]
  };

  const chart__task2_config = {
    type: 'bar',
    data: chart__task2_data,
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    },
  };

  const myChart2 = new Chart(
    document.getElementById('chart__task2'),
    chart__task2_config
  );


</script>
