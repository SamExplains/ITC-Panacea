<canvas id="firstChart" width="400" height="400"></canvas>
<script>

  var ctx = document.getElementById('firstChart').getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Total','Mild Score', 'Moderate Score', 'Severe Score'],
      datasets: [{
        label: ['Total', 'Mild', 'Moderate', 'Severe'],
        data: [0, "{{ $p_mild_total }}", "{{ $p_moderate_total }}", "{{ $p_severe_total }}"],
        backgroundColor: ["#9561e2", "#1789FC", "#FFC747", "#DB5461"],
      }, {
         label: 'Total Points',
         data: ["{{ $p_total }}"],
         backgroundColor: "#69AD77"
      }]
    }
  });
</script>
