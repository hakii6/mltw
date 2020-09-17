/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import Vue from 'vue'
import VueRouter from 'vue-router'



Vue.use(VueRouter)

import App from './vue/App'
import Songs from './vue/Songs'
import SongTotalData from './vue/SongTotalData'
import Song from './vue/Song'
import Cards from './vue/Cards'
import Card from './vue/Card'
import Idols from './vue/Idols'
import Idol from './vue/Idol'

import Gachas from './vue/Gachas'
import Events from './vue/Events'

import About from './vue/About'
import Datas from './vue/Datas'
import Calculators from './vue/Calculators'

import Home from './vue/Home'

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/songs',
            name: 'songs',
            component: Songs
        },
        {
            path: '/songs/info',
            name: 'songs_info',
            component: SongTotalData,
        },

        {
            path: '/songs/:id?',
            name: 'song',
            component: Song
        },
		{
            path: '/cards',
            name: 'cards',
            component: Cards,
        },
		{
            path: '/cards/:id?',
            name: 'card',
            component: Card,
        },

		{
            path: '/idols',
            name: 'idols',
            component: Idols,
        },
		{
            path: '/idols/:id?',
            name: 'idol',
            component: Idol,
        },

		{
            path: '/gachas',
            name: 'gachas',
            component: Gachas,
        },
		{
            path: '/events',
            name: 'events',
            component: Events,
        },
		{
            path: '/about',
            name: 'about',
            component: About,
        },

		{
            path: '/datas',
            name: 'datas',
            component: Datas,
        },

		{
            path: '/calculators',
            name: 'calculators',
            component: Calculators,
        },

	],
});

const app = new Vue({
    el: '#app',
    components: { App },
    router,
});
 

