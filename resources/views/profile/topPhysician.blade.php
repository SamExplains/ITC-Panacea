<div class="container">
  <div class="row">
    <div class="col-12 mx-auto Physician">
      <p class="bg-warning p-2">This months top physician</p>
      <h4 class="ui image">{{ $tpd->name }}</h4>
      <div class="Physician-BackImageColor mx-auto">
        <img src="{{ $tpd->photo }}" class="Physician-Image ui image d-block centered" alt="">
      </div>

      <canvas id="bar-chart-horizontal" width="800" height="450"></canvas>

      <script>
        new Chart(document.getElementById("bar-chart-horizontal"), {
          type: 'horizontalBar',
          data: {
            labels: ["{{ $tpd->name }}", "Second place"],
            datasets: [
              {
                label: "Total Evaluation Records",
                backgroundColor: ["#3e95cd", "#8e5ea2"],
                data: ["{{ $tpd->leading }}", "{{ $tpd->second }}"]
              }
            ]
          },
          options: {
            legend: { display: false },
            title: {
              display: true,
              text: '{{ $tpd->name }} and second place total evaluations'
            },
            scales: {
              yAxes: [{
                barThickness : 55
              }]
            }

          }
        });
      </script>

    </div>
  </div>
</div>