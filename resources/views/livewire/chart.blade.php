<div x-data 
     x-init="
        chart = new Chart(
            document.getElementById('chart'),
            {
                type: 'line',
                data: {{ $graph }},
                options: {
                  plugins: {
                    title: {
                      text: 'Time',
                      display: true,
                    }
                  },
                  scales: {
                    x: {
                      type: 'time',
                      time: {
                        unit: 'day',
                      }
                    },
                    y: {
                         title: {
                            display: true,
                            text: 'Value',
                         }
                    }
                  },
                },
            });
     ">
     {{-- {{ dd($graph) }} --}}
  <canvas id="chart"></canvas>
</div>
