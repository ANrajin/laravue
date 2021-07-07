import { createApp } from "vue";
import LoginModal from "./components/LoginModal.vue";
import Register from "./components/Register.vue";

const login = createApp({});
const register = createApp({});

login.component("login-modal", LoginModal).mount("#login");
register.component("register-component", Register).mount("#register");

require("./bootstrap");
