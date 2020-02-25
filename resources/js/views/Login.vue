<template>
  <v-app id="inspire">
    <v-content>
      <v-container
        class="fill-height"
        fluid
      >
        <v-row
          align="center"
          justify="center"
        >
          <v-col
            cols="12"
            sm="8"
            md="4"
          >
            <v-card class="elevation-12">
              <v-toolbar
                color="blue-grey lighten-5"
              
                flat
              >
                <v-toolbar-title>
                  <img src="http://172.16.4.242/img/pleca_gobierno.png" class="center" height="30" alt="">
                  
                </v-toolbar-title>
                <v-spacer />
                <span class="text-right overline">Proyecto de verificacion física <br> y actualización del inventario<br>en Palacio Nacional</span>
               
              </v-toolbar>
              <v-card-text>
                <v-form autocomplete="off" @submit.prevent="login" method="post" lazy-validation>
                  <div class="notification is-danger" v-if="error">
                    <p>{{error}}</p>
                  </div>
                  <v-text-field
                    label="Usuario"
                    name="username"
                    prepend-icon="mdi-account"
                    type="text"
                    v-model="username"
                    required
                    :rules="emailRules"
                  />

                  <v-text-field
                    id="password"
                    label="Contraseña"
                    name="password"
                    prepend-icon="mdi-lock"
                    type="password"
                    v-model="password"
                    required
                    :rules="passwordRules"
                  />
                </v-form>
              </v-card-text>
              <v-card-actions>
                <v-spacer />
                <v-btn color="blue-grey darken-1" dark outlined  @click="login">Entrar</v-btn>
              </v-card-actions>
            </v-card>
          </v-col>
        </v-row>
      </v-container>
    </v-content>
  </v-app>
</template>

<script>
export default {
  data() {
    return {
      username: null,
      password: null,
      error: null,
      emailRules: [
        v => !!v || 'Usuario requerido',
        v => /.+@.+\..+/.test(v) || 'Formato inválido, debe ser un correo electrónico',
      ],
      passwordRules: [
        v => !!v || 'Password obligatorio',
      ],
      
      valid: true,

    };
  },
  methods: {
    login() {
      if(this.valid){

        this.$store
          .dispatch("retrieveToken", {
            username: this.username,
            password: this.password
          })
          .then(response => {
            this.$router.push({ name: "dashboard" });
          })
          .catch(error => {
            this.error = error.response.data;
          });
        }
    },
    validate () {
        if (this.$refs.form.validate()) {
          this.snackbar = true
        }
      },
  }
};
</script>