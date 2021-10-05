import {createStore} from 'vuex'
import createPersistedState from 'vuex-persistedstate';
import api from "../services/api";

const store = createStore(
    {
        plugins: [createPersistedState()],
        state: {
            user: null
        },
        getters: {
            user(state) {
                return state.user;
            },
            loggedIn(state) {
                return !!state.user;
            }
        },
        mutations: {
            createSession(state, user) {
                state.user = user
            },
            destroySession(state) {
                state.user = null
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
            },
        }
    }
)

export default store;