<template>
    <!-- <HeroScene :title="category"></HeroScene>
    <h1 class="text-4xl font-extrabold text-gray-900 sm:text-5xl sm:tracking-tight lg:text-6xl text-center"> Ukázka naší práce</h1>
    <div class="relative bg-mycolor max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8 mt-5">
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
      <!-- Hero section -->
      <div class="relative py-4 my-4">
        <!-- Background image and overlap -->
        <div aria-hidden="true" class="hidden absolute inset-0 sm:flex sm:flex-col">
          <div class="flex-1 relative w-full bg-gray-800">
            <div class="absolute inset-0 overflow-hidden">
              <img src="https://tailwindui.com/img/ecommerce-images/home-page-04-hero-full-width.jpg" alt="" class="w-full h-full object-center object-cover">
            </div>
            <div class="absolute inset-0 bg-gray-900 opacity-50"></div>
          </div>
          <div class="w-full bg-white h-32 md:h-40 lg:h-48"></div>
        </div>

        <div class="relative max-w-3xl mx-auto pb-96 px-4 text-center sm:pb-0 sm:px-6 lg:px-8">
          <!-- Background image and overlap -->
          <div aria-hidden="true" class="absolute inset-0 flex flex-col sm:hidden">
            <div class="flex-1 relative w-full bg-gray-800">
              <div class="absolute inset-0 overflow-hidden">
                <img src="https://tailwindui.com/img/ecommerce-images/home-page-04-hero-full-width.jpg" alt="" class="w-full h-full object-center object-cover">
              </div>
              <div class="absolute inset-0 bg-gray-900 opacity-50"></div>
            </div>
            <div class="w-full bg-white h-48"></div>
          </div>
          <div class="relative py-32">
            <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl md:text-6xl">Kuchyně na míru</h1>
            <div class="mt-4 sm:mt-6">
              <a href="#" class="inline-block bg-indigo-600 border border-transparent rounded-md py-3 px-8 font-medium text-white hover:bg-indigo-700">Po kliknutí na obrázek budete pokračovat na galerii</a>
            </div>
          </div>
        </div>

        <section aria-labelledby="collection-heading" class="-mt-96 relative sm:mt-0">
          <h2 id="collection-heading" class="sr-only">Collections</h2>
          <div class="max-w-md mx-auto grid grid-cols-1 gap-y-6 px-4 sm:max-w-full sm:px-6 sm:grid-cols-3 sm:gap-y-0 sm:gap-x-6 lg:px-8 lg:gap-x-8">
            
              <div class="group relative h-96 bg-white rounded-lg shadow-xl sm:h-auto sm:aspect-w-4 sm:aspect-h-5">
                <div>
                  <div aria-hidden="true" class="absolute inset-0 rounded-lg overflow-hidden">
                    <div class="absolute inset-0 overflow-hidden group-hover:opacity-75">
                      <img src="https://tailwindui.com/img/ecommerce-images/home-page-04-collection-01.jpg" alt="Woman wearing a comfortable cotton t-shirt." class="w-full h-full object-center object-cover">
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black opacity-50"></div>
                  </div>
                  <div class="absolute inset-0 rounded-lg p-6 flex items-end">
                    <div>
                      <p aria-hidden="true" class="text-sm font-semibold text-white text-4xl">
                        Klasické
                      </p>
                      <p class="mt-1 text-white text-xl">
                        <a href="#">
                          <span class="absolute inset-0"></span>
                          Pokračovat na galerii
                        </a>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            
              <div class="group relative h-96 bg-white rounded-lg shadow-xl sm:h-auto sm:aspect-w-4 sm:aspect-h-5">
                <div>
                  <div aria-hidden="true" class="absolute inset-0 rounded-lg overflow-hidden">
                    <div class="absolute inset-0 overflow-hidden group-hover:opacity-75">
                      <img src="https://tailwindui.com/img/ecommerce-images/home-page-04-collection-02.jpg" alt="Man wearing a comfortable and casual cotton t-shirt." class="w-full h-full object-center object-cover">
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black opacity-50"></div>
                  </div>
                  <div class="absolute inset-0 rounded-lg p-6 flex items-end">
                    <div>
                      <p aria-hidden="true" class="text-sm font-semibold text-white text-4xl">
                        Moderní
                      </p>
                      <p class="mt-1 text-white text-xl">
                        <a href="#">
                          <span class="absolute inset-0"></span>
                          Pokračovat na galerii
                        </a>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            
              <div class="group relative h-96 bg-white rounded-lg shadow-xl sm:h-auto sm:aspect-w-4 sm:aspect-h-5">
                <div>
                  <div aria-hidden="true" class="absolute inset-0 rounded-lg overflow-hidden">
                    <div class="absolute inset-0 overflow-hidden group-hover:opacity-75">
                      <img src="https://tailwindui.com/img/ecommerce-images/home-page-04-collection-03.jpg" alt="Person sitting at a wooden desk with paper note organizer, pencil and tablet." class="w-full h-full object-center object-cover">
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black opacity-50"></div>
                  </div>
                  <div class="absolute inset-0 rounded-lg p-6 flex items-end">
                    <div>
                      <p aria-hidden="true" class="text-sm font-semibold text-white text-4xl">
                        Bezúchytkové
                      </p>
                      <p class="mt-1 text-white text-xl">
                        <a href="#">
                          <span class="absolute inset-0"></span>
                          Pokračovat na galerii
                        </a>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            
          </div>
        </section>
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
