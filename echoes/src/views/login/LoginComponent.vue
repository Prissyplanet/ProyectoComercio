<template>
  <div class="modal-overlay" v-if="showModal">
    <div class="modal-content">
      <template v-if="!showRegister">
        <h2 class="modal-title">Iniciar sesión</h2>
        <form @submit.prevent="handleLogin">
          <input v-model="email" type="email" placeholder="Correo electrónico" required class="modal-input">
          <div class="password-field">
            <input
              v-model="password"
              :type="showPassword ? 'text' : 'password'"
              placeholder="Contraseña"
              required
              class="modal-input"
            >
            <span class="toggle-eye" @click="showPassword = !showPassword">
              <i :class="showPassword ? 'fa fa-eye-slash' : 'fa fa-eye'"></i>
            </span>
          </div>          
        <button type="submit" class="btn modal-btn">Ingresar</button>
        </form>
        <p @click="toggleRegister" class="modal-link">¿No tienes cuenta? Regístrate</p>
      </template>
      <template v-else>
        <h2 class="modal-title">Registro</h2>
        <form @submit.prevent="handleRegister">
          <input v-model="registerData.name" type="text" placeholder="Nombre" required class="modal-input">
          <input v-model="registerData.email" type="email" placeholder="Correo electrónico" required class="modal-input">
          <div class="password-field">
          <input
            v-model="registerData.password"
            :type="showRegisterPassword ? 'text' : 'password'"
            placeholder="Contraseña"
            required
            class="modal-input"
          >
          <span class="toggle-eye" @click="showRegisterPassword = !showRegisterPassword">
            <i :class="showRegisterPassword ? 'fa fa-eye-slash' : 'fa fa-eye'"></i>
          </span>
        </div>
        <div class="password-field">
          <input
            v-model="registerData.password_confirmation"
            :type="showRegisterPasswordConfirm ? 'text' : 'password'"
            placeholder="Confirmar contraseña"
            required
            class="modal-input"
          >
          <span class="toggle-eye" @click="showRegisterPasswordConfirm = !showRegisterPasswordConfirm">
            <i :class="showRegisterPasswordConfirm ? 'fa fa-eye-slash' : 'fa fa-eye'"></i>
          </span>
        </div>
          <button type="submit" class="btn modal-btn">Registrarse</button>
        </form>
        <p @click="toggleRegister" class="modal-link">¿Ya tienes cuenta? Inicia sesión</p>
      </template>
      <button class="close-btn" @click="closeModal">&times;</button>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  props: {
    show: {
      type: Boolean,
      default: false
    }
  },
  data() {
    return {
      showPassword: false,
      showRegisterPassword: false,
      showRegisterPasswordConfirm: false,
      showModal: this.show,
      showRegister: false,
      email: '',
      password: '',
      registerData: {
        name: '',
        email: '',
        password: '',
        password_confirmation: ''
      }
    }
  },
  watch: {
    show(newVal) {
      this.showModal = newVal;
    }
  },
  methods: {
    openModal() {
      this.showModal = true;
    },
    closeModal() {
      this.showModal = false;
      this.showRegister = false;
    },
    toggleRegister() {
      this.showRegister = !this.showRegister;
    },
    async handleLogin() {
      try {
        const response = await axios.post('/login', {
          email: this.email,
          password: this.password
        });
        localStorage.setItem('token', response.data.token);
        this.$emit('logged-in', response.data.user);
        this.closeModal();
        this.$router.push('/');
      } catch (error) {
        if (error.response && error.response.status === 422 && error.response.data) {
          const errors = error.response.data;
          let messages = [];
          for (const key in errors) {
            if (Array.isArray(errors[key])) {
              messages = messages.concat(errors[key]);
            }
        }
        alert(messages.join('\n'));
      }else{
        alert(error.response?.data?.message || 'Error al iniciar sesión');
      }
      }
    },
    async handleRegister() {
      try {
        const response = await axios.post('/register', this.registerData);
        localStorage.setItem('token', response.data.token);
        this.$emit('logged-in', response.data.user);
        this.closeModal();
        this.$router.push('/');
      } catch (error) {
        if (error.response && error.response.status === 422 && error.response.data) {
          const errors = error.response.data;
          let messages = [];
          for (const key in errors) {
            if (Array.isArray(errors[key])) {
              messages = messages.concat(errors[key]);
            }
        }
        alert(messages.join('\n'));
      }else{
        alert(error.response?.data?.message || 'Error al registrarse');
      }
      }
    }
  }
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
  background: rgba(255, 255, 255, 1);

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
  opacity: 0.70;
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
.modal-title {
  font-size: 2em;
  color: #36405c;
  margin-bottom: 18px;
  font-weight: bold;
  letter-spacing: 1px;
}
.modal-input {
  width: 100%;
  margin-bottom: 16px;
  padding: 10px;
  border-radius: 6px;
  border: 1px solid #ccc;
  font-size: 1em;
}
.modal-btn {
  width: 100%;
  padding: 12px 0;
  font-size: 1.1em;
  background: #d35542;
  color: #fff;
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
.modal-link {
  cursor: pointer;
  color: #36405c;
  text-decoration: underline;
  margin-top: 1rem;
  display: block;
}
.password-field {
  position: relative;
}
.toggle-eye {
  position: absolute;
  right: 14px;
  top: 50%;
  transform: translateY(-50%);
  cursor: pointer;
  color: #aaa;
  font-size: 1.1em;
  z-index: 2;
}
.password-field input {
  padding-right: 36px;
}
</style>