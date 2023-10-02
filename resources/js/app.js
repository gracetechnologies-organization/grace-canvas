// import './bootstrap';

// import Alpine from 'alpinejs';

// window.Alpine = Alpine;

// Alpine.start();

// console.log('its working');
// return;



import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap/dist/js/bootstrap.js'; // You may not need this line if you don't use Bootstrap's JavaScript components
// import 'vue-cropperjs/dist/vue-cropper-js';
// import 'vue-cropperjs/dist/vue-cropper.css';
import { Cropper } from "vue-advanced-cropper";
import "vue-advanced-cropper/dist/style.css";
import './bootstrap';
import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';

// Vue.use(VueCropper);
createInertiaApp({
    resolve: name => {
        const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
        return pages[`./Pages/${name}.vue`]
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .mount(el)
    },
})