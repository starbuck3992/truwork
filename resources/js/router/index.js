import { createWebHistory, createRouter } from "vue-router";

//Routes
const routes = [
    {
        path: '/',
        component: () => import('../components/Public/LandingPage'),
        children: [
            {
                path: '',
                name: 'home',
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
        path: '/:pathMatch(.*)*',
        component:{template: '<div>404</div>'}
    },
];


const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router;
