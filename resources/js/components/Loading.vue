<template>
    <div class="fixed z-10 inset-0 overflow-y-auto w-1/2 justify-center" v-show="show">
        <img class="object-cover w-full h-full" src="https://c.tenor.com/hqDDsmQQ_6gAAAAC/coffin-dance-moves.gif" alt="">
    </div>
</template>

<script>
import {useStore} from "vuex";
import {computed, ref, watch} from "vue";

export default {
    setup() {
        const store = useStore()
        const show = ref(false)
        const loading = computed(() => store.getters["loading"])

        watch(loading, (val) => {
            if (val) {
                show.value = true
            } else {
                show.value = false
            }
        })
        return {
            show
        }
    }
};
</script>
