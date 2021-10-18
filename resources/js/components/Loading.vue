<template>
    <div v-show="show">
        <img width="2560" height="1440" src="https://c.tenor.com/VOdWjm2zbEAAAAAS/gandalf-sax-guy.gif" alt="">
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
