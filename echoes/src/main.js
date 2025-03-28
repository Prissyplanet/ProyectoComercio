import { createApp } from 'vue'
import App from './App.vue'
import 'bootstrap'
import 'bootstrap/dist/css/bootstrap.min.css'
import './template/css/style.css'
import './template/css/responsive.css'
import './template/css/normalize.css'
import './template/css/slick.css'
import axios from 'axios'
axios.defaults.baseURL = 'http://localhost:8000/api/'
import router from './router'

createApp(App).use(router).mount('#app')
