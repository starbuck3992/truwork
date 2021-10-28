<template>
    <button @click="logout" type="button" class="mt-2 ml-2 inline-flex items-center px-3.5 py-2 border border-transparent text-sm leading-4 font-medium rounded-full shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        Odhlásit se
    </button>
</template>

<script>
import {useStore} from 'vuex'
export default {
    setup() {
        const store = useStore()
        async function logout(){
            await store.dispatch('userModule/logout')
        }
        return {
            logout
        }
    }
};
</script>
