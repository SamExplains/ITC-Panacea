<canvas id="firstChart" width="400" height="400"></canvas>
<script>

  var ctx = document.getElementById('firstChart').getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Total','Mild Score', 'Moderate Score', 'Severe Score'],
      datasets: [{
        label: ['Total', 'Mild', 'Moderate', 'Severe'],
        data: [0, 25, 5, 20],
        backgroundColor: ["#9561e2", "#1789FC", "#FFC747", "#DB5461"],
        // borderColor: [
        //   "",
        //   "rgba(0,0,0,.7)",
        //   "rgba(0,0,0,.7)",
        //   "rgba(0,0,0,.7)",
        // ],
      }, {
         label: 'Total Points',
         data: [50],
         backgroundColor: "#69AD77"
      }]
    }
  });
</script>
