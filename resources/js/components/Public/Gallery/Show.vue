<template>
    <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8 mt-5">
        <ul role="list" class="grid grid-cols-2 gap-x-4 gap-y-8 sm:grid-cols-3 sm:gap-x-6 lg:grid-cols-4 xl:gap-x-8">
            <li v-for="(file, index) in files" :key="file.source" class="relative">
                <div @click="openSlider(file.source,index)"
                     class="group block w-full aspect-w-10 aspect-h-7 rounded-lg bg-gray-100 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-offset-gray-100 focus-within:ring-indigo-500 overflow-hidden">
                    <img :src="file.source" alt="" class="object-cover pointer-events-none group-hover:opacity-75"/>
                    <button type="button" class="absolute inset-0 focus:outline-none">
                        <span class="sr-only">View details for {{ file.title }}</span>
                    </button>
                </div>
                <p class="mt-2 block text-sm font-medium text-gray-900 truncate pointer-events-none">{{
                        file.title
                    }}</p>
                <!-- <p class="block text-sm font-medium text-gray-500 pointer-events-none">{{ file.size }}</p> -->
            </li>
        </ul>
    </div>

    <!-- SLIDER -->
    <TransitionRoot as="template" :show="open">
        <Dialog as="div" class="fixed z-10 inset-0 overflow-y-auto" @close="open = false">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0"
                                 enter-to="opacity-100" leave="ease-in duration-200" leave-from="opacity-100"
                                 leave-to="opacity-0">
                    <DialogOverlay class="fixed inset-0 bg-gray-900 bg-opacity-80 transition-opacity"/>
                </TransitionChild>

                <!-- This element is to trick the browser into centering the modal contents. -->
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                <div class="hidden sm:block absolute w-10 h-10 top-5 right-10 pt-4 pr-4 z-10">
                            <button type="button"
                                    class="bg-white rounded-md text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                    @click="open = false">
                                <span class="sr-only">Close</span>
                                <XIcon class="h-8 w-8" aria-hidden="true"/>
                            </button>
                        </div>
                <TransitionChild as="template" enter="ease-out duration-300"
                                 enter-from="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                 enter-to="opacity-100 translate-y-0 sm:scale-100" leave="ease-in duration-200"
                                 leave-from="opacity-100 translate-y-0 sm:scale-100"
                                 leave-to="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                    <div class="inline-block align-middle overflow-hidden transform transition-all m-auto w-full max-h-screen pointer-events: none;">
                        <ChevronLeftIcon @click="prev()" class="hidden sm:block absolute left-10 top-1/2 bg-white sm:w-10 sm:h-10 h-3 w-3 z-10"></ChevronLeftIcon>
                        <ChevronRightIcon @click="next()" class="hidden sm:block absolute right-10 top-1/2 bg-white sm:w-10 sm:h-10 h-3 w-3 z-10"></ChevronRightIcon>
                        <div v-touch:swipe="onSwipeItem()" class="m-auto height-slide w-full flex justify-center inline-block align-middle">
                            <img class="active h-auto w-auto object-cpver inline-block align-middle" :src="showImage"
                                 alt="People working on laptops">
                        </div>
                    </div>
                </TransitionChild>
            </div>
        </Dialog>
    </TransitionRoot>
</template>

<script>
import anime from 'animejs/lib/anime.es.js';
import {ref} from 'vue'
import {Dialog, DialogOverlay, DialogTitle, TransitionChild, TransitionRoot} from '@headlessui/vue'
import {CheckIcon, XIcon, ChevronRightIcon, ChevronLeftIcon} from '@heroicons/vue/outline'

const files = [
    {
        title: 'img1',
        size: '3.9 MB',
        source:
            'https://cdn.pixabay.com/photo/2016/07/26/18/30/kitchen-1543493_960_720.jpg',
    },
    {
        title: 'img2',
        size: '3.9 MB',
        source:
            'http://kitchenremodelingsavannah.com/wp-content/uploads/2017/10/iStock-542686440.jpg',
    },
    {
        title: 'img3',
        size: '3.9 MB',
        source:
            'https://images.unsplash.com/photo-1582053433976-25c00369fc93?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=512&q=80',
    },
    {
        title: 'img4',
        size: '3.9 MB',
        source:
            'https://images.unsplash.com/photo-1582053433976-25c00369fc93?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=512&q=80',
    },
    {
        title: 'img5',
        size: '3.9 MB',
        source:
            'https://images.unsplash.com/photo-1582053433976-25c00369fc93?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=512&q=80',
    },
    {
        title: 'img6',
        size: '3.9 MB',
        source:
            'https://images.unsplash.com/photo-1582053433976-25c00369fc93?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=512&q=80',
    },
    {
        title: 'img7',
        size: '3.9 MB',
        source:
            'https://images.unsplash.com/photo-1582053433976-25c00369fc93?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=512&q=80',
    },
    {
        title: 'img8',
        size: '3.9 MB',
        source:
            'https://images.unsplash.com/photo-1582053433976-25c00369fc93?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=512&q=80',
    },
    // More files...
]

const animation = anime({
  targets: '.active',
  translateX: 250,
  direction: 'alternate',
  loop: false,
  easing: 'linear'
});

export default {
    components: {
        Dialog,
        DialogOverlay,
        DialogTitle,
        TransitionChild,
        TransitionRoot,
        CheckIcon,
        XIcon,
        ChevronRightIcon, 
        ChevronLeftIcon,
    },
    setup() {
        const open = ref(false);
        const showImage = ref(null);
        const index = ref(null);
        const image = ref(null);

        function openSlider(image, key, event) {
            open.value = true;
            showImage.value = image;
            index.value = key;
        }

        function next(){
            let lastIndex = _.findLastIndex(files);
            index.value ++;
            if ( lastIndex < index.value ){
                index.value = 0;
            }
            showImage.value = files[index.value].source;
        }

        function prev(){
            let lastIndex = _.findLastIndex(files);
            index.value --;
            if ( 0 > index.value ){
                index.value = lastIndex;
            }
            showImage.value = files[index.value].source;
        }

        function onSwipeItem() {
		return function (direction, mouseEvent) {
			console.log(direction);
                if ( direction === "left" || direction === "top" ){
                    next();
                }
                if ( direction === "right" || direction === "bottom"){
                    prev();
                }
            };
        }

        return {
            image,
            open,
            files,
            showImage,
            openSlider,
            next,
            prev,
            onSwipeItem,
        }
    }
}
</script>
