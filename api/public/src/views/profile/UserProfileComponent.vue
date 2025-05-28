<template>

  <div class="user-profile-container">
    <button @click="goBack" class="back-button">
      <i class="fa fa-arrow-left"></i> Volver
    </button>
    <div class="profile-header" style="background: #deba8d;">
      <h1 style="color: #36405c;">Mi Perfil</h1>
    </div>

    <div class="profile-content">
      <div class="profile-sidebar">
        <div class="avatar-container">
          <img :src="user.avatar || '@/assets/default-avatar.png'" class="avatar" />
          <button @click="triggerFileInput" class="change-avatar-btn">Cambiar foto</button>
          <input 
            type="file" 
            ref="fileInput" 
            @change="handleAvatarChange" 
            accept="image/*" 
            style="display: none;"
          >
        </div>
        
        <div class="user-stats">
          <div class="stat-item">
            <i class="fa fa-heart"></i>
            <span>{{ favoritesCount }} Favoritos</span>
          </div>
          <div class="stat-item">
            <i class="fa fa-clock"></i>
            <span>Miembro desde {{ joinDate }}</span>
          </div>
        </div>
      </div>

      <div class="profile-form">
        <form @submit.prevent="updateProfile">
          <div class="form-group">
            <label>Nombre</label>
            <input v-model="user.name" type="text" class="vintage-input">
          </div>
          
          <div class="form-group">
            <label>Email</label>
            <input v-model="user.email" type="email" disabled class="vintage-input">
          </div>
          
          <div class="form-group">
            <label>Biografía</label>
            <textarea v-model="user.bio" class="vintage-textarea" placeholder="Cuéntanos sobre tu amor por lo vintage..."></textarea>
          </div>
          
          <div class="password-section">
            <h3>Cambiar contraseña</h3>
            <div class="form-group">
              <label>Contraseña actual</label>
              <input v-model="currentPassword" type="password" class="vintage-input">
            </div>
            <div class="form-group">
              <label>Nueva contraseña</label>
              <input v-model="newPassword" type="password" class="vintage-input">
            </div>
          </div>
          
          <button type="submit" class="save-btn">Guardar cambios</button>
        </form>
      </div>
    </div>

    <div class="favorites-section">
      <h2>Mis Favoritos</h2>
      <div class="favorites-grid">
        <div v-for="product in favoriteProducts" :key="product.id" class="favorite-item">
          <img :src="product.image_url" />
          <h3>{{ product.name }}</h3>
          <button @click="removeFavorite(product.id)" class="remove-btn">
            <i class="fa fa-times"></i>
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: 'UserProfile',
  data() {
    return {
      user: {
        name: '',
        email: '',
        bio: '',
        created_at: ''
      },
      currentPassword: '',
      newPassword: '',
      favoriteProducts: [],
      favoritesCount: 0
    }
  },
  computed: {
    joinDate() {
      return new Date(this.user.created_at).toLocaleDateString('es-ES', {
        year: 'numeric', 
        month: 'long'
      });
    }
  },
  async created() {
    await this.fetchUserData();
    await this.fetchFavorites();
  },
  methods: {
    async fetchUserData() {
      try {
        const response = await axios.get('/user', {
          headers: {
            Authorization: `Bearer ${localStorage.getItem('token')}`
          }
        });
        this.user = response.data;
      } catch (error) {
        console.error("Error fetching user data:", error);
      }
    },
    async fetchFavorites() {
      try {
        const response = await axios.get('/user/favorites', {
          headers: {
            Authorization: `Bearer ${localStorage.getItem('token')}`
          }
        });
        this.favoriteProducts = response.data.products;
        this.favoritesCount = response.data.count;
      } catch (error) {
        console.error("Error fetching favorites:", error);
      }
    },
    triggerFileInput() {
      this.$refs.fileInput.click();
    },
    async handleAvatarChange(event) {
      const file = event.target.files[0];
      if (file) {
        const formData = new FormData();
        formData.append('avatar', file);
        
        try {
          const response = await axios.post('/user/avatar', formData, {
            headers: {
              'Authorization': `Bearer ${localStorage.getItem('token')}`,
              'Content-Type': 'multipart/form-data'
            }
          });
          this.user.avatar = response.data.avatar_url;
        } catch (error) {
          console.error("Error uploading avatar:", error);
        }
      }
    },
    async updateProfile() {
      try {
        const updateData = {
          name: this.user.name,
          bio: this.user.bio
        };
        
        if (this.currentPassword && this.newPassword) {
          updateData.current_password = this.currentPassword;
          updateData.new_password = this.newPassword;
        }
        
        await axios.put('/user', updateData, {
          headers: {
            Authorization: `Bearer ${localStorage.getItem('token')}`
          }
        });
        
        alert('Perfil actualizado correctamente');
        this.currentPassword = '';
        this.newPassword = '';
      } catch (error) {
        console.error("Error updating profile:", error);
        alert(error.response?.data?.message || 'Error al actualizar');
      }
    },
    async removeFavorite(productId) {
      try {
        await axios.delete(`/favorites/${productId}`, {
          headers: {
            Authorization: `Bearer ${localStorage.getItem('token')}`
          }
        });
        this.favoriteProducts = this.favoriteProducts.filter(p => p.id !== productId);
        this.favoritesCount--;
      } catch (error) {
        console.error("Error removing favorite:", error);
      }
    },
    goBack() {
      if (window.history.length > 1) {
        this.$router.go(-1);
      } else {
        this.$router.push({ name: '/' });
      }
    }
  }
}
</script>

<style scoped>

.back-button {
  background: #d35542;
  color: white;
  border: none;
  padding: 8px 15px;
  border-radius: 4px;
  margin-bottom: 20px;
  cursor: pointer;
  display: flex;
  align-items: center;
  gap: 5px;
}

.back-button:hover {
  background: #b54535;
}

.user-profile-container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 20px;
}

.profile-header {
  padding: 30px;
  text-align: center;
  margin-bottom: 30px;
  border-radius: 8px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.profile-content {
  display: flex;
  gap: 30px;
  margin-bottom: 40px;
}

.profile-sidebar {
  flex: 1;
  background: #ebdac6;
  padding: 20px;
  border-radius: 8px;
  border: 1px solid #deba8d;
}

.profile-form {
  flex: 3;
  background: #ebdac6;
  padding: 20px;
  border-radius: 8px;
  border: 1px solid #deba8d;
}

.avatar-container {
  text-align: center;
  margin-bottom: 20px;
}

.avatar {
  width: 150px;
  height: 150px;
  border-radius: 50%;
  object-fit: cover;
  border: 3px solid #d35542;
}

.change-avatar-btn {
  display: block;
  margin: 10px auto;
  background: #36405c;
  color: white;
  border: none;
  padding: 8px 15px;
  border-radius: 4px;
  cursor: pointer;
}

.user-stats {
  margin-top: 20px;
}

.stat-item {
  margin: 15px 0;
  color: #36405c;
}

.vintage-input {
  width: 100%;
  padding: 10px;
  margin: 8px 0;
  border: 1px solid #95aaa0;
  background: #f8f5f0;
  border-radius: 4px;
}

.vintage-textarea {
  width: 100%;
  height: 100px;
  padding: 10px;
  margin: 8px 0;
  border: 1px solid #95aaa0;
  background: #f8f5f0;
  border-radius: 4px;
}

.save-btn {
  background: #d35542;
  color: white;
  padding: 12px 25px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  font-size: 16px;
}

.favorites-section {
  margin-top: 40px;
}

.favorites-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
  gap: 20px;
  margin-top: 20px;
}

.favorite-item {
  position: relative;
  background: white;
  padding: 15px;
  border-radius: 8px;
  box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.favorite-item img {
  width: 100%;
  height: 150px;
  object-fit: cover;
  border-radius: 4px;
}

.remove-btn {
  position: absolute;
  top: 5px;
  right: 5px;
  background: #d35542;
  color: white;
  border: none;
  width: 25px;
  height: 25px;
  border-radius: 50%;
  cursor: pointer;
}

.password-section {
  margin-top: 30px;
  padding-top: 20px;
  border-top: 1px dashed #95aaa0;
}
</style>