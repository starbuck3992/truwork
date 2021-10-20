<template>
    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 pb-8 sm:px-6 md:px-8">
            <h1 class="text-2xl font-semibold text-gray-900">Galerie - Tvorba</h1>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
            <form ref="createForm" @submit.prevent="submit" class="space-y-8 divide-y divide-gray-200">
                <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                    <div>
                        <div>
                            <p class="mt-1 max-w-2xl text-sm text-gray-500">Vyplňte všechny pole na formuláři</p>
                        </div>
                        <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                            <div
                                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="title" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Název
                                    galerie</label>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <div class="max-w-lg flex rounded-md shadow-sm">
                                        <input v-model="form.title" type="text" name="title" id="title"
                                               autocomplete="title"
                                               class="flex-1 block w-full focus:ring-indigo-500 focus:border-indigo-500 min-w-0 rounded-md sm:text-sm border-gray-300"
                                               required/>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="about" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Kategorie</label>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                                        <select v-model="form.category" id="category" name="category"
                                                class="max-w-lg block focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md"
                                                required>
                                            <option value="1">Kuchyně</option>
                                            <option value="2">Vestavěné skříně</option>
                                            <option value="3">Pergoly</option>
                                            <option value="4">Ostatní</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="cover-photo"
                                       class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Úvodní
                                    obrázek</label>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <div
                                        class="max-w-lg flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                        <div class="space-y-1 text-center">
                                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor"
                                                 fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                                <path
                                                    d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                            <div class="flex text-sm text-gray-600">
                                                <label for="thumbnail"
                                                       class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                    <span>Nahrát soubor</span>
                                                    <input @change="showThumbnail" id="thumbnail" name="thumbnail"
                                                           type="file" class="sr-only" accept="image/png, image/jpeg"
                                                           required/>
                                                </label>
                                                <p class="pl-1">Může se sem i přetáhnout</p>
                                            </div>
                                            <p class="text-xs text-gray-500">Pouze formát: PNG, JPG</p>
                                        </div>
                                    </div>
                                    <div v-if="thumbnailPreview">
                                        <img :src="thumbnailPreview" class="preview" style="width:600px;" alt=""/>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="cover-photo"
                                       class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Další
                                    obrázky</label>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <div
                                        class="max-w-lg flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                        <div class="space-y-1 text-center">
                                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor"
                                                 fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                                <path
                                                    d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                            <div class="flex text-sm text-gray-600">
                                                <label for="images"
                                                       class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                    <span>Nahrát soubor</span>
                                                    <input @change="showImages" id="images" name="images" type="file"
                                                           multiple accept="image/png, image/jpeg" class="sr-only"
                                                           required/>
                                                </label>
                                                <p class="pl-1">Může se sem i přetáhnout</p>
                                            </div>
                                            <p class="text-xs text-gray-500">Pouze formát: PNG, JPG</p>
                                        </div>
                                    </div>
                                    <div v-for="(image, key) in imagesPreview" :key="key">
                                        <img :src="image.src" class="preview" style="width:600px;" alt=""/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pt-5">
                    <div class="flex justify-end">
                        <button @click="cancel" type="button"
                                class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Zrušit
                        </button>
                        <button type="submit"
                                class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Uložit
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>


<script>
import {reactive, ref} from 'vue'
import api from '../../../services/api';
import Form from "../../../utilities/form"

export default {
    setup() {
        const createForm = ref()
        const thumbnailPreview = ref(null)
        const imagesPreview = ref([])

        const form = reactive(new Form({
            title: null,
            category: null,
            thumbnail: null,
            images: []
        }))

        function showThumbnail(e) {
            let selectedFile = e.target.files[0]
            thumbnailPreview.value = URL.createObjectURL(selectedFile)
            form.thumbnail = selectedFile
        }

        function showImages(e) {
            let selectedFiles = e.target.files;
            for (let i = 0; i < selectedFiles.length; i++) {
                let img = {
                    src: URL.createObjectURL(selectedFiles[i]),
                    file: selectedFiles[i],
                }
                imagesPreview.value.push(img)
                form.images.push(selectedFiles[i])
            }
        }

        function cancel() {
            form.reset()
            createForm.value.reset()
            thumbnailPreview.value = null
            imagesPreview.value = []
        }

        async function submit() {
            await api.postGallery(form.objectToFormData())
                .then(() => {
                    form.onSuccess()
                    createForm.value.reset()
                    thumbnailPreview.value = null
                    imagesPreview.value = []
                }).catch(error => {
                    console.log(error)
                })
        }

        return {
            form,
            createForm,
            thumbnailPreview,
            imagesPreview,
            showThumbnail,
            showImages,
            cancel,
            submit
        }
    }
}
</script>
