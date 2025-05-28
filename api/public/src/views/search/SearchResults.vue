<template>
  <div class="search-results">
    <HeaderComponent />
    <div class="container">
      <h2>Resultados para "{{ $route.params.query }}"</h2>
      <div v-if="loading">Buscando productos...</div>
      <div v-else-if="products.length === 0">No se encontraron productos.</div>
      <div class="mosaic" v-else>
        <div class="mosaic-item" v-for="product in products" :key="product.id">
          <img :src="product.image_url" :alt="product.name" />
          <h4>{{ product.name }}</h4>
          <p>${{ product.price }}</p>
          <a :href="product.affiliate_link" target="_blank" class="btn btn-primary">Ver tienda</a>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios'
import HeaderComponent from '@/shared/HeaderComponent.vue'

export default {
  components: { HeaderComponent },
  data() {
    return {
      products: [],
      loading: false
    }
  },
  mounted() {
    this.searchProducts()
  },
  watch: {
    '$route.params.query': 'searchProducts'
  },
  methods: {
    searchProducts() {
      this.loading = true
      axios.get(`http://localhost:8000/api/products?search=${this.$route.params.query}`)
        .then(res => {
          this.products = res.data
        })
        .finally(() => {
          this.loading = false
        })
    }
  }
}
</script>

<style scoped>
.mosaic {
  column-count: 4;
  column-gap: 20px;
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
.mosaic-item img {
  width: 100%;
  height: 180px;
  object-fit: contain;
  margin-bottom: 0.5em;
  border-radius: 8px;
}
</style>