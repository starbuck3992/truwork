<template>
<div class="py-6">
    <div class="max-w-7xl mx-auto px-4 py-4 sm:px-6 md:px-8">
        <h1 class="text-2xl font-semibold text-gray-900">Galerie - Editace</h1>
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
      <form class="space-y-8 divide-y divide-gray-200">
        <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
          <div>

            <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
              <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                <label for="username" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                  Název
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                  <div class="max-w-lg flex rounded-md shadow-sm">
                    <input type="text" name="name" id="name" autocomplete="name" class="flex-1 block w-full focus:ring-indigo-500 focus:border-indigo-500 min-w-0 rounded-md sm:text-sm border-gray-300" />
                  </div>
                </div>
              </div>

              <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                <label for="cover-photo" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                  Nový Náhledový obrázek
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                  <div class="max-w-lg flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                    <div class="space-y-1 text-center">
                      <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                      </svg>
                      <div class="flex text-sm text-gray-600">
                        <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                          <span>Nahrát soubor</span>
                          <input id="file-upload" name="file-upload" type="file" class="sr-only" />
                        </label>
                        <p class="pl-1">nebo jej sem přetáhněte</p>
                      </div>
                      <p class="text-xs text-gray-500">
                        PNG, JPG, GIF up to 10MB
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="pt-5">
          <div class="flex justify-end">
            <button type="button" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              Cancel
            </button>
            <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              Save
            </button>
          </div>
        </div>
      </form>
      <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8 mt-5">
        <ul role="list" class="grid grid-cols-2 gap-x-4 gap-y-8 sm:grid-cols-3 sm:gap-x-6 lg:grid-cols-4 xl:gap-x-8">
          <li class="relative">
            <div class="group block w-full aspect-w-10 aspect-h-7 rounded-lg bg-gray-100 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-offset-gray-100 focus-within:ring-indigo-500 overflow-hidden">
              <button type="button" class="absolute inset-0 focus:outline-none w-full border-2 border-gray-300 border-dashed rounded-lg p-12 text-center hover:border-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                  <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                      <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                  </svg>
                  <span class="mt-2 block text-sm font-medium text-gray-900">
                      Přidat obrázek
                  </span>
              </button>
          </div>
          </li>
          <li v-for="file in files" :key="file.source" class="relative">
            <div class="relative group block w-full aspect-w-10 aspect-h-7 rounded-lg bg-gray-100 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-offset-gray-100 focus-within:ring-indigo-500 overflow-hidden">
              <img :src="file.source" alt="" class="object-cover pointer-events-none group-hover:opacity-75" />
              <XCircleIcon class="sm:block m-auto absolute text-red-900 right-0 top-0 bg-white h-10 w-10 z-10"></XCircleIcon>
            </div>
            <p class="mt-2 block text-sm font-medium text-gray-900 truncate pointer-events-none">{{ file.title }}</p>
            <!-- <p class="block text-sm font-medium text-gray-500 pointer-events-none">{{ file.size }}</p> -->
          </li>
        </ul>
      </div>
    </div>
</div>
</template>

<script>
import {XCircleIcon} from '@heroicons/vue/outline'

const files = [
  {
    title: 'Kuchyň A',
    size: '3.9 MB',
    source:
      'https://images.unsplash.com/photo-1582053433976-25c00369fc93?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=512&q=80',
  },
  {
    title: 'Kuchyň B',
    size: '3.9 MB',
    source:
      'https://images.unsplash.com/photo-1582053433976-25c00369fc93?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=512&q=80',
  },
  {
    title: 'Kuchyň C',
    size: '3.9 MB',
    source:
      'https://images.unsplash.com/photo-1582053433976-25c00369fc93?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=512&q=80',
  },
  {
    title: 'Kuchyň D',
    size: '3.9 MB',
    source:
      'https://images.unsplash.com/photo-1582053433976-25c00369fc93?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=512&q=80',
  },
  {
    title: 'Kuchyň E',
    size: '3.9 MB',
    source:
      'https://images.unsplash.com/photo-1582053433976-25c00369fc93?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=512&q=80',
  },
  {
    title: 'Kuchyň F',
    size: '3.9 MB',
    source:
      'https://images.unsplash.com/photo-1582053433976-25c00369fc93?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=512&q=80',
  },
  {
    title: 'Kuchyň G',
    size: '3.9 MB',
    source:
      'https://images.unsplash.com/photo-1582053433976-25c00369fc93?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=512&q=80',
  },
  {
    title: 'Kuchyň H',
    size: '3.9 MB',
    source:
      'https://images.unsplash.com/photo-1582053433976-25c00369fc93?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=512&q=80',
  },
  // More files...
]

export default {
  components: {
      XCircleIcon,
  },
  setup() {
    return {
      files,
      XCircleIcon,
    }
  },
}
</script>