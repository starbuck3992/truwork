import {createWebHistory, createRouter} from 'vue-router';
import store from '../store';

//Components
import LandingPage from '../components/Public/LandingPage.vue';
import HomeIndex from '../components/Public/Home/Index.vue';
import GalleryIndex from '../components/Public/Gallery/Index.vue';
import GalleryKitchen from '../components/Public/Gallery/Kitchen.vue';
import GalleryShow from '../components/Public/Gallery/Show.vue';

import Login from '../components/Auth/Login.vue';

import AdminPage from '../components/Admin/AdminPage.vue';
import AdminGalleryIndex from '../components/Admin/Gallery/Index.vue';
import AdminGalleryEdit from '../components/Admin/Gallery/Edit.vue';
import AdminGalleryCreate from '../components/Admin/Gallery/Create.vue';

//Routes
const routes = [
    {
        path: '/',
        component: LandingPage,
        children: [
            {
                path: '',
                name: 'homeIndex',
                component: HomeIndex
            },
            {
                path: 'galleries',
                name: 'galleriesIndex',
                component: GalleryIndex
            },
            {
                path: 'galleries/:slug',
                name: 'galleriesShow',
                component: GalleryShow
            },
            {
                path: 'galleries-kitchen',
                name: 'galleriesKitchen',
                component: GalleryKitchen
            }
        ]
    },
    {
        path: '/login',
        name: 'authLogin',
        component: Login,
        meta: {
            guest: true
        }
    },
    {
        path: '/admin',
        component: AdminPage,
        meta: {
            requiresAuth: true
        },
        children: [
            {
                path: 'galleries',
                name: 'adminGalleryIndex',
                component: AdminGalleryIndex,
            },
            {
                path: 'galleries/create',
                name: 'adminGalleryCreate',
                component: AdminGalleryCreate,
            },
            {
                path: 'galleries/edit/:id',
                name: 'adminGalleryEdit',
                component: AdminGalleryEdit,
            }
        ]
    },
    {
        path: '/:pathMatch(.*)*',
        redirect: '/'
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
    scrollBehavior(to, from, savedPosition) {
        if (savedPosition) {
          return savedPosition
        }
        if (to.hash) {
          return { el: to.hash }
        }
        return { x: 0, y: 0 }
    }
})

router.beforeEach((to, from, next) => {

    const loggedIn = store.getters['userModule/loggedIn']

    const canNavigate = to.matched.some(() => {
        if (!loggedIn && to.meta.requiresAuth) {
            return false
        } else return !(loggedIn && to.meta.guest)
    })

    if (!canNavigate) {
        return next('/')
    } else {
        next()
    }
})

export default router
