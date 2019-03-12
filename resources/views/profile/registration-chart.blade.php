<canvas id="thirdChart" width="400" height="400"></canvas>
<script>

  var ctx = document.getElementById('thirdChart').getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'polarArea',
    data: {
      labels: ['Total','Patients', 'Administrators', 'Physicians'],
      datasets: [{
        label: 'User Types',
        data: [0, 3, 2, 1],
        backgroundColor: "#9561e2",
        // borderColor: [
        //   "",
        //   "rgba(0,0,0,.7)",
        //   "rgba(0,0,0,.7)",
        //   "rgba(0,0,0,.7)",
        // ],
      }, {
        labels: ['One'],
        label: 'Total Users',
        data: [5],
        backgroundColor: "rgba(82, 222, 109, 0.2)"
      }]
    }
  });
</script>