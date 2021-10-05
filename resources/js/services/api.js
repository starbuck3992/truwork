import axios from "axios";

export const api = axios.create({
    baseURL: process.env.VUE_APP_API_URL,
    withCredentials: true, 
});

export default {
    async login(payload) {
        await api.get("/sanctum/csrf-cookie");
        return api.post("/login", payload);
    },
    logout() {
        return api.post("/logout");
    }
};
