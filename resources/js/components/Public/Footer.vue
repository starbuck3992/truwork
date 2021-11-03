<template>
    <footer id="footer" class="relative bg-mycolor clear-both h-40 -mt-40">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 md:flex md:items-center md:justify-between lg:px-8">
            <div class="flex justify-center space-x-6 md:order-2">
                <div v-if="loggedIn">
                    Přihlášen uživatel <span class="text-indigo-600 font-medium hover:text-indigo-700">{{ user }}</span>
                    <p>
                    <router-link :to="{ name: 'adminGalleryIndex' }">
                        <button type="button" class="inline-flex items-center px-3.5 py-2 border border-transparent text-sm leading-4 font-medium rounded-full shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Admin rozhraní
                        </button>
                    </router-link>
                    <Logout></Logout>
                    </p>
                </div>
                <div v-else class="mt-8 md:mt-0 md:order-1">
                    <router-link :to="{ name: 'authLogin' }">
                        <button type="submit" class="mt-2 w-full inline-flex items-center justify-center px-6 py-3 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:w-auto">
                            Přihlásit se
                        </button>
                    </router-link>
                </div>
            </div>
            <div class="mt-8 md:mt-0 md:order-1">
                <p class="text-center text-base text-gray-400">
                    &copy; 2021 Truwork, Inc. All rights reserved.
                </p>
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
        const store = useStore()
        const user = computed(() => store.getters['userModule/user'])
        const loggedIn = computed(() => store.getters['userModule/loggedIn'])

        return {
            user,
            loggedIn
        }
    },
}
</script>
