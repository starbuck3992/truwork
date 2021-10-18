import { createWebHistory, createRouter } from 'vue-router';
import store from '../store';

//Components
import LandingPage from '../components/Public/LandingPage';
import HomeIndex from '../components/Public/Home/Index';
import GalleryIndex from '../components/Public/Gallery/Index';
import GalleryShow from '../components/Public/Gallery/Show';

import Login from '../components/Auth/Login';

import AdminPage from '../components/Admin/AdminPage';
import DashboardIndex from '../components/Admin/Dashboard/Index';
import AdminGalleryIndex from '../components/Admin/Gallery/Index';
import AdminGalleryEdit from '../components/Admin/Gallery/Edit';
import AdminGalleryCreate from '../components/Admin/Gallery/Create';

//Routes
const routes = [
    {
        path: '/',
        component: LandingPage,
        children: [
            {
                path: '',
                name: 'homeIndex',
                component: HomeIndex,
            },
            {
                path: '/gallery',
                name: 'gallery',
                component: GalleryIndex
            },
            {
                path: '/show',
                name: 'show',
                component: GalleryShow
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
                path: '',
                name: 'dashboardIndex',
                component: DashboardIndex,
            },
            {
                path: 'gallery',
                name: 'adminGalleryIndex',
                component: AdminGalleryIndex,
            },
            {
                path: 'gallery/create',
                name: 'adminGalleryCreate',
                component: AdminGalleryCreate,
            },
            {
                path: 'gallery/edit',
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
    routes
})

router.beforeEach((to, from, next) => {

    //store.dispatch('loading', true);

    const loggedIn = store.getters['loggedIn']

    const canNavigate = to.matched.some(() => {
        if (!loggedIn && to.meta.requiresAuth) {
            return false
        }
        else return !(loggedIn && to.meta.guest);
    })

    if (!canNavigate) {
        return next('/')
    } else {
            next();
    }
})

// router.afterEach(() => {
//     store.dispatch('loading', false);
// })

export default router;
