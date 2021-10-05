import { createWebHistory, createRouter } from "vue-router";

//Routes
const routes = [
    {
        path: '/',
        component: () => import('../components/Public/LandingPage'),
        children: [
            {
                path: '',
                name: 'homeIndex',
                component: () => import('../components/Public/Home/Index'),
            },
            {
                path: '/gallery',
                name: 'gallery',
                component: () => import('../components/Public/Gallery/Index'),
            },
            {
                path: '/show',
                name: 'show',
                component: () => import('../components/Public/Gallery/Show'),
            }
        ]
    },
    {
        path: '/login',
        name: 'authLogin',
        component: () => import('../components/Auth/Login'),
    },
    {
        path: '/admin',
        name: 'admin',
        component: () => import('../components/Admin/AdminPage'),
        children: [
            {
                path: '',
                name: 'dashboardIndex',
                component: () => import('../components/Admin/Dashboard/Index'),
            }
        ]
    },
    {
        path: '/:pathMatch(.*)*',
        component:{template: '<div>404</div>'}
    },
];


const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router;
