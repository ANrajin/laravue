import { createApp } from "vue";
import LoginModal from "./components/LoginModal.vue";
import Register from "./components/Register.vue";
import Lessons from "./components/Lessons.vue";
import Series from "./components/Series.vue";

const app = createApp({});

app.component("login-modal", LoginModal);
app.component("register-component", Register);
app.component("lessons-component", Lessons);
app.component("series-component", Series);

app.mount("#app");
require("./bootstrap");
