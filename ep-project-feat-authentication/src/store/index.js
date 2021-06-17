import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

// Modules
import Auth from './modules/auth/index'

export const store = new Vuex.Store({
    state: {
    },

    modules: { 
        Auth,
    },

    mutations: {

    },
})

export default store