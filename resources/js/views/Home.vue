<template>

  <v-app id="inspire">
    <v-carousel
      hide-controls
      style="height:100vh">
      <v-carousel-item
        v-for="(item,i) in items"                  
        v-bind:src="item.src"
        :key="i">
      </v-carousel-item>
    </v-carousel>
      <v-app-bar
      color="blue-grey lighten-5"
      dense
     
      bottom
    >
      

      <v-toolbar-title> <img src="http://172.16.4.242/img/pleca_gobierno.png" class="center" width="300" alt=""></v-toolbar-title>

      <v-spacer></v-spacer>

      <v-btn icon>
        <v-icon>mdi-heart</v-icon>
      </v-btn>

      <v-btn icon>
        <v-icon>mdi-magnify</v-icon>
      </v-btn>

      <v-menu
        left
        bottom
      >
        <template v-slot:activator="{ on }">
          <v-btn icon v-on="on">
            <v-icon>mdi-dots-vertical</v-icon>
          </v-btn>
        </template>

        <v-list>
          <v-list-item
            v-for="n in 5"
            :key="n"
            @click="() => {}"
          >
            <v-list-item-title>Option {{ n }}</v-list-item-title>
          </v-list-item>
        </v-list>
      </v-menu>
    </v-app-bar>
  </v-app>




 
      
</template>
<style  scoped>
#inspire {
  height: 100vh;
  background-color: grey;
  border-style: solid;
  border-color: grey;
}
</style>
<script>
export default {
  data(){
    return{
      items: [
          {
            src: 'http://172.16.4.242/img/palacio/02-I120400134-44425.jpg'
          },
          {
            src: 'https://cdn.vuetifyjs.com/images/carousel/sky.jpg'
          },
          {
            src: 'https://cdn.vuetifyjs.com/images/carousel/bird.jpg'
          },
          {
            src: 'https://cdn.vuetifyjs.com/images/carousel/planet.jpg'
          }
        ]
    }   
  }
};
</script>