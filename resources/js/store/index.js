import {createStore} from 'vuex'
import createPersistedState from 'vuex-persistedstate';
import api from '../services/api';
import router from '../router';

const store = createStore(
    {
        plugins: [createPersistedState()],
        state: {
            user: null,
            loading: false
        },
        getters: {
            user(state) {
                return state.user
            },
            loggedIn(state) {
                return !!state.user
            },
            loading(state) {
                return state.loading
            }
        },
        mutations: {
            createSession(state, user) {
                state.user = user
            },
            destroySession(state) {
                state.user = null
            },
            setLoading(state,newLoadingStatus) {
                state.loading = newLoadingStatus
            }
        },
        actions: {
            login({commit}, payload) {
                return api.login(payload)
                    .then(response => commit('createSession', response.data))
            },
            logout({commit}) {
                return api.logout()
                    .then(() => {
                        commit('destroySession');
                    })
                    .finally(() => {
                        router.push({name: 'homeIndex'})
                    })
            },
            loading({commit},payload){
                commit('setLoading', payload)
            }
        }
    }
)

export default store;
