<template>
   <div>
   <!-- banner bg main start -->
   <div class="banner_bg_main">
      <HeaderComponent/>
      <!-- banner section start -->
      <div class="banner_section layout_padding">
         <div class="container">
            <div id="my_slider" class="carousel slide" data-ride="carousel" data-interval="false">
               <div class="carousel-inner">
                  <div class="carousel-item active">
                     <div class="row">
                        <div class="col-sm-12">
                           <h1 class="banner_taital">Viajemos al pasado <br>Juntos</h1>
                           <div class="buynow_bt"><a href="#" @click.prevent="scrollToProductos">Explorar</a></div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- banner bg main end -->
   <!-- ROPA -->
   <div class="fashion_section" id="productos">
      <div id="main_slider" class="carousel slide" data-ride="carousel" data-interval="false">
         <div class="carousel-inner">
            <div
               class="carousel-item"
               v-for="(group, idx) in chunkedRopaProducts"
               :class="{ 'active': idx === 0 }"
               :key="idx">
               <div class="container">
                  <h1 class="fashion_taital">Ropa</h1>
                  <div class="fashion_section_2">
                     <div class="row">
                        <div class="col-lg-4 col-sm-4" v-for="product in group" :key="product.id">
                           <div class="box_main">
                              <h4 class="shirt_text">{{ product.name }}</h4>
                              <p class="price_text">Price <span style="color: #262626;">${{ product.price }}</span></p>
                              <div class="tshirt_img">
                                 <img :src="product.image_url" :alt="product.name" />
                              </div>
                              <div class="btn_main">
                                 <div class="buy_bt">
                                    <a :href="product.affiliate_link" target="_blank" class="categorias_bt home-btn">Ver tienda</a>
                                    </div>
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
                  </div>
               </div>
            </div>
            
         </div>
         <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
            <i class="fa fa-angle-left"></i>
            </a>
            <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
            <i class="fa fa-angle-right"></i>
            </a>
      </div>
      </div>
      <!-- ROPA ACABA-->
      <!-- muebles -->
      <div class="fashion_section">
         <div id="electronic_main_slider" class="carousel slide" data-ride="carousel" data-interval="false">
            <div class="carousel-inner">
               <div
                  class="carousel-item"
                  v-for="(group, idx) in chunkedMueblesProducts"
                  :class="{ 'active': idx === 0 }"
                  :key="idx">
                  <div class="container">
                     <h1 class="fashion_taital">Muebles</h1>
                     <div class="fashion_section_2">
                        <div class="row">
                           <div class="col-lg-4 col-sm-4" v-for="product in group" :key="product.id">
                              <div class="box_main">
                                 <h4 class="shirt_text">{{ product.name }}</h4>
                                 <p class="price_text">Price <span style="color: #262626;">${{ product.price }}</span></p>
                                 <div class="tshirt_img">
                                    <img :src="product.image_url" :alt="product.name" />
                                 </div>
                                 <div class="btn_main">
                                 <div class="buy_bt">
                                    <a :href="product.affiliate_link" target="_blank" class="categorias_bt home-btn">Ver tienda</a>
                                    </div>
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
                     </div>
                  </div>
               </div>
            </div>
            <a class="carousel-control-prev" href="#electronic_main_slider" role="button" data-slide="prev">
            <i class="fa fa-angle-left"></i>
            </a>
            <a class="carousel-control-next" href="#electronic_main_slider" role="button" data-slide="next">
            <i class="fa fa-angle-right"></i>
            </a>
         </div>
      </div>
      <!-- Muebles -->
      <!-- Electrónica -->
      <div class="jewellery_section">
         <div id="jewellery_main_slider" class="carousel slide" data-ride="carousel" data-interval="false">
            <div class="carousel-inner">
               <div 
                  class="carousel-item"
                  v-for="(group, idx) in chunkedElectronicaProducts"
                  :class="{ 'active': idx === 0 }"
                  :key="idx">
                  <div class="container">
                     <h1 class="fashion_taital">Electrónica</h1>
                     <div class="fashion_section_2">
                        <div class="row">
                           <div class="col-lg-4 col-sm-4" v-for="product in group" :key="product.id">
                              <div class="box_main">
                                 <h4 class="shirt_text">{{ product.name }}</h4>
                                 <p class="price_text">Price <span style="color: #262626;">${{ product.price }}</span></p>
                                 <div class="tshirt_img">
                                    <img :src="product.image_url" :alt="product.name" />
                                 </div>
                                 <div class="btn_main">
                                 <div class="buy_bt">
                                    <a :href="product.affiliate_link" target="_blank" class="categorias_bt home-btn">Ver tienda</a>
                                    </div>
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
                     </div>
                  </div>
               </div>
            </div>
            <a class="carousel-control-prev" href="#jewellery_main_slider" role="button" data-slide="prev">
            <i class="fa fa-angle-left"></i>
            </a>
            <a class="carousel-control-next" href="#jewellery_main_slider" role="button" data-slide="next">
            <i class="fa fa-angle-right"></i>
            </a>
            <div class="loader_main">
               <div class="loader"></div>
            </div>
         </div>
      </div>
      <!-- jewellery  section end -->
      <!-- footer section start -->
      <FooterComponent/>
   </div>
</template>
<script>
   import FooterComponent from '@/shared/FooterComponent.vue';
   import HeaderComponent from '@/shared/HeaderComponent.vue';
   import axios from 'axios';
   export default {
     name: 'HomeComponent',
     components: {
      HeaderComponent,
      FooterComponent
       //HelloWorld
     },
     data:()=>{
      return{
         ultimos:[],
         categorias:[],
         ropaProducts: [],
         mueblesProducts: [],
         electronicaProducts: [],
         loaded:false,
      }
     },
     computed:{
         chunkedRopaProducts(){
            return this.chunkArray(this.ropaProducts, 3);
         },
         chunkedMueblesProducts(){
            return this.chunkArray(this.mueblesProducts, 3);
         },
         chunkedElectronicaProducts(){
            return this.chunkArray(this.electronicaProducts, 3);
         }
   
      },
     methods:{
      chunkArray(arr, size){
         const result = [];
         for (let i = 0; i < arr.length; i += size) {
            result.push(arr.slice(i, i + size));
         }
         return result;
   
      },
      refresh(){
         this.loaded = false;
         axios.get('http://localhost:8000/api/products').then((response)=>{
            const all=response.data;
            this.ropaProducts = all.filter(p => p.category && p.category.id === 1);
            this.mueblesProducts = all.filter(p => p.category && p.category.id === 2);
            this.electronicaProducts = all.filter(p => p.category && p.category.id === 3);
            console.log("RESPUESTA DESDE EL BACKEND",response.data)
      }).catch((error)=>{
         console.log("ERROR",error)
      }).finally(()=>{
         this.loaded = true;
      })
      },
      scrollToProductos(){
         const el=document.getElementById('productos');
         if(el){
            el.scrollIntoView({behavior:'smooth'});
         }  
      }
     },
     mounted(){
      this.refresh();
     },
   }
</script>
<style scoped>
.box_main:hover {
  transform: translateY(-8px) scale(1.025);
  box-shadow: 0 8px 32px #38405a22;
  border-color: #d35542;
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



</style>
