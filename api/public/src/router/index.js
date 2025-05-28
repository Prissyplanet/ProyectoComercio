import {createRouter, createWebHashHistory} from 'vue-router'
import HomeComponent from '@/views/home/HomeComponent.vue'
import ContactComponent from '@/views/contact/ContactComponent.vue'
import ProductSingleComponent from '@/views/products/ProductSingleComponent.vue'
import CheckoutComponent from '@/views/pagos/CheckoutComponent.vue'
import UserProfileComponent from '@/views/profile/UserProfileComponent.vue'

const routes = [
    {path: '/', name:"index",component: HomeComponent},
    {path: '/contact', name:"contact",component: ContactComponent},
    {path: '/product/show', name:"product",component: ProductSingleComponent},
    {path: '/checkout', name:"checkout",component: CheckoutComponent},
    {path: '/profile', name:"profile",component: UserProfileComponent, meta: {requiresAuth: true}},
    {path: '/category/:id', name: 'CategoryComponent', component:()=> import('@/views/categories/CategoryComponent.vue')},
    {path: '/search/:query',name: 'SearchResults',component: () => import('@/views/search/SearchResults.vue')},
    {path: '/sub', name: 'Subscription',component: () => import('@/views/sub/SubComponent.vue')},
    {path: '/detalles/:id',name: 'Detalles',component: () => import('@/views/detalles/DetallesComponent.vue')},
]
const router = createRouter({
    history: createWebHashHistory(),
    routes
})

export default router