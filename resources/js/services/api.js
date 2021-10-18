import axios from "axios";
import store from "../store/index";

export const api = axios.create({
    withCredentials: true,
});

api.interceptors.response.use(
    (response) => {
        return response;
    },
    function (error) {
        if (
            [401, 403, 419].includes(error.response.status) &&
            store.getters['loggedIn']
        ) {
            store.dispatch('logout')
        }
        return Promise.reject(error);
    }
);

export default {
    async login(payload) {
        await api.get("/sanctum/csrf-cookie");
        return api.post("/login", payload);
    },
    logout() {
        return api.post("/logout");
    },
    getUser() {
        return api.get("api/user");
    },
    postGallery(payload) {
        return api.post("api/admin/galleries",payload, {
            headers: {'Content-Type': 'multipart/form-data'}
        });
    }
};
