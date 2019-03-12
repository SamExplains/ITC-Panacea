<canvas id="firstChart" width="400" height="400"></canvas>
<script>

  var ctx = document.getElementById('firstChart').getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Total','Mild Score', 'Moderate Score', 'Severe Score'],
      datasets: [{
        label: 'Severity Types Score',
        data: [0, 25, 5, 20],
        backgroundColor: "#9561e2",
        // borderColor: [
        //   "",
        //   "rgba(0,0,0,.7)",
        //   "rgba(0,0,0,.7)",
        //   "rgba(0,0,0,.7)",
        // ],
      }, {
        labels: ['One'],
        label: 'Total Points',
        data: [50],
        backgroundColor: "#52DE6D"
      }]
    }
  });
</script>