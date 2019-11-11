/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import App from "./components/App";

require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
window.Vue.use(VueRouter);


import VehiclesIndex from './components/VehiclesIndex.vue';
import VehiclesCreate from './components/VehiclesCreate.vue';
import VehiclesEdit from './components/VehiclesEdit.vue';

const routes = [
    {
        path: '/vehicles',
        components: {
            vehiclesIndex: VehiclesIndex
        }
    },
    {
        name: 'createVehicle',
        path: '/vehicles/create',
        component: VehiclesCreate
    },
    {
        name: 'editVehicle',
        path: '/vehicles/edit/:id',
        component: VehiclesEdit
    }
];

const router = new VueRouter({ mode: 'history', routes: routes});

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue').default
);

Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue').default
);

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue').default
);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({ router }).$mount('#app');
