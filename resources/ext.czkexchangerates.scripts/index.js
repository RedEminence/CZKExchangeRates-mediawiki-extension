const Vue = require( 'vue' );
const App = require('./App.vue');

Vue.createMwApp(App)
	.mount(document.getElementById('czk-exchange-rates'));
