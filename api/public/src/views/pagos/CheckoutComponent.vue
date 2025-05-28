<template>
  <div class="checkout-bg">
    <HeaderComponent />
    <div class="checkout-container">
      <div class="checkout-card">
        <img src="@/template/images/EchoesPlus.png" alt="Echoes PLUS" class="checkout-logo" />
        <h2 class="checkout-title">Echoes PLUS</h2>
        <ul class="checkout-benefits">
          <li>✔ Correos avisando de ofertas</li>
          <li>✔ Soporte prioritario</li>
          <li>✔ Navegación sin anuncios</li>
          <li>✔ Agregar productos a favoritos</li>
        </ul>
        <div class="checkout-price">
          <span>$49.99</span> <small>/año</small>
        </div>
        <div id="paypal-button-container"></div>
      </div>
    </div>
  </div>
</template>

<script>
import HeaderComponent from '@/shared/HeaderComponent.vue';

export default {
  name: 'CheckoutComponent',
  components: { HeaderComponent },
  mounted(){
   if (window.paypal) {
      window.paypal.Buttons({
        style: {
          color: 'gold',
          shape: 'pill',
          label: 'pay',
          height: 40
        },
        createOrder: (data, actions) => {
          return actions.order.create({
            purchase_units: [{
              amount: {
                value: '49.99'
              },
              description: 'Suscripción Echoes PLUS (1 año)'
            }]
          });
        },
        onApprove: (data, actions) => {
          return actions.order.capture().then(details => {
            alert('¡Pago realizado por ' + details.payer.name.given_name + '!');
          });
        },
        onError: err => {
          alert('Ocurrió un error con el pago.'+ err);
        }
      }).render('#paypal-button-container');
    }
  }
}
</script>

<style scoped>
.checkout-bg {
  min-height: 100vh;
  width: 100vw;
  background: linear-gradient(135deg, #f7e9d2 0%, #c2b9ae 100%);
}
.checkout-container {
  flex: 1;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 40px 0;
}
.checkout-card {
  background: #fff;
  border-radius: 16px;
  box-shadow: 0 4px 24px #0002;
  padding: 2.5em 2em 2em 2em;
  max-width: 350px;
  width: 100%;
  text-align: center;
  margin-top: 40px;
}
.checkout-logo {
  width: 90px;
  margin-bottom: 18px;
  display: block;
  margin-left: auto;
  margin-right: auto;
  object-fit: contain;
}
.checkout-title {
  font-size: 2em;
  color: #36405c;
  margin-bottom: 18px;
  font-weight: bold;
  letter-spacing: 1px;
}
.checkout-benefits {
  list-style: none;
  padding: 0;
  margin-bottom: 22px;
  color: #36405c;
  font-size: 1.1em;
}
.checkout-benefits li {
  margin-bottom: 10px;
  text-align: left;
}
.checkout-price {
  font-size: 1.7em;
  color: #d35542;
  font-weight: bold;
  margin-bottom: 20px;
}
</style>