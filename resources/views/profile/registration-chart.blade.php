<canvas id="thirdChart" width="400" height="400"></canvas>
<script>

  var ctx = document.getElementById('thirdChart').getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'polarArea',
    data: {
      labels: ["Total",'Patients', 'Administrators', 'Physicians'],
      datasets: [{
        label: 'User Types',
        data: [0, 3, 2, 1],
        backgroundColor: [ "#69AD77", "#1789FC", "#FFC747", "#DB5461"],
      }, {
        label: 'Total Users',
        data: [5],
        backgroundColor: "rgba(105, 173, 119, 0.31)"
      }]
    }
  });
</script>
