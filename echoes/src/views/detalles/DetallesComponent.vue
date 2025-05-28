<template>
  <div class="detalles-overlay">
    <div class="detalles-content" v-if="product">
      <h2 class="detalles-title">{{ product.name }}</h2>
      <img :src="product.image_url" alt="Imagen del producto" class="detalles-img" />
      <p><strong>Categoría:</strong> {{ product.category?.name }}</p>
      <p><strong>Marca:</strong> {{ product.brand?.name }}</p>
      <p><strong>Precio:</strong> ${{ product.price }}</p>
      <p><strong>Descripción:</strong> {{ product.description }}</p>
      <a
        :href="product.affiliate_link"
        target="_blank"
        rel="noopener"
        class="categorias_bt detalles-btn"
        style="margin-left: 10px;"
      >Ver tienda</a>
        <button class="buynow_bt detalles-btn" style="margin-left: 10px;" @click="$router.back()">Volver</button>    
    </div>
    <div v-else class="detalles-loading">
      Cargando detalles...
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: 'DetallesComponent',
  data() {
    return {
      product: null
    }
  },
  async created() {
    const id = this.$route.params.id;
    try {
      const response = await axios.get(`http://localhost:8000/api/products/${id}`);
      this.product = response.data;
    } catch (error) {
      this.product = null;
      alert('No se pudo cargar el producto.');
    }
  }
}
</script>

<style scoped>
.categorias_bt.detalles-btn {
  display: inline-block;
  margin: 0 8px;
  padding: 10px 28px;
  font-size: 1em;
  font-weight: bold;
  background-color: #36405c !important;
  color: #ebdac6 !important;
  border-radius: 5px;
  border: none;
  text-transform: uppercase;
  letter-spacing: 1px;
  transition: background 0.2s, color 0.2s;
  text-decoration: none;
}
.categorias_bt.detalles-btn:hover,
.categorias_bt.detalles-btn:focus {
  background-color: #d35542 !important;
  color: #ebdac6 !important;
}

.buynow_bt.detalles-btn {
  display: inline-block;
  margin: 0 8px;
  padding: 10px 28px;
  font-size: 1em;
  font-weight: bold;
  background: linear-gradient(90deg, #d35542 0%, #f26522 100%);
  color: #fff !important;
  border-radius: 20px;
  text-transform: uppercase;
  letter-spacing: 1px;
  text-decoration: none;
  border: none;
  box-shadow: 0 2px 8px #0001;
  transition: background 0.2s, color 0.2s;
}
.buynow_bt.detalles-btn:hover,
.buynow_bt.detalles-btn:focus {
  background: linear-gradient(90deg, #f26522 0%, #d35542 100%);
  color: #ffe066 !important;
}
.detalles-overlay {
  position: fixed;
  top: 0; left: 0; right: 0; bottom: 0;
  z-index: 2000;
  display: flex;
  align-items: center;
  justify-content: center;
  padding:32px 0;
  min-height: 100vh;
  overflow: hidden;
}
.detalles-overlay::before {
  content: "";
  position: absolute;
  top: -20%;
  left: -20%;
  width: 140vw;
  height: 140vh;
  background: url('@/template/images/Echoes.png') repeat;
  background-size: 420px auto;
  opacity: 0.18;
  transform: rotate(-18deg);
  z-index: 0;
  animation: move-bg 60s linear infinite;
  pointer-events: none;
}
@keyframes move-bg {
  0% { background-position: 0 0; }
  100% { background-position: 1000px 0; }
}
.detalles-content {
  background: #fff;
  border-radius: 16px;
  box-shadow: 0 4px 24px #0002;
  padding: 2.5em 2em 2em 2em;
  max-width: 500px;
  max-height: 90vh;
  overflow-y: auto;
  width: 100%;
  text-align: center;
  position: relative;
  z-index: 1;
}
.detalles-title {
  font-size: 2em;
  color: #36405c;
  margin-bottom: 18px;
  font-weight: bold;
  letter-spacing: 1px;
}
.detalles-img {
  max-width: 100%;
  height: auto;
  margin-bottom: 18px;
  border-radius: 8px;
}
.detalles-loading {
  text-align: center;
  margin-top: 60px;
  font-size: 1.2em;
  color: #888;
  z-index: 2;
}
</style>