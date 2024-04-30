import './bootstrap';
import '../css/app.css';

// import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';

import { createApp } from "vue";

import App from "./app.vue";
import MarsRover from './components/MarsRover.vue';
app.component('mars-rover', MarsRover);


createApp(App).mount("#app");

const appName = import.meta.env.VITE_APP_NAME || 'mars-rovers';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});


