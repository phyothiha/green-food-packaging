require("./bootstrap");

import Alpine from "alpinejs";
window.Alpine = Alpine;

import { createApp } from "vue";

import PrimeVue from "primevue/config";
import "primevue/resources/themes/saga-blue/theme.css"; //theme
import "primevue/resources/primevue.min.css"; //core css
import "primeicons/primeicons.css"; //icons
import "primeflex/primeflex.css";

import Calendar from "primevue/calendar";

// Creating an Application
const app = createApp({});

// Installing Plugins
app.use(PrimeVue);

// Registration Global Components
app.component("Calendar", Calendar);

// Mounting the App
app.mount("#app");

Alpine.start();
