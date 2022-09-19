require("./bootstrap");

import Alpine from "alpinejs";
window.Alpine = Alpine;

// import { createApp } from "vue";

// import PrimeVue from "primevue/config";
// import "primevue/resources/themes/saga-blue/theme.css"; //theme
// import "primevue/resources/primevue.min.css"; //core css
// import "primeicons/primeicons.css"; //icons
// import "primeflex/primeflex.css";

// Prime Components
// import Dropdown from "primevue/dropdown";

// Custom Components
// import TableFuzzyLinguisticVariables from "./components/FAHP/TableFuzzyLinguisticVariables.vue";
// import TableFahpInput from "./components/FAHP/TableFahpInput.vue";

// Creating an Application
// const app = createApp({});

// Installing Plugins
// app.use(PrimeVue, { ripple: true });

// Registration Global Components
// app.component("Dropdown", Dropdown);

// app.component(
//     "TableFuzzyLinguisticVariables",
//     TableFuzzyLinguisticVariables
// ).component("TableFahpInput", TableFahpInput);

// Mounting the App
// app.mount("#app");

Alpine.start();
