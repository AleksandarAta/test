import "./bootstrap";
import.meta.glob(["../images/**"]);

import flatpickr from "flatpickr";
window.flatpickr = flatpickr;

import Chart from 'chart.js/auto';
import 'chartjs-adapter-luxon';
window.Chart = Chart;

import 'tom-select/dist/css/tom-select.default.css';
import TomSelect from 'tom-select';
window.TomSelect = TomSelect;
