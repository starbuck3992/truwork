import Api from "../../services/api";

const user = {
    namespaced: true,
    state: {
        user: {
            name: null,
        },
    },
    getters: {
        user(state) {
            return state.user;
        },
        loggedIn(state) {
            return !!state.user.name;
        }
    },
    mutations: {
        createSession(state, user) {
            state.user.name = user.name;
        },
        destroySession(state) {
            Object.keys(state.user).forEach(k => state.user[k] = null);
        }
    },
    actions: {
        async login({commit}, payload) {
            await Api.get('/sanctum/csrf-cookie');
            return new Promise((resolve, reject) => {
                Api.post('/login', payload).then((response) => {
                    commit('createSession', response.data);
                    resolve(response)
                }).catch((error) => {
                    reject(error)
                })
            })
        },
        logout({commit}) {
            return new Promise((resolve, reject) => {
                Api.post('/logout').then((response) => {
                    commit('destroySession')
                    resolve(response)
                }).catch((error) => {
                    reject(error)
                })
            })
        }
    }
};

export default user;


