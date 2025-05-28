<template>
<div class="footer_section layout_padding">
         <div class="container">
            <div class="footer_logo"><a href="index.html"><img src="@/template/images/Echoes.png" ></a></div>
            <div class="input_bt">
               <input type="text" class="mail_bt" placeholder="20CG0239@itsncg.edu.mx" name="Your Email">
               <span class="subscribe_bt" id="basic-addon2"><a href="mailto:20CG0239@itsncg.edu.mx?subject=Suscripción%20Echoes">Contactar</a></span>
            </div>
            <div class="Info">
              <strong>Nota:</strong> Este sitio es un <b>proyecto escolar</b> sin fines de lucro. Todas las funciones y apartados tienen únicamente propósitos didácticos y demostrativos.
            </div>
         </div>
      </div>
      <!-- footer section end -->
      <!-- copyright section start -->
      <div class="copyright_section">
         <div class="container">
            <p class="copyright_text">© 2025 Todos los derechos reservados</p>
         </div>
      </div>
    
</template>
<script>
export default{
    name: 'FooterComponent',
    components:{
       

    }
    
}

</script>
<style scoped>
.Info {
  margin-top: 18px;
  color: #36405c;
  font-size: 1em;
  background: #f5f6fa;
  border-left: 4px solid #d35542;
  padding: 10px 16px;
  border-radius: 6px;
}
.footer_logo img {
  width: 150px;   
  height: auto;
  display: block;
  margin: 0 auto;
}
</style>