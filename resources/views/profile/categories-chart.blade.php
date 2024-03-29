<canvas id="myChart" width="400" height="400"></canvas>
<script>

  var ctx = document.getElementById('myChart').getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
      labels: ['Total','Mild', 'Moderate', 'Severe'],
      datasets: [{
        label: 'Severity Types',
        data: [0, {{ $t_mild_posts }}, {{ $t_moderate_posts }}, {{ $t_severe_posts }}],
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
        data: [{{ $t_posts }}],
        backgroundColor: "#69AD77"
      }]
    }
  });
</script>