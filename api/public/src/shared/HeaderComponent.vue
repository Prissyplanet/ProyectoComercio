<template>
    <div class="container">
        <div class="header_section_top">
            <div class="row">
                <div class="col-sm-12">
                    <div class="custom_menu">
                        <ul>
                            <li><a href="mailto:20CG0239@itsncg.edu.mx"><i class="fa fa-envelope"></i> Contacto</a></li>
                            <li><a href="https://www.facebook.com/tecnmcampusnuevocasasgrandes"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="https://www.instagram.com/tecnmcampusncg/"><i class="fa fa-instagram"></i></a></li>
                            <li><span>Proyecto escolar sin fines de lucro</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- header top section start -->
    <!-- logo section start -->
    <div class="logo_section">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="logo">
                        <router-link class="navbar-brand text-white" to="/">
                            <img src="@/template/images/Echoes.png" class="logo-img">
                        </router-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- logo section end -->
    <!-- header section start -->
    <div class="header_section">
        <div class="container">
            <div class="containt_main">
                <div id="mySidenav" class="sidenav">
                    <a href="javascript:void(0)" class="closebtn" @click="closeNav">&times;</a>
                    <a href="javascript:void(0)" class="closebtn" @click="closeNav">&times;</a>
                    <router-link to="/">Inicio</router-link>
                    <router-link to="/category/1">Ropa</router-link>
                    <router-link to="/category/2">Muebles</router-link>
                    <router-link to="/category/3">Electrónica</router-link>
                    <router-link to="/category/4">Juguetes</router-link>
                    <router-link to="/category/5">Herramientas</router-link>
                    <router-link to="/category/6">Jardín</router-link>
                    <router-link to="/category/7">Deportes</router-link>
                </div>
                <span class="toggle_icon" @click="openNav"><img src="@/template/images/toggle-icon.png"></span>
                <div class="dropdown" :class="{show: showCategories}">
                    <button 
                    class="btn categorias_bt dropdown-toggle" 
                    type="button"
                    @click="showCategories = !showCategories" 
                    id="dropdownMenuButton" 
                    data-toggle="dropdown" 
                    aria-haspopup="true" 
                    aria-expanded="showCategories"
                    >
                    Categorías 
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <router-link
                        v-for="cat in categories"
                        :key="cat.id"
                        class="dropdown-item"
                        :to="`/category/${cat.slug || cat.id}`"
                        >
                        {{ cat.name }}
                        >
                        </router-link>
                    </div>
                </div>
                <div class="main">
                    <!-- Another variation with a button -->
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Buscar productos..." v-model="searchQuery" @keyup.enter="searchProducts">
                        <div class="input-group-append">
                            <button class="btn btn-secondary" type="button" @click="searchProducts" style="background-color: #f26522; border-color:#f26522 ">
                            <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="header_box">
                    <div class="plus_box">
                        <router-link to="/sub" class="plus-btn">
                            <i class="fa fa-star"></i>
                            Echoes PLUS
                        </router-link>
                    </div>
                    <div class="login_menu">
                        <ul>
                            <li>
                            <a href="#" @click.prevent="goToCheckout">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                <span class="padding_10">Pagos</span>
                            </a>
                            </li>
                            <li v-if="!isAuthenticated">
                                <a href="#" @click.prevent="openLoginModal">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <span class="padding_10">Iniciar sesión</span>
                                </a>
                            </li>
                            <li v-else class="user-dropdown">
                                <a href="#" @click.prevent="toggleUserMenu">
                                    <i class="fa fa-user-circle" aria-hidden="true"></i>
                                    <span class="padding_10">{{ user.name }}</span>
                                </a>
                                <div class="user-menu" v-show="showUserMenu">
                                    <router-link to="/profile">Mi perfil</router-link>
                                    <a href="#" @click.prevent="logout">Cerrar sesión</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Login Modal -->
    <LoginComponent 
        v-if="showLoginModal"
        :show="showLoginModal" 
        @close="closeLoginModal"
        @logged-in="handleLoginSuccess"
    />
</template>

<script>
import LoginComponent from '@/views/login/LoginComponent.vue';
import axios from 'axios';


export default {
    name: 'HeaderComponent',
    components: {
        LoginComponent
    },
    data() {
        return {
            showLoginModal: false,
            showUserMenu: false,
            isAuthenticated: false,
            user: {},
            showCategories: false,
            categories:[],
            searchQuery: '',
        }
    },
    created() {
        this.checkAuth();
        this.fetchCategories();
    },
 
    methods: {
        goToCheckout() {
            this.$router.push({ name: 'checkout' });
        },
        searchProducts() {
            if (this.searchQuery.trim()) {
                this.$router.push({ name: 'SearchResults', params: { query: this.searchQuery } });
                this.searchQuery = '';
            }
        },
        openNav() {
            document.getElementById("mySidenav").style.width = "250px";
        },
        closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        },
        openLoginModal() {
            console.log('Abriendo modal');
            this.showLoginModal = true;
        },
        closeLoginModal() {
            this.showLoginModal = false;
        },
        toggleUserMenu() {
            this.showUserMenu = !this.showUserMenu;
        },
        async checkAuth() {
            const token = localStorage.getItem('token');
            const user = localStorage.getItem('user');
            if (token && user) {
                this.isAuthenticated = true;
                this.user = JSON.parse(user);
                axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;
            } else if (token){
            try {
                const response = await axios.get('/api/user', {
                    headers: {
                        'Authorization': `Bearer ${token}`
                    }
                });
                this.isAuthenticated = true;
                this.user = response.data;
                localStorage.setItem('user', JSON.stringify(response.data));
            } catch (error) {
                console.error("Error checking auth:", error);
                this.logout();
            }
            } else {
                this.isAuthenticated = false;
                this.user = {};
                delete axios.defaults.headers.common['Authorization'];
            }
        },
        handleLoginSuccess(userData) {
            this.isAuthenticated = true;
            this.user = userData;
            localStorage.setItem('user', JSON.stringify(userData));
            this.closeLoginModal();
        },
        async logout() {
            try {
                await axios.post('/logout', {}, {
                    headers: {
                        'Authorization': `Bearer ${localStorage.getItem('token')}`
                    }
                });
            } catch (error) {
                console.error("Logout error:", error);
            } finally {
                localStorage.removeItem('token');
                localStorage.removeItem('user');
                this.isAuthenticated = false;
                this.user = {};
                this.showUserMenu = false;
                this.$router.push('/');
            }
        },
        async fetchCategories() {
            try {
                const response = await axios.get('http://localhost:8000/api/categories');
                this.categories = response.data;
            } catch (error) {
                console.error("Error fetching categories:", error);
            }
        }
    }
}
</script>

<style scoped>
.plus_box {
    display: flex;
    align-items: center;
    margin-right: 18px;
}

.plus-btn {
    display: flex;
    align-items: center;
    background: linear-gradient(90deg, #d35542 0%, #f26522 100%);
    color: #fff !important;
    font-weight: bold;
    border-radius: 20px;
    padding: 7px 18px 7px 14px;
    font-size: 1em;
    text-decoration: none;
    box-shadow: 0 2px 8px #0001;
    transition: background 0.2s, color 0.2s;
    letter-spacing: 1px;
}

.plus-btn i {
    margin-right: 8px;
    font-size: 1.2em;
    color: #ffe066;
    text-shadow: 0 1px 2px #0003;
}

.plus-btn:hover, .plus-btn:focus {
    background: linear-gradient(90deg, #f26522 0%, #d35542 100%);
    color: #ffe066 !important;
}
.dropdown-menu {
    transition: all 0.3s cubic-bezier(.4,0,.2,1);
    transform: scaleY(0);
    transform-origin: top;
    opacity: 0;
    display: block;
    pointer-events: none;
}
.dropdown.show .dropdown-menu {
    transform: scaleY(1);
    opacity: 1;
    pointer-events: auto;
}
.logo-img {
    max-width: 250px; 
    height: auto;
}

.user-dropdown {
    position: relative;
}

.user-menu {
    position: absolute;
    right: 0;
    top: 100%;
    background: #fff;
    border: 1px solid #ddd;
    border-radius: 4px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    z-index: 1000;
    min-width: 150px;
}

.user-menu a {
    display: block;
    padding: 8px 16px;
    color: #333;
    text-decoration: none;
}

.user-menu a:hover {
    background-color: #f5f5f5;
    color: #d35542;
}

.login_menu a:hover {
    color: #d35542 !important;
}

.categorias_bt {
    background-color: #36405c !important;
    color: #ebdac6 !important;
    font-size:16px;
    text-transform: uppercase;
    font-weight: bold;
    border-radius: 5px;
    transition: background 0.2, color 0.2s;
    border: none;
}

.categorias_bt:hover, .categorias_bt:focus {
    background-color: #d35542 !important;
    color: #ebdac6 !important;
}
</style>