<template>
  <Disclosure as="header" class="bg-gray-800">
    <div class="max-w-7xl mx-auto px-2 sm:px-4 lg:divide-y lg:divide-gray-700 lg:px-8 pt-10">
      <div class="relative h-auto flex justify-between md:pb-16">
        <div class="hidden relative z-10 px-2 md:flex lg:px-0">
          <div class="flex-shrink-0 flex items-center">
            <div>
                <p class="text-white text-base mb-2">Email :    truwork@truwork.com</p>
                <table>
                  <tr>
                    <td class="mr-3"><p class="text-white text-base mb-2">Telefon :  607 237 514</p></td><td><img class="h-6 w-6 ml-2 inline-block align-baseline" src="/storage/images/initialize/en-flag.png"></td>
                  </tr>
                </table>
                <p class="text-white text-base mb-2">Telefon :  607 237 514</p>
                <p class="text-white text-base">Adresa : Jeseník 790 00, Astur 185</p>
            </div>
          </div>
        </div>
        <div class="relative z-0 flex-1 px-2 flex items-center justify-center sm:absolute sm:inset-0">
          <div class="w-full sm:max-w-xs">
            <div class="relative">
              <div class="pointer-events-none absolute inset-y-0 left-0 pl-3 flex items-center">
              </div>
              <img src="/storage/images/initialize/logo-white.png" alt="Workflow" class="block h-16 w-auto pb-2 m-auto" />
              <p class="text-white text-xl mb-2 sm:pb-8 text-center">Zakázková výroba na míru</p>
            </div>
            <div class="relative md:hidden pb-2" @click="showMenu = !showMenu">
              <table class="justify-center m-auto">
                <tr>
                  <td><p class="text-white text-2xl mb-2 text-center">MENU</p></td>
                  <td>
                      <svg v-if="!showMenu" xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white inline-block align-baseline" fill="none" viewBox="0 0 24 24" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" /></svg>
                      <svg v-if="showMenu" xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white inline-block align-baseline" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                  </td>
                </tr>
              </table>
              <!-- <svg xmlns="http://www.w3.org/2000/svg" v-if="showMenu" class="h-6 w-6 justify-center m-auto text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 11l3-3m0 0l3 3m-3-3v8m0-13a9 9 0 110 18 9 9 0 010-18z" />
              </svg>

              <svg xmlns="http://www.w3.org/2000/svg"  v-if="!showMenu" class="h-6 w-6 justify-center m-auto text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13l-3 3m0 0l-3-3m3 3V8m0 13a9 9 0 110-18 9 9 0 010 18z" />
              </svg> -->
            </div>
          </div>
        </div>
        <div class="hidden md:z-10 md:ml-4 md:flex md:items-center">
          <button type="button" class="block bg-gray-800 flex-shrink-0 rounded-full p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
            <a v-for="item in social" :key="item.name" :href="item.href" :class="['text-gray-300 hover:bg-gray-700 hover:text-white', 'rounded-md py-2 px-3 inline-flex items-center text-sm font-medium']" :aria-current="item.current ? 'page' : undefined">
                <component :is="item.icon" class="h-10 w-10" aria-hidden="true" />
            </a>
          </button>
        </div>
      </div>
      <nav class="hidden md:py-2 md:flex md:space-x-8 md:justify-center" aria-label="Global">
        <router-link v-for="item in navigation" :key="item.name" :to="{ name: item.href.name, query: item.href.parameters }" :class="[item.current ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white', 'rounded-md py-4 px-3 inline-flex items-center text-base font-medium']" :aria-current="item.current ? 'page' : undefined">
          {{ item.name }}
        </router-link>
      </nav>
      <div v-show="showMenu" class="relative md:hidden" id="mobile-menu" x-show="open">
        <div class="px-2 pt-2 pb-3 space-y-1">
          <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
          <router-link v-for="item in navigation" :key="item.name" :to="{ name: item.href.name, query: item.href.parameters }" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium text-center">
            {{item.name}}
          </router-link>
        </div>
        
      </div>
    </div>
  </Disclosure>
</template>

<script>
import { Disclosure, DisclosureButton, DisclosurePanel, Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue'
import {ref,watch,defineComponent, h} from 'vue'
import {useRoute} from 'vue-router'
import {
    CheckIcon,
    MenuIcon,
    XIcon,
    BellIcon,
} from '@heroicons/vue/outline'
import {ChevronDownIcon} from '@heroicons/vue/solid'

const navigation = [
    { name: 'Domů', 
      href: {
        name : 'homeIndex',
        parameters : {},
      }
    },
    { name: 'Kuchyně', 
      href: {
        name : 'galleriesKitchen',
        parameters : {},
      }
    },
    { name: 'Skříně', 
      href: {
        name : 'galleriesIndex',
        parameters : {
            category: 'skrine'
          }
      }
    },
    { name: 'Komerční prostory', 
      href: {
        name : 'galleriesIndex',
        parameters : { 
          category :'komercni_prostory',
        }
      }
    },
    { name: 'Koupelny', 
      href: {
        name : 'galleriesIndex',
        parameters : { 
          category: 'koupelny'
        }
      }
    },
    { name: 'Doplňky/Detaily', 
      href: {
        name : 'galleriesIndex',
        parameters : {
          category : 'doplnky'
        },
      }
    },
    { name: 'Kontakt', 
       href: {
        name : '',
        parameters : {},
      }
    },
]

const social = [
    {
      name: 'Facebook',
      href: '#',
      icon: defineComponent({
        render: () =>
          h('svg', { fill: 'currentColor', viewBox: '0 0 24 24' }, [
            h('path', {
              'fill-rule': 'evenodd',
              d:
                'M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z',
              'clip-rule': 'evenodd',
            }),
          ]),
      }),
    },
    {
      name: 'Instagram',
      href: '#',
      icon: defineComponent({
        render: () =>
          h('svg', { fill: 'currentColor', viewBox: '0 0 24 24' }, [
            h('path', {
              'fill-rule': 'evenodd',
              d:
                'M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z',
              'clip-rule': 'evenodd',
            }),
          ]),
      }),
    }
  ]

export default {
    components: {
        Disclosure,
        DisclosureButton,
        DisclosurePanel,
        Menu,
        MenuButton,
        MenuItem,
        MenuItems,
        BellIcon,
        ChevronDownIcon,
        MenuIcon,
        XIcon,
    },
    setup() {
        const showMenu = ref(false);
        const route = useRoute()

        watch(() => route.query.category, (val) => {
            if (val) {
                showMenu.value = false
            }
        });
        return {
            navigation,
            showMenu,
            social,
        }
    },
}
</script>

