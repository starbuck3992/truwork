<template>
    <!-- <HeroScene :title="category"></HeroScene>
    <h1 class="text-4xl font-extrabold text-gray-900 sm:text-5xl sm:tracking-tight lg:text-6xl text-center"> Ukázka naší práce</h1>
    <div class="relative max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8 mt-5">
        <ul role="list" class="grid grid-cols-2 gap-x-3 gap-y-8 sm:grid-cols-3 sm:gap-x-6 lg:grid-cols-3 xl:gap-x-8">
            <li v-for="(gallery, i) in galleries" :key="i" class="relative">
                <router-link :to="{ name: 'galleriesShow', params: {slug: gallery.slug } }" class="w-full h-full">
                    <div
                        class="relative group block w-full aspect-w-10 aspect-h-7 rounded-lg bg-gray-100 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-offset-gray-100 focus-within:ring-indigo-500 overflow-hidden">
                        <img :src="gallery.thumbnail[0].path" :alt="category"
                             class="object-cover pointer-events-none group-hover:opacity-75"/>
                        <EyeIcon class="absolute inset-0 opacity-0 group-hover:opacity-70"></EyeIcon>
                    </div>
                    <p class="mt-2 block text-sm font-medium text-gray-900 truncate pointer-events-none">
                        {{ gallery.title }}
                    </p>
                </router-link>
            </li>
        </ul>
    </div> -->
<main>
  <div class="bg-white">
    <div class="max-w-2xl mx-auto py-4 px-4 sm:px-6 lg:max-w-7xl">
      <div class="relative rounded-lg overflow-hidden lg:h-128">
        <div class="absolute inset-0">
          <img src="/storage/images/initialize/kitchen1.jpg" alt="" class="w-full h-full object-center object-cover" />
        </div>
        <div aria-hidden="true" class="relative w-full h-96 lg:hidden" />
        <div aria-hidden="true" class="relative w-full h-32 lg:hidden" />
        <div class="absolute inset-x-0 bottom-0 bg-black bg-opacity-75 p-6 rounded-bl-lg rounded-br-lg backdrop-filter backdrop-blur sm:flex sm:items-center sm:justify-between lg:inset-y-0 lg:inset-x-auto lg:w-96 lg:rounded-tl-lg lg:rounded-br-none lg:flex-col lg:items-start">
          <div>
            <h2 class="text-xl font-bold text-white">Název kuchyně/Čehokoli</h2>
            <p class="mt-1 text-sm text-gray-300">Popisek Čehokoli, od kuchyně po komodu :D.</p>
          </div>
          <a href="#" class="mt-6 flex-shrink-0 flex bg-white bg-opacity-0 py-3 px-4 border border-white border-opacity-25 rounded-md items-center justify-center text-base font-medium text-white hover:bg-opacity-10 sm:mt-0 sm:ml-8 lg:ml-0 lg:w-full">
              Přejít na galerii
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="bg-white">
    <div class="max-w-2xl mx-auto py-4 px-4 sm:px-6 lg:max-w-7xl">
      <div class="relative rounded-lg overflow-hidden lg:h-128">
        <div class="absolute inset-0">
          <img src="/storage/images/initialize/kitchen2.jpg" alt="" class="w-full h-full object-center object-cover" />
        </div>
        <div aria-hidden="true" class="relative w-full h-96 lg:hidden" />
        <div aria-hidden="true" class="relative w-full h-32 lg:hidden" />
        <div class="absolute inset-x-0 bottom-0 bg-black bg-opacity-75 p-6 rounded-bl-lg rounded-br-lg backdrop-filter backdrop-blur sm:flex sm:items-center sm:justify-between lg:inset-y-0 lg:inset-x-auto lg:w-96 lg:rounded-tl-lg lg:rounded-br-none lg:flex-col lg:items-start">
          <div>
            <h2 class="text-xl font-bold text-white">Workspace Collection</h2>
            <p class="mt-1 text-sm text-gray-300">Upgrade your desk with objects that keep you organized and clear-minded.</p>
          </div>
          <a href="#" class="mt-6 flex-shrink-0 flex bg-white bg-opacity-0 py-3 px-4 border border-white border-opacity-25 rounded-md items-center justify-center text-base font-medium text-white hover:bg-opacity-10 sm:mt-0 sm:ml-8 lg:ml-0 lg:w-full">View the collection</a>
        </div>
      </div>
    </div>
  </div>
  <div class="bg-white">
    <div class="max-w-2xl mx-auto py-4 px-4  sm:px-6 lg:max-w-7xl">
      <div class="relative rounded-lg overflow-hidden lg:h-128">
        <div class="absolute inset-0">
          <img src="/storage/images/initialize/kitchen3.jpg" alt="" class="w-full h-full object-center object-cover" />
        </div>
        <div aria-hidden="true" class="relative w-full h-96 lg:hidden" />
        <div aria-hidden="true" class="relative w-full h-32 lg:hidden" />
        <div class="absolute inset-x-0 bottom-0 bg-black bg-opacity-75 p-6 rounded-bl-lg rounded-br-lg backdrop-filter backdrop-blur sm:flex sm:items-center sm:justify-between lg:inset-y-0 lg:inset-x-auto lg:w-96 lg:rounded-tl-lg lg:rounded-br-none lg:flex-col lg:items-start">
          <div>
            <h2 class="text-xl font-bold text-white">Workspace Collection</h2>
            <p class="mt-1 text-sm text-gray-300">Upgrade your desk with objects that keep you organized and clear-minded.</p>
          </div>
          <a href="#" class="mt-6 flex-shrink-0 flex bg-white bg-opacity-0 py-3 px-4 border border-white border-opacity-25 rounded-md items-center justify-center text-base font-medium text-white hover:bg-opacity-10 sm:mt-0 sm:ml-8 lg:ml-0 lg:w-full">View the collection</a>
        </div>
      </div>
    </div>
  </div>
  <div class="bg-white">
    <div class="max-w-2xl mx-auto py-4 px-4 sm:px-6 lg:max-w-7xl">
      <div class="relative rounded-lg overflow-hidden lg:h-128">
        <div class="absolute inset-0">
          <img src="/storage/images/initialize/kitchen1.jpg" alt="" class="w-full h-full object-center object-cover" />
        </div>
        <div aria-hidden="true" class="relative w-full h-96 lg:hidden" />
        <div aria-hidden="true" class="relative w-full h-32 lg:hidden" />
        <div class="absolute inset-x-0 bottom-0 bg-black bg-opacity-75 p-6 rounded-bl-lg rounded-br-lg backdrop-filter backdrop-blur sm:flex sm:items-center sm:justify-between lg:inset-y-0 lg:inset-x-auto lg:w-96 lg:rounded-tl-lg lg:rounded-br-none lg:flex-col lg:items-start">
          <div>
            <h2 class="text-xl font-bold text-white">Workspace Collection</h2>
            <p class="mt-1 text-sm text-gray-300">Upgrade your desk with objects that keep you organized and clear-minded.</p>
          </div>
          <a href="#" class="mt-6 flex-shrink-0 flex bg-white bg-opacity-0 py-3 px-4 border border-white border-opacity-25 rounded-md items-center justify-center text-base font-medium text-white hover:bg-opacity-10 sm:mt-0 sm:ml-8 lg:ml-0 lg:w-full">View the collection</a>
        </div>
      </div>
    </div>
  </div>  
</main>
</template>

<script>
import {onMounted, ref, watch} from 'vue'
import {useRoute, useRouter} from 'vue-router'
import api from '../../../services/api'
import HeroScene from '../../HeroScene.vue'
import {EyeIcon} from '@heroicons/vue/outline'


export default {
    components: {
        HeroScene,
        EyeIcon,
    },
    setup() {
        const route = useRoute()
        const router = useRouter()
        const galleries = ref([])
        const category = ref()

        async function callApi() {
           // await api.getGalleries(route.query.category).then(response => {
           //         galleries.value = response.data
           //         category.value = response.data[0].category.name
           //    }
           // ).catch(() => (
                //router.push({name: 'homeIndex'})
           // ))
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
