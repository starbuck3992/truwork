<template>
    <main>
        <div v-for="(gallery, i) in galleries" :key="i" class="bg-white">
            <router-link :to="{ name: 'galleriesShow', params: {slug: gallery.slug } }" class="w-full h-full">
                <div class="max-w-2xl mx-auto py-4 px-4 sm:px-6 lg:max-w-7xl">
                    <div class="relative rounded-lg overflow-hidden lg:h-128">
                        <div class="absolute inset-0">
                            <img :src="gallery.thumbnail[0].path" :alt="category"
                                 class="w-full h-full object-center object-cover"/>
                        </div>
                        <div aria-hidden="true" class="relative w-full h-96 lg:hidden"/>
                        <div aria-hidden="true" class="relative w-full h-32 lg:hidden"/>
                        <div
                            class="absolute inset-x-0 bottom-0 bg-black bg-opacity-75 p-6 rounded-bl-lg rounded-br-lg backdrop-filter backdrop-blur sm:flex sm:items-center sm:justify-between lg:inset-y-0 lg:inset-x-auto lg:w-96 lg:rounded-tl-lg lg:rounded-br-none lg:flex-col lg:items-start">
                            <div>
                                <h2 class="text-xl font-bold text-white">{{ gallery.title }}</h2>
                                <p class="mt-1 text-sm hidden md:block text-gray-300">{{ gallery.description }}</p>
                            </div>
                            <a href="#"
                               class="mt-6 flex-shrink-0 flex bg-white bg-opacity-0 py-3 px-4 border border-white border-opacity-25 rounded-md items-center justify-center text-base font-medium text-white hover:bg-opacity-10 sm:mt-0 sm:ml-8 lg:ml-0 lg:w-full">
                                Pokračovat na galerii
                            </a>
                        </div>
                    </div>
                </div>
            </router-link>
        </div>
    </main>
</template>

<script>
import {onMounted, ref, watch} from 'vue'
import {useRoute, useRouter} from 'vue-router'
import Api from "../../../services/api";
import HeroScene from '../../HeroScene.vue'
import {EyeIcon} from '@heroicons/vue/outline'


export default {
    components: {
        HeroScene,
        EyeIcon,
    },
    setup() {
        const route = useRoute();
        const router = useRouter();
        const galleries = ref([]);
        const category = ref();

        function callApi() {
            Api.get(`/api/galleries?category=${route.query.category}`).then(response => {
                    galleries.value = response.data
                    category.value = response.data[0].category.name
                }
            ).catch(() => (
                router.push({name: 'homeIndex'})
            ))
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
            category,
        }
    },
}
</script>
