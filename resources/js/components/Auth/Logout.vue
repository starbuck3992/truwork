<template>
    <div @click="logout">Odhlášení</div>
</template>

<script>
import {useStore} from 'vuex'
export default {
    setup() {
        const store = useStore()
        async function logout(){
            await store.dispatch('logout')
        }
        return {
            logout
        }
    }
};
</script>
