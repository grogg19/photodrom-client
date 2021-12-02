import Vue from 'vue/dist/vue.esm';
window.Vue = Vue;

Vue.component('tags-input', require('./components/Tags-input').default)
Vue.component('tags-add', require('./components/Tags-add').default)
Vue.component('modal-window', require('./components/Modal-window').default)
Vue.component('photo-list', require('./components/Photo-list').default)
Vue.component('photo-list-extended', require('./components/Photo-list-extended').default)
Vue.component('menu-highlights-tools', require('./components/Menu-highlights-tools').default)


const app = new Vue({
    el: '#app'
})
