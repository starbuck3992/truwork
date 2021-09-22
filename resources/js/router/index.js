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
