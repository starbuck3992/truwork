<template>
    <div class="bg-mycolor max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8 mt-5">
        <ul role="list" class="grid grid-cols-2 gap-x-4 gap-y-8 sm:grid-cols-3 sm:gap-x-6 lg:grid-cols-4 xl:gap-x-8">
            <li v-for="(gallery, i) in galleries" :key="i" class="relative">
                <div
                    class="group block w-full aspect-w-10 aspect-h-7 rounded-lg bg-gray-100 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-offset-gray-100 focus-within:ring-indigo-500 overflow-hidden">
                    <img :src="gallery.thumbnail[0].path" alt=""
                         class="object-cover pointer-events-none group-hover:opacity-75"/>
                    <router-link :to="{ name: 'galleriesShow', params: {slug: gallery.slug } }"
                                 class="absolute inset-0 focus:outline-none">View details for {{ gallery.title }}
                    </router-link>
                </div>
                <p class="mt-2 block text-sm font-medium text-gray-900 truncate pointer-events-none">{{
                    gallery.title
                    }}</p>
            </li>
        </ul>
    </div>
</template>

<script>
import {onMounted, ref, watch} from 'vue'
import {useRoute} from 'vue-router'
import api from '../../../services/api'

export default {
    setup() {
        const route = useRoute()
        const galleries = ref([])

        async function callApi() {
            await api.getGalleries(route.query.category).then(response =>
                galleries.value = response.data
            )
        }

        onMounted(() => {
            callApi()
        })

        watch(() => route.query.category, (val) => {
            if (val) {
                callApi()
            }
        });

        return {
            galleries,
        }
    },
}
</script>
