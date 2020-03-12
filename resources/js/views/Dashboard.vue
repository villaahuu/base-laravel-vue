<template>
  <div class="cuerpo mt-3">
    <h5 class="display-2">Bienes Culturales Muebles</h5>
  <hr class="gob">
  <v-row>
    <v-col cols="12" md="9" offset-md="1">
      <v-card>
        <v-container fluid>
          <v-row>
            <v-col
              v-for="pieza in coleccion"
              :key="pieza.Numero_de_inventario"
              class="d-flex child-flex"
              cols="6"
              md="2"
            >
            <MiniaturaComponent v-bind:pieza="pieza" saludo="Hola"></MiniaturaComponent>
            </v-col>
          </v-row>
        </v-container>
      </v-card>
     </v-col> 
  </v-row>
<div style="height:200px;">
<p> bla bla</p>
<h5 class="display-2">Activo fijo</h5>
  <hr class="gob">
</div>

  </div>
</template>

<script>
import MiniaturaComponent from '../components/base/MiniaturaComponent';
export default {
  components:{
      MiniaturaComponent
    },
  data(){
    return{
      coleccion:{},
      loading:false,

    }
  },
  created(){
     
            //console.log(uri);
            this.axios.get('api/modules/coleccion',{
                headers: {
                    Authorization: 'Bearer ' + this.$store.state.token,
                    Accept:'application/json' 
                }}).then((response) => {
            this.coleccion=response.data;
            })
  }
};
</script>
<style >
  .cuerpo{
    font-family: 'Montserrat', sans-serif;
  }
</style>