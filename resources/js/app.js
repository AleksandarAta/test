import "./bootstrap";
import.meta.glob(["../images/**"]);

import flatpickr from "flatpickr";
window.flatpickr = flatpickr;

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();
