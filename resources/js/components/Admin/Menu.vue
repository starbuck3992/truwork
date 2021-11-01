<template>
  <div class="h-screen flex overflow-hidden bg-white">
    <TransitionRoot as="template" :show="sidebarOpen">
      <Dialog as="div" class="fixed inset-0 flex z-40 md:hidden" @close="sidebarOpen = false">
        <TransitionChild as="template" enter="transition-opacity ease-linear duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="transition-opacity ease-linear duration-300" leave-from="opacity-100" leave-to="opacity-0">
          <DialogOverlay class="fixed inset-0 bg-gray-600 bg-opacity-75" />
        </TransitionChild>
        <TransitionChild as="template" enter="transition ease-in-out duration-300 transform" enter-from="-translate-x-full" enter-to="translate-x-0" leave="transition ease-in-out duration-300 transform" leave-from="translate-x-0" leave-to="-translate-x-full">
          <div class="relative flex-1 flex flex-col max-w-xs w-full bg-white">
            <TransitionChild as="template" enter="ease-in-out duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="ease-in-out duration-300" leave-from="opacity-100" leave-to="opacity-0">
              <div class="absolute top-0 right-0 -mr-12 pt-2">
                <button type="button" class="ml-1 flex items-center justify-center h-10 w-10 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" @click="sidebarOpen = false">
                  <span class="sr-only">Close sidebar</span>
                  <XIcon class="h-6 w-6 text-white" aria-hidden="true" />
                </button>
              </div>
            </TransitionChild>
            <div class="flex-1 h-0 pt-5 pb-4 overflow-y-auto">
              <div class="flex-shrink-0 flex items-center px-4">
                <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-logo-indigo-600-mark-gray-800-text.svg" alt="Workflow" />
              </div>
              <nav class="mt-5 px-2 space-y-1">
                <router-link :to="{ name: 'homeIndex' }" class="bg-gray-100 text-gray-900 group flex items-center px-2 py-2 text-sm font-medium rounded-md"><HomeIcon class="h-6 w-6 mr-3"></HomeIcon>Home</router-link>
                <router-link :to="{ name: 'adminGalleryIndex' }" class="bg-gray-100 text-gray-900 group flex items-center px-2 py-2 text-sm font-medium rounded-md"><FolderIcon class="h-6 w-6 mr-3"></FolderIcon>Galerie</router-link>
              </nav>
            </div>
          </div>
        </TransitionChild>
        <div class="flex-shrink-0 w-14">
          <!-- Force sidebar to shrink to fit close icon -->
        </div>
      </Dialog>
    </TransitionRoot>

    <!-- Static sidebar for desktop -->
    <div class="hidden md:flex md:flex-shrink-0">
      <div class="flex flex-col w-64">
        <!-- Sidebar component, swap this element with another sidebar if you like -->
        <div class="flex-1 flex flex-col min-h-0 border-r border-gray-200 bg-white">
          <div class="flex-1 flex flex-col pt-5 overflow-y-auto">
            <div class="flex items-center flex-shrink-0 px-4">
              <router-link :to="{ name: 'homeIndex' }">
                <img class="h-auto w-full m-auto" src="/storage/images/logo.png" alt="Logo" />
              </router-link>
            </div>
            <nav class="mt-5 flex-1 px-2 bg-white space-y-1">
              <router-link @click="selected_item = 1" :to="{ name: 'homeIndex' }" :class="[selected_item == 1 ? 'bg-gray-300' : 'bg-white','hover:bg-gray-200 text-gray-900 group flex items-center px-2 py-2 text-sm font-medium rounded-md']">
                <HomeIcon class="h-6 w-6 mr-3"></HomeIcon>Domů
              </router-link>
              <div class="mt-5 flex-1 bg-white space-y-1">
                  <div class="relative w-full">
                    <a href="#" @click="open=!open; selected_item = 2;" :class="[selected_item == 2 ? 'bg-gray-300' : 'bg-white','hover:bg-gray-200 text-gray-900 group flex items-center px-2 py-2 text-sm font-medium rounded-md']">
                      <FolderIcon class="h-6 w-6 mr-3"></FolderIcon>Galerie
                      <span class="absolute right-3 flex items-center">
                        <PlusSmIcon v-if="!open" class="h-5 w-5" aria-hidden="true" />
                        <MinusSmIcon v-else class="h-5 w-5" aria-hidden="true" />
                      </span>
                    </a>
                  </div>
                  <div v-show="open" class="flex">
                    <div class="space-y-1 w-full">
                      <div class="flex-1 items-end w-full">
                        <router-link :to="{ name: 'adminGalleryIndex' }" class="ml-5 mb-1 hover:bg-gray-200 text-gray-900 group flex items-end px-2 py-2 text-sm font-medium rounded-md">
                          <DocumentTextIcon class="h-6 w-6 mr-3 items-end"></DocumentTextIcon>Seznam
                        </router-link>
                        <router-link :to="{ name: 'adminGalleryCreate' }" class="ml-5 mb-1 hover:bg-gray-200 text-gray-900 group flex items-end px-2 py-2 text-sm font-medium rounded-md">
                          <DocumentAddIcon class="h-6 w-6 mr-3 items-end"></DocumentAddIcon>Vytvořit
                        </router-link>
                      </div>
                    </div>
                  </div>
                </div>
            </nav>
            <div class="flex-shrink-0 flex bg-gray-200 p-4">
              <a href="#" class="flex-shrink-0 w-full group block">
                <div class="flex items-center">
                  <div>
                    <img class="inline-block h-9 w-9 rounded-full object-cover" 
                      src="https://scontent.fprg4-1.fna.fbcdn.net/v/t31.18172-8/10662082_376000669217269_7408501700190222776_o.jpg?_nc_cat=102&ccb=1-5&_nc_sid=09cbfe&_nc_ohc=cVwEL2u6AS0AX-eJi5a&tn=5qI38hRPvv5oRhaj&_nc_ht=scontent.fprg4-1.fna&oh=0b2dbbdf3be5afc2a1b73619a1d4130b&oe=61A3AAC8"
                      alt="" 
                    />
                  </div>
                  <div class="ml-2">
                    <p class="text-xs font-medium text-gray-900">
                      Pavel Švardala
                    </p>
                    <p class="text-xs font-medium text-gray-900">
                      Administrator
                    </p>
                  </div>
                  <div class="ml-2">
                    <Logout 
                      style="font-size: 0.75rem; line-height: 1rem; padding:2px;">
                    </Logout>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="flex flex-col w-0 flex-1 overflow-hidden">
      <div class="md:hidden pl-1 pt-1 sm:pl-3 sm:pt-3">
        <button type="button" class="-ml-0.5 -mt-0.5 h-12 w-12 inline-flex items-center justify-center rounded-md text-gray-500 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500" @click="sidebarOpen = true">
          <span class="sr-only">Open sidebar</span>
          <MenuIcon class="h-6 w-6" aria-hidden="true" />
        </button>
      </div>
      <main class="flex-1 relative z-0 overflow-y-auto focus:outline-none">
       <!-- Replace with your content -->
            <router-view></router-view>
        <!-- /End replace -->
      </main>
    </div>
  </div>
</template>

<script>
import { ref } from 'vue'
import { Dialog, DialogOverlay, TransitionChild, TransitionRoot} from '@headlessui/vue'
import Logout from '../Auth/Logout'
import {
  FolderIcon,
  HomeIcon,
  MenuIcon,
  XIcon,
  PlusSmIcon,
  MinusSmIcon,
  DocumentTextIcon,
  DocumentAddIcon,
} from '@heroicons/vue/outline'


export default {
  components: {
    Dialog,
    DialogOverlay,
    TransitionChild,
    TransitionRoot,
    MenuIcon,
    HomeIcon,
    XIcon,
    FolderIcon,
    PlusSmIcon,
    MinusSmIcon,
    DocumentTextIcon,
    DocumentAddIcon,
    Logout,
  },
  setup() {
    const sidebarOpen = ref(false);
    const open = ref(true);
    const selected_item = 2;
    return {
      sidebarOpen,
      open,
      selected_item,
    }
  },
}
</script>
<style scoped>
  .router-link-active{
    --tw-bg-opacity: 1;
    background-color: rgba(209, 213, 219, var(--tw-bg-opacity));
  }
</style>