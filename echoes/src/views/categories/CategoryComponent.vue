<template>
    <div class="category-bg">
    <HeaderComponent />
  <div class="category-mosaic">
    <h2 class="category-title">Productos de la categoría</h2>
    <div class="mosaic">
      <div class="mosaic-item" v-for="product in products" :key="product.id">
        <img :src="product.image_url" :alt="product.name" />
        <h4>{{ product.name }}</h4>
        <p>${{ product.price }}</p>
        <a :href="product.affiliate_link" target="_blank" class="categorias_bt home-btn">Ver tienda</a>
        <div class="seemore_bt">
          <router-link
          :to="{ name: 'Detalles', params: { id: product.id } }"
          class="buynow_bt home-btn"
          >
          Ver más
          </router-link>
          </div>               
      </div>
    </div>
  </div>
  </div>
</template>

<script>
import HeaderComponent from '@/shared/HeaderComponent.vue';
import axios from 'axios';

export default {
    components: {
      HeaderComponent
    },
  data() {
    return {
      products: [],
    }
  },
  mounted() {
    this.fetchProducts();
  },
  watch: {
    '$route.params.id': 'fetchProducts'
  },
  methods: {
    fetchProducts() {
      axios.get(`http://localhost:8000/api/products?category_id=${this.$route.params.id}`)
        .then(res => {
          this.products = res.data;
        });
    }
  }
}
</script>

<style scoped>
.category-bg {
  min-height: 100vh;
  width: 100vw;
  background: linear-gradient(135deg, #f7e9d2 0%, #c2b9ae 100%);
}
.category-mosaic {
  padding: 2em 1em;
}
.category-title {
  text-align: center;
  margin-bottom: 1.5em;
}
.mosaic {
  column-count: 4; 
  column-gap: 20px;
}
.categorias_bt.home-btn {
  display: inline-block;
  padding: 8px 22px;
  font-size: 1em;
  font-weight: bold;
  background-color: #36405c !important;
  color: #ebdac6 !important;
  border-radius: 5px;
  border: none;
  text-align: center;
  text-transform: uppercase;
  letter-spacing: 1px;
  transition: background 0.2s, color 0.2s;
  text-decoration: none;
  margin-right: 6px;
}
.categorias_bt.home-btn:hover,
.categorias_bt.home-btn:focus {
  background-color: #d35542 !important;
  color: #ebdac6 !important;
}

.mosaic-item {
  display: inline-block;
  width: 100%;
  margin-bottom: 20px;
  background: #fff;
  border-radius: 10px;
  box-shadow: 0 2px 8px #0001;
  padding: 1em;
  box-sizing: border-box;
}
.mosaic-item:hover {
  transform: translateY(-8px) scale(1.025);
  box-shadow: 0 8px 32px #38405a22;
  border-color: #d35542;
}
.mosaic-item img {
  width: 100%;
  height: auto;
  object-fit: contain;
  margin-bottom: 0.5em;
  border-radius: 8px;
}
</style>