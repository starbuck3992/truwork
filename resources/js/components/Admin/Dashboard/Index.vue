<template>
    <div>Dashboard</div>
</template>

<script>
import {onMounted} from 'vue'
import api from '../../../services/api';

export default {
    setup() {
        onMounted(() => {
            api.getUser().then(
                response => console.log(response.data)
            )
        })
    }
}
</script>
