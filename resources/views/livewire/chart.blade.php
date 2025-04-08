<div x-data 
     x-init="
        chart = new Chart(
            document.getElementById('chart'),
            {
                type: 'scatter',
                data: {{ $graph }},
                options: {
                  plugins: {
                    title: {
                      text: 'Pokemon Data',
                      display: true,
                    }
                  },
                  scales: {
                   x: {
                        title: {
                            display: true,
                            text: 'Pokémon',
                        },
                        type: 'category',  
                    },
                    y: {
                         title: {
                            display: true,
                            text: 'Height and weight',
                         }
                    }
                  },
                },
            });
     ">
  <canvas id="chart"></canvas>
</div>
