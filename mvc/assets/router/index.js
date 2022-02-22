import { createRouter, createWebHistory } from 'vue-router'


const routes = [
    {
        path: '/addCake',
        component: () => import('../views/AddCake.vue')
    },
    {
        path: '/editCake',
        component: () => import('../views/EditCake.vue')
    },
    {
        path: '/cakes',
        component: () => import('../views/Cakes.vue')
    },
    {
        path: '/cakes/:id',
        component: () => import('../views/Cake.vue')
    }
]

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes
})

export default router