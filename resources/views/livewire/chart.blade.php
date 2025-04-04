<div x-data x-init= "new Chart{
    document.getElementbyId('#chart'){
    type: 'scatter',
  data: {
    labels: ['weight', 'time'],
    datasets: [{
    
    }],
  },
  options: {
    scales: {
      x: {
        type: 'linear',
        text: 'Weight'
        display: true
      }
        y: {
            display: true,
        }
    }
  }
};
    }
}">
    <canvas id="chart"></canvas>

</div>
