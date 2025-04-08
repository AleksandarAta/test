import "./bootstrap";

import.meta.glob([
    "../images/**"
]);

import Chart from 'chart.js/auto';
import 'chartjs-adapter-luxon';
import 'tom-select/dist/css/tom-select.default.css'
import TomSelect from "tom-select";
window.Chart = Chart;
window.TomSelect = TomSelect;