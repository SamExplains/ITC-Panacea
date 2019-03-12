<canvas id="myChart" width="400" height="400"></canvas>
<script>

  var ctx = document.getElementById('myChart').getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
      labels: ['Total','Mild', 'Moderate', 'Severe'],
      datasets: [{
        label: 'Severity Types',
        data: [0, 12, 19, 3],
        backgroundColor: ["#69AD77", "#1789FC", "#FFC747", "#DB5461"],
        // borderColor: [
        //   "",
        //   "rgba(0,0,0,.7)",
        //   "rgba(0,0,0,.7)",
        //   "rgba(0,0,0,.7)",
        // ],
      }, {
        labels: ['One'],
        label: 'Total Data',
        data: [50],
        backgroundColor: "#69AD77"
      }]
    }
  });
</script>