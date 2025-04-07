import "./bootstrap";

import.meta.glob([
    "../images/**"
]);

import Chart from 'chart.js/auto';
import 'chartjs-adapter-luxon';
window.Chart = Chart;
