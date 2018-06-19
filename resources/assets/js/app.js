import Datepicker from 'vuejs-datepicker';
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('date-component', require('./components/DateComponent.vue'));
Vue.component('birthdate-component', require('./components/BirthdateComponent.vue'));
Vue.component('announcement-component', require('./components/AnnouncementComponent.vue'));
Vue.component('bulletin-component', require('./components/BulletinComponent.vue'));
Vue.component('modal', require('./components/Modal.vue'));
Vue.component('success-modal', require('./components/SuccessModal.vue'));
Vue.component('confirm-modal', require('./components/ConfirmModal.vue'));


const app = new Vue({
    el: '#app',
	data() {
		return {
		  url: null,
		}
	},
	methods: {
		onFileChange(e) {
		  const file = e.target.files[0];
		  this.url = URL.createObjectURL(file);
		}
	}
});
