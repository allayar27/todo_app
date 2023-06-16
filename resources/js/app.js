import './bootstrap';

import Alpine from 'alpinejs';

import { createApp } from 'vue'

import App from './Page/app.vue'

createApp(App).mount("#app")


window.Alpine = Alpine;

Alpine.start();


