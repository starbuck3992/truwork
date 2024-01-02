<template>
    <Loading></Loading>
    <router-view></router-view>
    <Success></Success>
    <Exception></Exception>
</template>

<script setup lang="ts">
import Loading from '@/components/Loading.vue';
import Success from '@/components/Success.vue';
import Exception from '@/components/Exception.vue';
</script>

<style scoped>
</style>
