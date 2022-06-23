window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

//Vue.component('example-component', require('./components/ExampleComponent.vue'));

Vue.component('contents', require('./components/content/Contents.vue').default);
Vue.component('extras', require('./components/extra/Extras.vue').default);
Vue.component('speakers', require('./components/speaker/Speakers.vue').default);
Vue.component('itineraries', require('./components/itinerary/Itineraries.vue').default);
Vue.component('contacts', require('./components/contact/Contacts.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
