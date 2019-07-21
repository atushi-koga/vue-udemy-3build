/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

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

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import axios from 'axios';
import scrollMonitor from 'scrollmonitor';

var LOAD_NUM = 4;
var watcher;

const app = new Vue({
    el: '#app',
    data: {
        searchWord: 'cat',
        lastSearchWord: '',
        searchResult: [],
        products: [],
        loading: false,
        cartItems: [],
        total: 0
    },
    computed: {
        totalPrice: function(){
            var total = 0;
            this.cartItems.forEach(function(elem){
                total += elem.price * elem.count;
            });

            return total;
        }
    },
    methods: {
        search: function () {
            this.loading = true;
            this.lastSearchWord = this.searchWord;
            axios.get('/api/search?word='.concat(this.searchWord))
                .then((res) => {
                this.searchResult = res.data;
            this.products = res.data.slice(0, LOAD_NUM);
        })
        .catch((error) => {
                alert('error');

        })
        .finally(() => {
                this.loading = false;
        });
        },
        addItemToCart: function(item){
            var isFounded = false;
            for(var i = 0; i < this.cartItems.length; i++){
                if(this.cartItems[i].id === item.id){
                    this.cartItems[i].count++;
                    isFounded = true;
                }
            }

            if(!isFounded){
                this.cartItems.push({
                    id: item.id,
                    name: item.name,
                    price: item.price,
                    count: 1
                });
            }
        },
        addItemOfCart: function(item){
            item.count++;
        },
        reduceItemOfCart: function(item){
            item.count--;
            if(item.count <= 0){
                var index = this.cartItems.indexOf(item);
                this.cartItems.splice(index, 1);
            }
        },
        appendResults: function(){
            console.log('appendresult');
        }
    },
    filters: {
        currency: function(price){
            return "$".concat(price.toFixed(2));
        }
    },
    created: function () {
        this.search();
    },
    beforeUpdate: function(){
        if(watcher){
            watcher.destroy();
            watcher = null;
        }
    },
    updated: function(){
        var sensor = document.querySelector("#product-list-bottom");
        watcher = scrollMonitor.create(sensor);
        watcher.enterViewport(this.appendResults);
    }
});

