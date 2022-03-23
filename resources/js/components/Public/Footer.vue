<template>
<footer id="footer" class="relative bg-gray-800 clear-both h-auto">
    <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:py-16 lg:px-8">
        <div class="mt-4 border-t border-gray-200 pt-8">
            <p class="text-base text-white text-center">
            &copy; 2022 Truwork S.R.O. Všechna práva vyhrazena.
            </p>
            <div v-if="loggedIn">
                <p class="text-base text-gray-400 text-center mt-2">
                    Přihlášen uživatel <span class="text-indigo-600 font-medium hover:text-indigo-700 text-base text-center">{{user.name}}</span>
                </p>
                <div>
                    <router-link :to="{ name: 'adminGalleryIndex' }">
                        <p class="text-base text-indigo-600 text-center mt-2">
                            Admin rozhraní
                        </p>
                    </router-link>
                    <Logout class="text-base text-red-900 text-center mt-2"></Logout>
                </div>
            </div>
            <div v-else>
                <router-link :to="{ name: 'authLogin' }" class="cursor-pointer">
                    <p class="text-base  text-white text-center mt-2 cursor-pointer">
                        Přihlásit se
                    </p>
                </router-link>
            </div>
        </div>
    </div>
</footer>
</template>

<script>
import {computed} from 'vue'
import {useStore} from 'vuex'
import Logout from '../Auth/Logout'

export default {
    components: {
        Logout
    },
    setup() {
        const store = useStore();
        const user = computed(() => store.getters['userModule/user']);
        const loggedIn = computed(() => store.getters['userModule/loggedIn']);

        return {
            user,
            loggedIn
        }
    },
}
</script>
