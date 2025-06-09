import { createApp } from "vue";
import FuiHelloWorld from "./Components/FuiHelloWorld.vue";

console.log(FuiHelloWorld);

const app = createApp();
app.component("FuiHelloWorld", FuiHelloWorld);
app.mount("#FUIhellowWorld");
