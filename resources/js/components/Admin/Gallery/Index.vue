<template>
<div class="py-6">
    <div class="max-w-7xl mx-auto px-4 py-4 sm:px-6 md:px-8">
        <h1 class="text-2xl font-semibold text-gray-900">Galerie - Seznam</h1>
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8 mt-2">
         <div class="border-b border-gray-200">
            <div class="sm:flex sm:items-baseline">
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                Galerie
            </h3>
            <div class="mt-4 sm:mt-0 sm:ml-10">
                <nav class="-mb-px flex space-x-8">
                <a v-for="(tab, i) in tabs" :key="i" v-bind="activeItem" @click="selectItem(i)" :href="tab.href" :class="[i === activeItem ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300', 'whitespace-nowrap pb-4 px-1 border-b-2 font-medium text-sm']" :aria-current="i === activeItem ? 'page' : undefined">
                    {{ tab.name }}
                </a>
                </nav>
            </div>
            </div>
        </div>
        <div class="flex flex-col mt-10">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Obrázek
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Název
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Autor
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Datum
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Možnosti
                                </th>
                            </tr>
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">

                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <input type="name" name="name" id="name" required="" class="appearance-none min-w-0 w-full bg-white border border-transparent rounded-md py-2 px-4 text-base text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white focus:border-white focus:placeholder-gray-400 sm:max-w-xs" placeholder="Zadej název" />
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <input type="athor" name="author" id="author" required="" class="appearance-none min-w-0 w-full bg-white border border-transparent rounded-md py-2 px-4 text-base text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white focus:border-white focus:placeholder-gray-400 sm:max-w-xs" placeholder="Zadej autora" />
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <input type="date" name="date" id="date" required="" class="appearance-none min-w-0 w-full bg-white border border-transparent rounded-md py-2 px-4 text-base text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white focus:border-white focus:placeholder-gray-400 sm:max-w-xs"/>
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                </th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            <tr v-for="gallery in galeries" :key="gallery.name">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-30 w-30">
                                            <img class="h-auto w-36" :src="gallery.image" alt="" />
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ gallery.name }}</div>
                                    <div class="text-sm text-gray-500">{{ gallery.department }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ gallery.role }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <div class="text-sm text-gray-900">{{ gallery.date }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold bg-red-300 text-red-900 mr-3">
                                    <a @click="open=true" href="#"> Smazat </a>
                                </span>
                                    <a href="#" class="text-indigo-600 hover:text-indigo-900">Editovat</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pop Up Delete -->
        <TransitionRoot as="template" :show="open">
            <Dialog as="div" class="fixed z-10 inset-0 overflow-y-auto" @close="open = false">
                <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                    <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="ease-in duration-200" leave-from="opacity-100" leave-to="opacity-0">
                        <DialogOverlay class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" />
                    </TransitionChild>

                    <!-- This element is to trick the browser into centering the modal contents. -->
                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                    <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" enter-to="opacity-100 translate-y-0 sm:scale-100" leave="ease-in duration-200" leave-from="opacity-100 translate-y-0 sm:scale-100" leave-to="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                        <div class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
                            <div class="sm:flex sm:items-start">
                                <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                    <ExclamationIcon class="h-6 w-6 text-red-600" aria-hidden="true" />
                                </div>
                                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                    <DialogTitle as="h3" class="text-lg leading-6 font-medium text-gray-900">
                                        Opravdu chcete smazat galerii/obrázek?
                                    </DialogTitle>
                                    <div class="mt-2">
                                        <p class="text-sm text-gray-500">
                                            Portvrzením se obrázek nenávratně smaže.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
                                <button type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm" @click="open = false">
                                    Smazat
                                </button>
                                <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm" @click="open = false" ref="cancelButtonRef">
                                    Zrušit
                                </button>
                            </div>
                        </div>
                    </TransitionChild>
                </div>
            </Dialog>
        </TransitionRoot>
        <!-- /Pop Up Delete -->
    </div>
</div>
</template>

<script>
import {onMounted, ref} from 'vue'
import {Dialog, DialogOverlay, TransitionChild, TransitionRoot, DialogTitle, } from '@headlessui/vue'
import {ExclamationIcon,} from '@heroicons/vue/outline'
import api from '../../../services/api';
const galeries = [
    {
        name: 'Kuchyň XY',
        department: 'popisek nemusí bejt',
        role: 'Admin',
        image: 'https://cdn.pixabay.com/photo/2016/07/26/18/30/kitchen-1543493_960_720.jpg',
        date: '06.10.2021',
    },
    {
        name: 'Kuchyň XY',
        department: 'popisek nemusí bejt',
        role: 'Admin',
        image: 'https://cdn.pixabay.com/photo/2016/07/26/18/30/kitchen-1543493_960_720.jpg',
        date: '06.10.2021',
    },
    {
        name: 'Kuchyň XY',
        department: 'popisek nemusí bejt',
        role: 'Admin',
        image: 'https://cdn.pixabay.com/photo/2016/07/26/18/30/kitchen-1543493_960_720.jpg',
        date: '06.10.2021',
    },
    {
        name: 'Kuchyň XY',
        department: 'popisek nemusí bejt',
        role: 'Admin',
        image: 'https://cdn.pixabay.com/photo/2016/07/26/18/30/kitchen-1543493_960_720.jpg',
        date: '06.10.2021',
    },
    {
        name: 'Kuchyň XY',
        department: 'popisek nemusí bejt',
        role: 'Admin',
        image: 'https://cdn.pixabay.com/photo/2016/07/26/18/30/kitchen-1543493_960_720.jpg',
        date: '06.10.2021',
    },
    {
        name: 'Kuchyň XY',
        department: 'popisek nemusí bejt',
        role: 'Admin',
        image: 'https://cdn.pixabay.com/photo/2016/07/26/18/30/kitchen-1543493_960_720.jpg',
        date: '06.10.2021',
    },

]
const tabs = [
  { name: 'Kuchyně', href: '#'},
  { name: 'Vestavěnné skříně', href: '#'},
  { name: 'Ostatní', href: '#'},
]

export default {
    components: {
        Dialog,
        DialogOverlay,
        TransitionChild,
        TransitionRoot,
        ExclamationIcon,
        DialogTitle,
    },
    setup() {
        const open = ref(false);
        const activeItem = ref(0);
        function selectItem(i) {
            activeItem.value = i;
            console.log('item' . activeItem);
            console.log('index : ' . i);
        }
        console.log('item' . activeItem);
        return{
            galeries,
            open,
            tabs,
            activeItem,
            selectItem,
        }
    },
}
</script>
