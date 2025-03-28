import {createRouter, createWebHistory} from 'vue-router'
import HomeComponent from '@/views/home/HomeComponent.vue'
import ContactComponent from '@/views/contact/ContactComponent.vue'
import ProductSingleComponent from '@/views/products/ProductSingleComponent.vue'
import CheckoutComponent from '@/views/pagos/CheckoutComponent.vue'
import ProfileComponent from '@/views/usuario/ProfileComponent.vue'

const routes = [
    {path: '/', name:"index",component: HomeComponent},
    {path: '/contact', name:"contact",component: ContactComponent},
    {path: '/product/show', name:"product",component: ProductSingleComponent},
    {path: '/checkout', name:"checkout",component: CheckoutComponent},
    {path: '/profile', name:"profile",component: ProfileComponent}
]
const router = createRouter({
    history: createWebHistory(),
    routes
})
export default router