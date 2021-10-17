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
import Edit from '../components/Admin/Dashboard/Edit';
import Create from '../components/Admin/Dashboard/Create';

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
                path: '/admin/edit',
                name: 'edit',
                component: Edit,
            },
            {
                path: '/admin/create',
                name: 'create',
                component: Create,
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
        next()
    }
})

export default router;
