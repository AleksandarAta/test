<div >
  @if($loading)
  <div>
    <h2>CHOOSE A CHART TO DSIPLAY</h2>
  </div>
  @else
  <div x-data 
  x-init="
window.addEventListener('rerender', () => {
 chart.destroy();
})
     chart = new Chart(
         document.getElementById('chart'),
         {
             type: 'line',
             data:{{ json_encode($graph) }} ,
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
                         text: 'Pokemon',
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
@endif
</div>
