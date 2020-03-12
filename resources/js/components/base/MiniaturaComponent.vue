<template>
   <v-hover
              v-slot:default="{ hover }"
              open-delay="200"
            >
              <v-card  tile class="d-flex" :elevation="hover ? 16 : 2">
                
                <v-img
                  :src="cPicture"
                  :lazy-src="`http://localhost:8000/api/modules/images/${pieza.Numero_de_inventario}/blur`"
                  aspect-ratio="1"
                  class="grey lighten-2"
                  v-on:error="onImgError"
                > 
                <v-expand-transition>
                  <div
                    v-if="hover"
                    class="d-flex transition-fast-in-fast-out black darken-2 v-card--reveal display-5 white--text"
                    style="height: 100%;"
                  >
                    {{pieza.Numero_de_inventario}}
                  </div>
                </v-expand-transition>
               
                  <template v-slot:placeholder>
                    <v-row
                      class="fill-height ma-0"
                      align="center"
                      justify="center"
                    > 
                      <v-progress-circular indeterminate color="grey lighten-5"></v-progress-circular>
                    </v-row>
                  </template>
                </v-img>
                  
                <v-btn
              color="primary"
                dark
                small
                absolute
                bottom
                left
                fab
                
            >
            <v-icon>mdi-eye</v-icon>
                </v-btn>
            <v-btn
            class="ml-11"
              color="cyan"
                dark
                small
                absolute
                bottom
                left
                fab
            >
              <v-icon>mdi-pencil</v-icon>
            </v-btn>
              </v-card>
            </v-hover>


</template>
<script>
export default {
    data(){
        return{
            showd:false,
            show:false,
            cPicture:"http://spjvillalobos.dev/api/modules/images/"+this.pieza.Numero_de_inventario
            //images: ['http://172.16.4.242/img/coleccion/IMAGENES/100000/151000/153963.jpg', 'http://172.16.4.242/img/coleccion/IMAGENES/100000/151000/153964.jpg',
            //'http://172.16.4.242/img/coleccion/IMAGENES/100000/151000/153965.jpg','http://172.16.4.242/img/coleccion/IMAGENES/100000/151000/153966.jpg']
        }
    }, 
     computed: {
    cPicture: function() {
      return this.failed_image ? "http://172.16.4.242/img/palacio/"+pieza.Numero_de_inventario+".jpg" : "http://172.16.4.242/img/Imagen_no_disponible.png";
    },



  },
    methods:{
      showi () {
        const viewer = this.$el.querySelector('.images').$viewer
        viewer.show()
      },
      onImgError: function(event) {

      this.failed_image = true;

    }
    },
    props: {
      pieza: Object,
      saludo:String,
      n:Number,
      
  }
}
</script>