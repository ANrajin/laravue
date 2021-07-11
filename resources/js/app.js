import { createApp } from "vue";
import LoginModal from "./components/LoginModal.vue";
import Register from "./components/Register.vue";

const app = createApp({});

app.component("login-modal", LoginModal);
app.component("register-component", Register);

app.mount("#app");
require("./bootstrap");
