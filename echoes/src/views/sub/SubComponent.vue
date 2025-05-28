<template>
  <div class="modal-overlay">
    <div class="modal-content">
      <img src="@/template/images/EchoesPlus.png" alt="Echoes plus" />
      <h2 class="sub-title">Echoes PLUS</h2>
      <ul class="sub-benefits">
        <li>✔ Correos avisando de ofertas</li>
        <li>✔ Soporte prioritario</li>
        <li>✔ Navegación sin anuncios</li>
        <li>✔ Agregar productos a favoritos</li>
      </ul>
      <div class="sub-price">
        <span>$49.99</span> <small>/año</small>
      </div>
      <button class="btn btn-primary sub-pay-btn" @click="gotoCheckout">Pagar con PayPal</button>
      <button class="close-btn" @click="closeModal">&times;</button>
    </div>
  </div>
</template>

<script>
export default {
  methods:{
    closeModal() {
      this.$router.back();
    },
    gotoCheckout(){
        this.$router.push({ name: 'checkout' });
    },
  },
}
</script>

<style scoped>
.modal-overlay {
  position: fixed;
  top: 0; left: 0; right: 0; bottom: 0;
  z-index: 3000;
  display: flex;
  align-items: center;
  justify-content: center;
  overflow: hidden;
}

.modal-overlay::before {
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

.modal-content {
  background: #fff;
  border-radius: 16px;
  box-shadow: 0 4px 24px #0002;
  padding: 2.5em 2em 2em 2em;
  max-width: 350px;
  width: 100%;
  text-align: center;
  position: relative;
  z-index: 1;
}

.sub-logo {
  width: 90px;
  height: auto;
  margin-bottom: 18px;
  display: block;
  margin-left: auto;
  margin-right: auto;
  object-fit: contain;
}
.sub-title {
  font-size: 2em;
  color: #36405c;
  margin-bottom: 18px;
  font-weight: bold;
  letter-spacing: 1px;
}
.sub-benefits {
  list-style: none;
  padding: 0;
  margin-bottom: 22px;
  color: #36405c;
  font-size: 1.1em;
}
.sub-benefits li {
  margin-bottom: 10px;
  text-align: left;
}
.sub-price {
  font-size: 1.7em;
  color: #d35542;
  font-weight: bold;
  margin-bottom: 20px;
}
.sub-pay-btn {
  width: 100%;
  padding: 12px 0;
  font-size: 1.1em;
  background: #ffc439;
  color: #222;
  border: none;
  border-radius: 8px;
  font-weight: bold;
  cursor: pointer;
  margin-top: 10px;
}
.close-btn {
  position: absolute;
  top: 10px;
  right: 18px;
  background: transparent;
  border: none;
  font-size: 2em;
  color: #d35542;
  cursor: pointer;
}
</style>